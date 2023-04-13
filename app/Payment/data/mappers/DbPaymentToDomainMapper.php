<?php
namespace App\Payment\data\mappers;
use App\payment\domain\model\Payment;
class DbPaymentToDomainMapper{

    public static function map($dbPayment){
        if(is_array($dbPayment)){
            return new Payment(
                $dbPayment['paymentId'],
                $dbPayment['billId'],
                $dbPayment['amount'],
                $dbPayment['description'],
                $dbPayment['createdAt'],
                $dbPayment['updatedAt']
            );
            
        }else{
            return new Payment(
                $dbPayment->get('paymentId'),
                $dbPayment->get('billId'),
                $dbPayment->get('amount'),
                $dbPayment->get('description'),
                $dbPayment->get('createdAt'),
                $dbPayment->get('updatedAt')
            );

        }
        
    }
}