<?php
namespace App\payment\domain\factory;
use App\payment\domain\model\SavedPaymentInfo;
class PaymentFactory{

    public static function makeSavedPaymentInfo($req){
        $paymentId = $req->get('id');
        return new SavedPaymentInfo(
            isset($paymentId)?$paymentId:"",
            is_null($req->get('billId')) ?"":$req->get('billId'),
            is_null($req->get('amount'))?"":$req->get('amount') ,
            is_null($req->get('description'))?"":$req->get('description'),
            is_null($req->get('datecreated'))?"":date('Y-m-d', strtotime($req->get('datecreated'))),
            ""
        );
    }
}