<?php
namespace App\Billing\data\db\dao;
use App\Billing\data\db\model\DbBilling;

class BillingDao{

    static function insert($dbBilling){
        try {
            DbBilling::create($dbBilling);
            return true;
        } catch (\Throwable $th) {
            //return false;
           return $th->getMessage();
        }

    }
    static function delete($billId){

    }
    static function update($billId){

    }
    static function findBillingById($billId){

    }
    static function fetchAllBillings(){
        try{
            return DbBilling::skip(0)->take(5)->get()->toArray();
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }

}