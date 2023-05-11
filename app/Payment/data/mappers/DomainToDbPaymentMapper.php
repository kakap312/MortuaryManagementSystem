<?php
namespace App\payment\data\mappers;
use App\Billing\data\repository\BillingRepositoryImp;
class DomainToDbPaymentMapper{

    public static function map($payment){
        if($payment->getPaymentId() == ""){
            return [
                'paymentId'=> uniqid(),
                'amount'=>$payment->getAmount(),
                'billId' => (new BillingRepositoryImp)->fetchBillingByCorpseId($payment->getBillId())->getData()[0]->getId(),
                'description'=>$payment->getDescription(),
                'createdAt'=> $payment->getCreatedAt(),
                'updatedAt'=> ""
            ];
        }else{
            return [
                'paymentId'=> $payment->getPaymentId(),
                'amount'=>$payment->getAmount(),
                'billId' => (new BillingRepositoryImp)->fetchBillingByCorpseId($payment->getBillId())->getData()[0]->getId(),
                'description'=>$payment->getDescription(),
                'createdAt'=> $payment->getCreatedAt(),
                'updatedAt'=> ""
            ];

        }
        
    }
}