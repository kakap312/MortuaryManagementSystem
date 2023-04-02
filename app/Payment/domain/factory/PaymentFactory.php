<?php
namespace App\payment\domain\factory;
use App\payment\domain\model\SavedPaymentInfo;
class PaymentFactory{

    public static function makeSavedPaymentInfo(){
        return new savedPaymentInfo(
            "123434543",
            24.0,
            date('12/04/2023'),
            ""
        );
    }
}