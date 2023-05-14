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
        $totalPaymentMadeByCorpse = 0;
        $totalAmountPaidByAllCorpse = 0;
        $totalAmountDueByAllCorpse = 0;
        $corpseDateDischarged = null;
        $uiFinancial = array();
        $corpse = CorpRepositoryImp::findCorpseByDate($startDate,$endDate)->getData();
        
        foreach ($corpse as $corp) {
            $clearedCorpse = $this->clearanceRepositoryImpFactory->getClearanceRepositoryImp()->fetchClearanceById($corp->getCorpseCode())->getData();
            $bills = $this->billingRepositoryImpFactory->getBillingRepositoryImp()->fetchBillingByCorpseId($corp->getCorpseCode())->getData();
            
            if(!is_null($clearedCorpse)){
                foreach ($clearedCorpse as $clearance) {
                    $corpseDateDischarged = $clearance->getCreatedAt();
                 }
            }
            
            if(! is_null($bills)){
                foreach ($bills as $bill) {
                    //$serviceFee = $bill->getServiceFee();
                    $payments =  $this->paymentRepositoryImp->fetchPaymentById($bill->getBillId())->getData();
                    if((!is_null($payments))){
                        foreach ($payments as $payment) {
                            $totalPaymentMadeByCorpse += $payment->getAmount();
                        }
                        $totalAmountPaidByAllCorpse += $totalPaymentMadeByCorpse;
                    }
                }
            }
            $extraDays = DateToDaysConversion::convert($corp->getCollectionDate(),date("Y-m-d")) < 0 ? 0:DateToDaysConversion::convert($corp->getCollectionDate(),date("Y-m-d"));
            $dueDays = DateToDaysConversion::convert($corp->getAdmissionDate(),$corp->getCollectionDate());
            $amountDue = ($extraDays + $dueDays) * $serviceFee;
            $totalAmountDueByAllCorpse += $amountDue;
            array_push($uiFinancial,DomainToFinancialReportUiMapper::map($corp,$corpseDateDischarged,($extraDays + $dueDays),$totalPaymentMadeByCorpse,$amountDue,$totalAmountDueByAllCorpse,$totalAmountPaidByAllCorpse));
            $totalPaymentMadeByCorpse = 0;
        }
        return $uiFinancial;
       
    }
    public function makeCorpseReport($startDate,$endDate){
        $totalNumberOfCorpseCleared = 0;
        $GLOBALS['corpse']  = CorpRepositoryImp::findCorpseByDate($startDate,$endDate)->getData();
       $GLOBALS['totalNumberOfCorpseDischarged'] =  0;
       $femalecorpse = (CorpRepositoryImp::findCorpseByDateAndSex($startDate,$endDate,"F"))->getData();
       $GLOBALS['femaleCorpse'] = is_null($femalecorpse)?0:count($femalecorpse);
       $maleCorpse = (CorpRepositoryImp::findCorpseByDateAndSex($startDate,$endDate,"M"))->getData();
       $GLOBALS['maleCorpse']  = is_null($maleCorpse)?0:count($maleCorpse);
        
        $uiCorpseReport = array_map(function($corp){
            $clearance = ($this->clearanceRepositoryImpFactory->getClearanceRepositoryImp()->fetchClearanceById($corp->getCorpseCode()))->getData();
            if($clearance != null){
                $GLOBALS['totalNumberOfCorpseDischarged'] +=  1;
            }
            
           return DomainToCorpseReportUiMapper::map($corp,$clearance,$GLOBALS['totalNumberOfCorpseDischarged'],$GLOBALS['femaleCorpse'],$GLOBALS['maleCorpse']);
        },($GLOBALS['corpse']));
        
        return $uiCorpseReport;
    }
}
