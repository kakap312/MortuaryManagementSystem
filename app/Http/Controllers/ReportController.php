<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report\domain\factory\ReportFactory;
use App\Report\domain\validator\ReportFieldValidation;
use App\Corp\data\repository\CorpRepositoryImp;
use App\Clearance\data\factory\ClearanceRepositoryFactory;
use App\Billing\data\factory\BillRepositoryFactory;
use App\Report\presentation\MapOfUiModel;
use App\core\services\DateToDaysConversion;
use App\payment\data\repository\PaymentRepositoryImp;
use App\Report\presentation\mappers\DomainToCorpseReportUiMapper; 
use App\Report\presentation\mappers\DomainToFinancialReportUiMapper;
use App\Service\data\repository\ServiceRepositoryImp;
use App\Billing\data\repository\BillingServiceRepositoryImp;

class ReportController extends Controller
{
    //
    private $reportFieldValidator;
    private $clearanceRepositoryImpFactory;
    private $billingRepositoryImpFactory;
    private $paymentRepositoryImp;

    public function __construct(){
        $this->clearanceRepositoryImpFactory = new ClearanceRepositoryFactory();
        $this->billingRepositoryImpFactory = new BillRepositoryFactory();
        $this->paymentRepositoryImp = new PaymentRepositoryImp();
    }

