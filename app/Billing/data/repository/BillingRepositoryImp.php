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
                
                // foreach($savedBillingInfo->getServiceIds() as $serviceId ) {
                //     $billingServiceInfo = BillingServiceFactory::makeBillingServiceInfo($dbBilling['billId'],$serviceId);
                //     BillingServiceRepositoryImp::createBillingService($billingServiceInfo);
                // }
                return new Result( $dbBilling,true);
            }else{
                return new Result( $dbBilling,false);
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
    public function sumBillAmount($corpseId){
        $dbBilling = BillingDao::findBillingByCoprseId($corpseId);
        if(is_null($dbBilling) || count($dbBilling) == 0 ){
            return new Result(null,false);
        }else{
            $billAmount = 0;
            if(count($dbBilling) >= 1){
                foreach ($dbBilling as $dbBill) {
                   $billing =  DbBillingToDomainMapper::map($dbBill);
                   $billAmount += $billAmount->getAmount();
                }
                return new Result($billAmount,true);
            }
            
            
        }
    }
    
    public  function fetchBillingByCorpseId($corpseId){
        $dbBilling = BillingDao::findBillingByCoprseId($corpseId);
        if(is_null($dbBilling) || ($dbBilling)->count() == 0 || $dbBilling == false ){
            return new Result(null,false);
        }else{
                $billing = array();
                foreach ($dbBilling->toArray() as $dbBill) {
                    array_push($billing,DbBillingToDomainMapper::map($dbBill));
                }
                return new Result($billing,true);
        }
    }
    
    public  function updateBilling($billId,$savedBillingInfo){
        // $savedBillingInfo->setBillingId($billId);
        $dbBilling = DomainToDbBillingMapper::map($savedBillingInfo);
        if(BillingDao::updateBill($billId,$dbBilling)){
            return new Result( null,true);
        }else{
            return new Result( null,false);
        }
        
    }
    
    public  function fetchBilling($corpse){}

    public function deleteBill($id){
        if(!(BillingDao::deleteBillById($id))){
            return new Result(null,false);
        }else{
            return new Result(null,true);
        }
    }
    
}