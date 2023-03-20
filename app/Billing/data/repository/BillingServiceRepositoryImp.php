<?php
namespace App\Billing\data\repository;
use App\Billing\data\db\dao\BillingServiceDao;
use App\Billing\domain\repository\BillingServiceRepository;
use App\Billing\data\mappers\DomainToDbBillingServiceMapper;
use App\Billing\data\mappers\DbBillingServiceToDomainMapper; 
use App\core\domain\Result;

class BillingServiceRepositoryImp implements BillingServiceRepository {
    
    public static function createBillingService($billingServiceInfo){
       return BillingServiceDao::insert(DomainToDbBillingServiceMapper::map($billingServiceInfo))?  new Result(null,true):  new Result(null,false);
    }
    public static function updateBillingService($id,$dbBilling){

    }
    public static function fetchBillingServiceByBillingId($billingId){
        //return a list of dbbillings.
        $dbBillingServices = BillingServiceDao::findBillingServiceById($billingId);
        if(is_null($dbBillingServices)){
            return new Result(null,false);
        }else{
            $billingServices = array_map(function($billingService){
                $billingService =  DbBillingServiceToDomainMapper::map($billingService);
                return $billingService;
            }, $dbBillingServices);
            return new Result($billingServices,true);
        }
    }

}