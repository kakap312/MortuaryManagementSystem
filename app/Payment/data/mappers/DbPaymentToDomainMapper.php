<?php
namespace App\Payment\data\mappers;
use App\payment\domain\model\Payment;
use App\Billing\data\repository\BillingRepositoryImp;
class DbPaymentToDomainMapper{

    public static function map($dbPayment){
        if(is_array($dbPayment)){
            return new Payment(
                $dbPayment['id'],
                $dbPayment['paymentId'],
                (new BillingRepositoryImp)->fetchBillingByCorpseId($dbPayment['billId'])->getData()[0]->getBillId(),
                $dbPayment['amount'],
                $dbPayment['description'],
                $dbPayment['createdAt'],
                $dbPayment['updatedAt']
            );
            
        }else{
            return new Payment(
                $dbPayment['id'],
                $dbPayment->get('paymentId'),
                (new BillingRepositoryImp)->fetchBillingByCorpseId($dbPayment->get('billId'))->getData()[0]->getBillId(),
                $dbPayment->get('amount'),
                $dbPayment->get('description'),
                $dbPayment->get('createdAt'),
                $dbPayment->get('updatedAt')
            );

        }
        
    }
}