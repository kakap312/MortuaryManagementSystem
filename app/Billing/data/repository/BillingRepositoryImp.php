<?php
namespace App\Billing\data\repository;
use App\Billing\data\db\dao\BillingDao;
use App\Billing\domain\repository\BillingRepository;
use App\Billing\data\mappers\DomainToDbBillingMapper;
use App\Billing\data\mappers\DbBillingToDomainMapper;
use App\Billing\data\repository\BillingServiceRepositoryImp;
use App\Billing\domain\factory\BillingServiceFactory;
use App\core\domain\Result;


class BillingRepositoryImp implements BillingRepository{
    
    public  function createBilling($savedBillingInfo){
        $dbBilling = DomainToDbBillingMapper::map($savedBillingInfo);
            if(BillingDao::insert($dbBilling)){
                
                foreach($savedBillingInfo->getServiceIds() as $serviceId ) {
                    $billingServiceInfo = BillingServiceFactory::makeBillingServiceInfo($dbBilling['billId'],$serviceId);
                    BillingServiceRepositoryImp::createBillingService($billingServiceInfo);
                }
                return new Result( null,true);
            }else{
                return new Result( BillingDao::insert($dbBilling),false);
            }
    }
    public  function fetchAllBillings(){
        $dbBillings = BillingDao::fetchAllBillings();
        if(is_null($dbBillings)){
            return new Result(null,false);
        }else{
            $billings = array_map(function($dbBilling){
                $billing = DbBillingToDomainMapper::map($dbBilling);
                return $billing;
            },$dbBillings);
            return new Result($billings,true);
        }
    }
    
    public  function fetchBillingByCorpseId($corpseId){
        $dbBilling = BillingDao::fetchBillingByCoprseId($corpseId);
        if($dbBilling){
            $billing = DbBillingToDomainMapper::map($dbBilling);
            return new Result($billing,true);
        }else{
            return new Result(null,false);
        }
    }
    
    public  function updateBilling($id,$dbBilling){}
    
    public  function fetchBilling($corpse){}
    
}