<?php
namespace App\Billing\data\db\dao;
use App\Billing\data\db\model\DbBillingService;

class BillingServiceDao{

    static function insert($dbBillingService){
        try {
            DbBillingService::create($dbBillingService);
            return true;
        } catch (\Throwable $th) {
            //return false;
           return $th->getMessage();
        }
    }
    static function findBillingServiceById($billId){
        try {
            $GLOBALS['id'] = $billId;
            return DbBillingService::where(function($query){
                $query->where('billId','=',$GLOBALS['id']);
            })->get()->toArray();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    static function fetchAllBillings(){
        
    }

}