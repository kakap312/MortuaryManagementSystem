<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing\domain\factory\BillingFactory;
use App\Billing\data\factory\RepositoryFactory;
use App\Billing\presentation\MapOfUIModel;
use App\Billing\presentation\mapper\DomainBillingToUiMapper;
class BillingController extends Controller
{
    private $repositoryFactory;
    
    function __construct(){
        $this->repositoryFactory  = new RepositoryFactory();
    }
    function createBill(Request $req){
        $savedBillingInfo =  BillingFactory::makeSavedBillingInfo($req);
        $resultSet = $this->repositoryFactory->getBillingRepositoryImp()->createBilling($savedBillingInfo);
        return response()->json(MapOfUIModel::mapOfSuccess($resultSet->getSuccess()));
    }
    function viewBills(Request $req){
        $resultSet = $this->repositoryFactory->getBillingRepositoryImp()->fetchAllBillings();
        if($resultSet->getSuccess()){
            $billings = array_map(function($billing){
                $billingServicesResultSet = $this->repositoryFactory->getBillingServiceRepositoryImp()->fetchBillingServiceByBillingId($billing->getBillId());
                $billingServices = $billingServicesResultSet->getData();
                if($billingServicesResultSet->getSuccess()){
                    $listOfServices = array_map(function($billingService){
                        $service = $this->repositoryFactory->getServiceRepositoryImp()->fetchServiceById($billingService->getId());
                        return $service;
                    },$billingServices);  
                }
                return $billing;
            }, $resultSet->getData());
            // convert domain billing to ui billing
            $uiBilling = array_map(function($billing){
                return DomainBillingToUiMapper::map($billing);
            },$billings);
            return response()->json(['a'=>  $uiBilling]);// return a uibiling model to the ui element to display
        }else{
            // return empty resultSet to view 
        }
    }
}
