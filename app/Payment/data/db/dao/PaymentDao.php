<?php
namespace App\Payment\data\db\dao;
use  App\Payment\data\db\model\DbPayment;

class PaymentDao {
    
    function insertPayment($dbPayment){
        try {
            DbPayment::create($dbPayment);
            return true;
        } catch (\Throwable $th) {
            return false;
           // return $th->getMessage();
        }

    }
    static function deletePayment($id){
        try {
            DbPayment::where('paymentId',$id)->delete();
            return true;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    static function  updatePayment($dbPayment){
        try {
            DbPayment::where('paymentId','=',$id)->update($dbPayment);
            return true;
        } catch (\Throwable $th) {
            //return false;
           return $th->getMessage();
        }
    }
    static function findAllPayements(){
        try {
            return DbPayment::skip(0)->take(5)->get();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }
    static function findPaymentById(){

    }
}