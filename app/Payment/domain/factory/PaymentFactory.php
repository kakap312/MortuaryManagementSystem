<?php
namespace App\payment\domain\factory;
use App\payment\domain\model\SavedPaymentInfo;
use App\Billing\data\repository\BillingRepositoryImp;
class PaymentFactory{

    public static function makeSavedPaymentInfo($req){
        $paymentId = $req->get('id');
        $billId = ($req->get('billId'));
        //$billId = (new BillingRepositoryImp)->fetchBillingByCorpseId($req->get('billId'))->getData()[0]->getId();
        return new SavedPaymentInfo(
            isset($paymentId)?$paymentId:"",
            is_null($req->get('billId')) ?"": $billId,
            is_null($req->get('amount'))?"":$req->get('amount') ,
            is_null($req->get('description'))?"":$req->get('description'),
            is_null($req->get('datecreated'))?"":date('Y-m-d', strtotime($req->get('datecreated'))),
            ""
        );
    }
}