<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clearance\data\factory\ClearanceRepositoryFactory;
use App\Clearance\domain\factory\CLearanceFactory;
use App\Corp\data\repository\CorpRepositoryImp;
use App\Clearance\presentation\MapOfUIModel;
use App\Billing\data\factory\BillRepositoryFactory;
use App\Clearance\domain\validation\ClearanceFieldValidation;
use App\payment\data\repository\PaymentRepositoryImp;
use App\Clearance\presentation\mappers\DomainTOUiClearanceMapper;
use App\core\services\DateToDaysConversion;
use App\Service\data\repository\ServiceRepositoryImp;
use App\Billing\data\repository\BillingRepositoryImp;

class ClearanceController extends Controller
{
    //
    private $clearanceRepositoryImpFactory;
    private $clearanceFieldValidation;
    private $billRepositoryFactory;
    
    public function __construct(){
        $this->clearanceRepositoryImpFactory = new ClearanceRepositoryFactory();
        $this->billRepositoryFactory = new BillRepositoryFactory();

        
    }
    public function makeClearance(Request $req){
        $savedClearanceInfo =  CLearanceFactory::getSavedClearanceInfo($req);
        $clearanceFieldValidation = new ClearanceFieldValidation($savedClearanceInfo);
        if($clearanceFieldValidation->isAllFieldValid()){
            $corpseId = (CorpRepositoryImp::searchCorpById($savedClearanceInfo->getCorpseId()))->getData()->getId();
            $resultSet = $this->clearanceRepositoryImpFactory->getClearanceRepositoryImp()->fetchClearanceById($corpseId);
            if($resultSet->getSuccess()){
                return response()->json(MapOfUIModel::mapOfClearanceExit(true));
            }else{
                $outstandingAmount = self::getOutsandingAmount( $savedClearanceInfo);
                if($outstandingAmount == 0){
                    $result = $this->clearanceRepositoryImpFactory->getClearanceRepositoryImp()->createClearance($savedClearanceInfo);
                    return response()->json(MapOfUIModel::mapOfSuccess($resultSet->getSuccess()));
                }else if(($outstandingAmount) == -1){
                    return response()->json(MapOfUIModel::mapOfSuccess(false));
                }else{
                    return response()->json(MapOfUIModel::mapOfOutandingAmount($outstandingAmount));
                }
            }

        }else{
            return response()->json(MapOfUIModel::mapOfValidation($clearanceFieldValidation->mapOfFieldValidation()));
        }
       
       
    }
    public function updateClearance(Request $req){
        $savedClearanceInfo =  CLearanceFactory::getSavedClearanceInfo($req);
        $clearanceFieldValidation = new ClearanceFieldValidation($savedClearanceInfo);
        if($clearanceFieldValidation->isAllFieldValid()){
            $result = $this->clearanceRepositoryImpFactory->getClearanceRepositoryImp()->updateClearance($req->get('id'),$savedClearanceInfo);
            return response()->json(MapOfUIModel::mapOfSuccess($result->getSuccess()));
        }else{
            return response()->json(MapOfUIModel::mapOfValidation($clearanceFieldValidation->mapOfFieldValidation()));
        }
    }

    public function viewAllClearance(){
        $resultSet = $this->clearanceRepositoryImpFactory->getClearanceRepositoryImp()->fetchClearanceLimit5();
        if($resultSet->getSuccess()){
            $uiClearance = array_map(function($clearance){
                return DomainTOUiClearanceMapper::map($clearance);
            },$resultSet->getData());
            return response()->json(MapOfUIModel::mapOfClearance($uiClearance));
            
        }else{
            return response()->json(MapOfUIModel::mapOfSuccess($resultSet->getSuccess()));
        }
        
    }
    public function searchClearance(Request $req){
        $uiClearance = null;
        $clearanceResult = $this->clearanceRepositoryImpFactory->getClearanceRepositoryImp()->fetchClearanceById($req->get('id'));
        if($clearanceResult->getSuccess()){
            $clearance = $clearanceResult->getData(); 
            $uiClearance = DomainTOUiClearanceMapper::map($clearance);
            return response()->json(MapOfUIModel::mapOfClearance($uiClearance));
        }else{
            return response()->json(MapOfUIModel::mapOfClearance($clearanceResult->getSuccess()));
        }
    }
        
    public function getOutsandingAmount($savedClearanceInfo){
        $totalPayment = 0;
        $oneTimeServiceFee = 0;
        $dailyServiceFee = 0;
        $corpseResult = CorpRepositoryImp::searchCorpById($savedClearanceInfo->getCorpseId());
        $corpseId = $corpseResult->getData() == null ?"":$corpseResult->getData()->getId();
        $billResult = (new BillingRepositoryImp)->fetchBillingByCorpseId($corpseId);
        $billId;
        $tempBillId = "";
        if(!$billResult->getSuccess()){
            return -1;
        }else{
            if($billResult->getSuccess() && $corpseResult->getSuccess()){
                $corpse = $corpseResult->getData();
                foreach ($billResult->getData() as $billing) {
                    $billId = $billing->getId();
                    if($billId != $tempBillId){
                        $tempBillId = $billId;
                        $paymentResult = (new PaymentRepositoryImp())->fetchPaymentById($billId);
                        $billServices = $this->billRepositoryFactory->getBillingServiceRepositoryImp()->fetchBillingServiceByBillingId(
                            (new BillingRepositoryImp)->fetchBillingByCorpseId($corpseId)->getData()[0]->getId()
                        );
                        foreach ($billServices->getData() as $billingservice ) {
                            $service = ServiceRepositoryImp::fetchServiceById($billingservice->getServiceId())->getData()[0];
                            if($service->getPer() == "daily"){
                                $dailyServiceFee += $service->getServiceFee();
                            }else{
                                $oneTimeServiceFee += $service->getServiceFee();
                            }
                        }
                        if(($paymentResult->getData())  == null){
                            $totalPayment = 0;
                        }else{
                            foreach ($paymentResult->getData() as $payments) {
                                if($paymentResult->getSuccess()){
                                    $totalPayment += $payments->getAmount();
                                }
                            
                            }
                        }
                        
                    }
                    //$serviceFee = $billing->getServiceFee();
                }
                   
                $extraDays = DateToDaysConversion::convert($corpse->getCollectionDate(),date("Y-m-d"));
                $dueDays = DateToDaysConversion::convert($corpse->getAdmissionDate(),$corpse->getCollectionDate());
                $dueDays = ($dueDays < 0)? 0 : $dueDays;
                $extraDays = ($extraDays < 0)? 0 : $extraDays;
                $outstandingAmount = ((($extraDays + $dueDays) * $dailyServiceFee ) + $oneTimeServiceFee) - $totalPayment;
                return $outstandingAmount;
            }else{
                return null;
            }

        }
        

    }
    function deleteClearance(Request $req){
        $clearanceResult = $this->clearanceRepositoryImpFactory->getClearanceRepositoryImp()->deleteClearance($req->get('id'));
        if($clearanceResult->getSuccess()){
            return response()->json(MapOfUIModel::mapOfSuccess($clearanceResult->getSuccess()));
        }else{
            return response()->json(MapOfUIModel::mapOfSuccess($clearanceResult->getSuccess()));
        }
    }
}
