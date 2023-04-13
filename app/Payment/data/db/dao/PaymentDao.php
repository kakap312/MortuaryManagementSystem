<?php
namespace App\Payment\data\db\dao;
use  App\Payment\data\db\model\DbPayment;

class PaymentDao {
    
    static function insertPayment($dbPayment){
        try {
            DbPayment::create($dbPayment);
            return true;
        } catch (\Throwable $th) {
            //return false;
           return $th->getMessage();
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
    static function  updatePayment($dbPayment,$id){
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
            return  DbPayment::skip(0)->take(5)->get();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }
    static function findPaymentById($id){
        try {
            $GLOBALS['id'] = $id;
            return DbPayment::where(function($query){
                $query->where('paymentId','=',$GLOBALS['id'])
                ->orWhere('billId','=',$GLOBALS['id']);
            })->get();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }
    static function totalPayment(){
        return DbPayment::all()->count();
    }
}