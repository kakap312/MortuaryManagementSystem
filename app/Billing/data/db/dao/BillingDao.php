<?php
namespace App\Billing\data\db\dao;
use App\Billing\data\db\model\DbBilling;

class BillingDao{

    static function insert($dbBilling){
        try {
            return DbBilling::create($dbBilling);
            //return true;
        } catch (\Throwable $th) {
            //return false;
           return $th->getMessage();
        }

    }
    static function deleteBillById($billId){
        try {
            DbBilling::where('billId',$billId)->delete();
            return true;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }
    static function updateBill($billId,$dbBilling){
        try {
            DbBilling::where('billId','=',$billId)->update($dbBilling);
            return true;
        } catch (\Throwable $th) {
            //return false;
           return $th->getMessage();
        }
    }
    static function findBillingById($id){

    }
    static function findBillingByCoprseId($corpseId){
        try {
            $GLOBALS['id'] = $corpseId;
            return DbBilling::where(function($query){
                $query->where('corpId','=',$GLOBALS['id'])
                ->orWhere('billId','=',$GLOBALS['id'])
                ->orWhere('id','=',$GLOBALS['id']);
            })->get();
            // where(function($query){
            //     $query->where('corpId','=',$GLOBALS['id'])->orWhere('billId','=',$GLOBALS['id']);
            // })->get()->toArray();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    static function fetchAllBillings(){
        try{
            return DbBilling::skip(0)->take(5)->get()->toArray();
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }
    static function totalBilling(){
        return DbBilling::all()->count();
    }

}