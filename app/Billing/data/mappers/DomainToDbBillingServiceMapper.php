<?php
namespace App\Billing\data\mappers;
class DomainToDbBillingServiceMapper{
    static function map($savedBillingService,$serviceId){
        return  [
            'billServiceId'=>uniqid(),
            'billId'=>$savedBillingService->getBillingId(),
            'serviceId'=>$serviceId
        ];
    }


}