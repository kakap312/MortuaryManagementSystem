<?php
namespace App\Payment\presentation\mappers;
use App\Payment\presentation\model\UiPayment;
class DomainToUiPaymentMapper{

    public static function map($payment){
        return new  UiPayment(
            $payment->getPaymentId(),
            $payment->getId(),
            $payment->getAmount(),
            $payment->getCreatedAt(),
            $payment->getDescription()
        );
    }
}