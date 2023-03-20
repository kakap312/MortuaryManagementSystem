<?php
namespace App\Billing\data\mappers;
class DomainToDbBillingServiceMapper{
    static function map($savedBillingService){
        return  [
            'billServiceId'=> uniqid(),
            'billId'=>$savedBillingService->getBillingId(),
            'serviceId'=>$savedBillingService->getServiceId()
        ];
    }


}