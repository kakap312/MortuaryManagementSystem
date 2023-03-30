<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing\domain\factory\BillingFactory;
use App\Billing\data\factory\RepositoryFactory;
use App\Billing\presentation\MapOfUIModel;
use App\Billing\presentation\mapper\DomainBillingToUiMapper;
use App\Billing\domain\validator\BillingFieldsValidator;
class BillingController extends Controller
{
    private $repositoryFactory;
    
    function __construct(){
        $this->repositoryFactory  = new RepositoryFactory();
    }
    function createBill(Request $req){
        $savedBillingInfo =  BillingFactory::makeSavedBillingInfo($req);
        // validate inputs
        $fieldValidation = new BillingFieldsValidator( $savedBillingInfo);
        if($fieldValidation->isAllFieldValid()){
            $resultSet = $this->repositoryFactory->getBillingRepositoryImp()->createBilling($savedBillingInfo);
            return response()->json(MapOfUIModel::mapOfSuccess($resultSet->getSuccess()));
        }else{
            return response()->json(MapOfUIModel::mapOfValidation( $fieldValidation->mapOfFieldValidation()));
        }
    }
    function viewBills(Request $req){
        $resultSet = $this->repositoryFactory->getBillingRepositoryImp()->fetchAllBillings();
        if($resultSet->getSuccess()){
            // $billings = array_map(function($billing){
            //     $billingServicesResultSet = $this->repositoryFactory->getBillingServiceRepositoryImp()->fetchBillingServiceByBillingId($billing->getBillId());
            //     $billingServices = $billingServicesResultSet->getData();
            //     if($billingServicesResultSet->getSuccess()){
            //         $listOfServices = array_map(function($billingService){
            //             $service = $this->repositoryFactory->getServiceRepositoryImp()->fetchServiceById($billingService->getId());
            //             return $service;
            //         },$billingServices);  
            //     }
            //     return $billing;
            // }, $resultSet->getData());
            // convert domain billing to ui billing
            $uiBilling = array_map(function($billing){
                return DomainBillingToUiMapper::map($billing);
            },$resultSet->getData());
            return response()->json(MapOfUIModel::mapOfBillings($uiBilling));// return a uibiling model to the ui element to display
        }else{
            // return empty resultSet to view 
            return response()->json(MapOfUIModel::mapOfBillings($resultSet->getData()));
        }
    }
    function viewBillsByCorpseId(Request $req){
    $result = $this->repositoryFactory->getBillingRepositoryImp()->fetchBillingByCorpseId($req->get('corpseId'));
        if($result->getSuccess()){
            if(count($result->getData()) >= 1){
                $uibillings = array_map(function($billing){
                    return DomainBillingToUiMapper::map($billing);
                },$result->getData());
                return response()->json(MapOfUIModel::mapOfBilling($uibillings));
            }else{
                //$uiBilling = DomainBillingToUiMapper::map($result->getData());
                return response()->json(MapOfUIModel::mapOfBilling($result->getData()));
            }  
        }else{
            return response()->json(MapOfUIModel::mapOfBilling($result->getData()));// return a uibiling model to the ui element to display

        }

    }
    function deleteBillById(Request $req){
        $result = $this->repositoryFactory->getBillingRepositoryImp()->deleteBill($req->get('billId'));
        if($result->getSuccess()){
            return response()->json(MapOfUIModel::mapOfSuccess($result->getSuccess()));
        }else{
            return response()->json(MapOfUIModel::mapOfSuccess($result->getSuccess()));
        }
        
    }
    function searchBillById(Request $req){
        $result = $this->repositoryFactory->getBillingRepositoryImp()->fetchBillingByCorpseId($req->get('id'));
        if($result->getSuccess()){
            $uiBillings = array_map(function($billing){
                return DomainBillingToUiMapper::map($billing);
            },$result->getData());
            return response()->json(MapOfUIModel::mapOfBilling($uiBillings));
        }else{
            return response()->json(MapOfUIModel::mapOfBilling($result->getData()));
        }
    }
}
