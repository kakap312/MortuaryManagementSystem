<?php
namespace App\payment\data\mappers;
class DomainToDbPaymentMapper{

    public static function map($payment){
        if($payment->getPaymentId() == ""){
            return [
                'paymentId'=> uniqid(),
                'amount'=>$payment->getAmount(),
                'billId' =>$payment->getId(),
                'description'=>$payment->getDescription(),
                'createdAt'=> $payment->getCreatedAt(),
                'updatedAt'=> ""
            ];
        }else{
            return [
                'amount'=>$payment->getAmount(),
                'billId' =>$payment->getId(),
                'description'=>$payment->getDescription(),
                'createdAt'=> $payment->getCreatedAt(),
                'updatedAt'=> ""
            ];

        }
        
    }
}