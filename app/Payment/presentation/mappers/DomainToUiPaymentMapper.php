<?php
namespace App\Payment\presentation\mappers;
use App\Payment\presentation\model\UiPayment;
use App\Billing\data\repository\BillingRepositoryImp;
class DomainToUiPaymentMapper{

    public static function map($payment){
        return new  UiPayment(
            $payment->getPaymentId(),
            ($payment->getBillId()),
            $payment->getAmount(),
            $payment->getCreatedAt(),
            $payment->getDescription()
        );
    }
}