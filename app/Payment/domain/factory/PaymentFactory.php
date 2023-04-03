<?php
namespace App\payment\domain\factory;
use App\payment\domain\model\SavedPaymentInfo;
class PaymentFactory{

    public static function makeSavedPaymentInfo(){
        return new SavedPaymentInfo(
            "123434543",
            24.0,
            "this is description",
            date('Y-m-d', strtotime('12/04/2023')),
            ""
        );
    }
}