    public function makeReport(Request $req){
        $savedReportInfo = ReportFactory::makeSavedReportInfo($req);
        $reportType = $savedReportInfo->getReportType();
        //validate input
        $this->reportFieldValidator = new ReportFieldValidation($savedReportInfo);
        if($this->reportFieldValidator->isAllFieldValid()){
            if($reportType == "Financial"){
                $uiFinancialReport = self::makeFinancialReport($savedReportInfo->getStartDate(),$savedReportInfo->getEndDate());
                return response()->json(MapOfUiModel::mapOfReport($uiFinancialReport));
            }else if($reportType == "Corpse"){
                $uiCorpseReport = self::makeCorpseReport($savedReportInfo->getStartDate(),$savedReportInfo->getEndDate());
                return response()->json(MapOfUiModel::mapOfReport($uiCorpseReport));
            }
        }else{
            return response()->json(MapOfUiModel::mapofValidation($this->reportFieldValidator->mapOfFieldValidation()));
        }
       
    }
    public function makeFinancialReport($startDate,$endDate){
        $serviceFee = 30;
        $oneTimeServiceFee = 0;
        $dailyServiceFee = 0;
        $dailyServiceName = "";
        $oneTimeServiceName = "";
        $totalPaymentMadeByCorpse = 0;
        $totalAmountPaidByAllCorpse = 0;
        $totalAmountDueByAllCorpse = 0;
        $corpseDateDischarged = null;
        $uiFinancial = array();
        $extraDays = 0;
        $corpse = CorpRepositoryImp::findCorpseByDate($startDate,$endDate)->getData();
        
        foreach ($corpse as $corp) {
            $clearedCorpse = $this->clearanceRepositoryImpFactory->getClearanceRepositoryImp()->fetchClearanceById((CorpRepositoryImp::searchCorpById($corp->getCorpseCode()))->getData()->getId())->getData();
            $bills = $this->billingRepositoryImpFactory->getBillingRepositoryImp()->fetchBillingByCorpseId((CorpRepositoryImp::searchCorpById($corp->getCorpseCode()))->getData()->getId())->getData();
            if(! is_null($bills)){
                foreach ($bills as $bill) {
                    //$serviceFee = $bill->getServiceFee();
                    $billingResult = $this->billingRepositoryImpFactory->getBillingRepositoryImp()->fetchBillingByCorpseId($bill->getBillId());
                    $billingId = is_null($billingResult->getData())?"":$billingResult->getData()[0]->getId();
                    $billServices = BillingServiceRepositoryImp::fetchBillingServiceByBillingId($billingId);
                    foreach ($billServices->getData() as $billingservice ) {
                        $service = ServiceRepositoryImp::fetchServiceById($billingservice->getServiceId())->getData()[0];
                        
                        if($corp->getCategory() == "Regular"){
                            if(($service->getPer() == "daily") &&  ( $service->getName()  != $dailyServiceName) ){
                                $dailyServiceFee += $service->getRegularFee();
                                $dailyServiceName = $service->getName();
                            }else if(($service->getPer() == "once") &&  ($service->getName()  != $oneTimeServiceName) ){
                                $oneTimeServiceFee += $service->getRegularFee();
                                $oneTimeServiceName = $service->getName();
                            }
                        }else{
                            if($service->getPer() == "daily" &&  ($dailyServiceName != $service->getName()) ){
                                $dailyServiceFee += $service->getVipFee();
                                $dailyServiceName = $service->getName();
                            }else if($service->getPer() == "once" &&  ($oneTimeServiceName != $service->getName()) ){
                                $oneTimeServiceFee += $service->getVipFee();
                                $oneTimeServiceName = $service->getName();
                            }
                        }
                        
                    }
                    $payments =  $this->paymentRepositoryImp->fetchPaymentById($billingId)->getData();
                    if((!is_null($payments))){
                        foreach ($payments as $payment) {
                            $totalPaymentMadeByCorpse += $payment->getAmount();
                        }
                        $totalAmountPaidByAllCorpse += $totalPaymentMadeByCorpse;
                    }
                }
            }

             if(is_null($clearedCorpse)){
                $extraDays = DateToDaysConversion::convert($corp->getCollectionDate(),date("Y-m-d")) < 0 ? 0:DateToDaysConversion::convert($corp->getCollectionDate(),date("Y-m-d"));
             }else{
                $extraDays = DateToDaysConversion::convert($corp->getCollectionDate(),date("Y-m-d",strtotime($clearedCorpse[0]->getCreatedAt()))) < 0 ? 0:DateToDaysConversion::convert($corp->getCollectionDate(),date("Y-m-d",strtotime($clearedCorpse[0]->getCreatedAt())));
             }
           
            $dueDays = DateToDaysConversion::convert($corp->getAdmissionDate(),$corp->getCollectionDate());
            $amountDue = (($dueDays + $extraDays) * $dailyServiceFee) + $oneTimeServiceFee ;
            $totalAmountDueByAllCorpse += $amountDue;
            array_push($uiFinancial,DomainToFinancialReportUiMapper::map($corp,($extraDays + $dueDays),$totalPaymentMadeByCorpse,$amountDue,$totalAmountDueByAllCorpse,$totalAmountPaidByAllCorpse));
            $totalPaymentMadeByCorpse = 0;
            $oneTimeServiceFee = 0;
            $dailyServiceFee = 0;
            $dailyServiceName = "";
            $oneTimeServiceName = "";
        }
        return $uiFinancial;
       
    }
    public function makeCorpseReport($startDate,$endDate){
        $totalNumberOfCorpseCleared = 0;
        $GLOBALS['corpse']  = CorpRepositoryImp::findCorpseByDate($startDate,$endDate)->getData();
       $GLOBALS['totalNumberOfCorpseDischarged'] =  0;
       $femalecorpse = (CorpRepositoryImp::findCorpseByDateAndSex($startDate,$endDate,"F"))->getData();
       $GLOBALS['totalcorpse'] = (CorpRepositoryImp::totalCorpse())->getData();
       $GLOBALS['femaleCorpse'] = is_null($femalecorpse)?0:count($femalecorpse);
       $maleCorpse = (CorpRepositoryImp::findCorpseByDateAndSex($startDate,$endDate,"M"))->getData();
       $GLOBALS['maleCorpse']  = is_null($maleCorpse)?0:count($maleCorpse);
        
        $uiCorpseReport = array_map(function($corp){
            $corpseId = (CorpRepositoryImp::searchCorpById($corp->getCorpseCode()))->getData()->getId();
            $clearance = ($this->clearanceRepositoryImpFactory->getClearanceRepositoryImp()->fetchClearanceById($corpseId))->getData();
            
           return DomainToCorpseReportUiMapper::map($corp,$clearance,$GLOBALS['femaleCorpse'],$GLOBALS['maleCorpse'],$GLOBALS['totalcorpse']);
        },($GLOBALS['corpse']));
        
        return $uiCorpseReport;
    }
}
