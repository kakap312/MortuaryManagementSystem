<?php
namespace App\Billing\domain\factory;
use App\Billing\domain\model\SavedBillingServiceInfo;
class BillingServiceFactory{

    static function makeBillingServiceInfo($billingId,$serviceId){
        return new SavedBillingServiceInfo(
            "",
            $billingId,
            $serviceId
        );
    }
}