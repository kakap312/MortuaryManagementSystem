<?php
namespace App\Billing\data\mappers;
use App\Billing\data\repository\BillingRepositoryImp;
use App\Service\data\repository\ServiceRepositoryImp;
class DomainToDbBillingServiceMapper{
    static function map($savedBillingService,$serviceId){
        return  [
            'billServiceId'=>uniqid(),
            'billId'=> (new BillingRepositoryImp)->fetchBillingByCorpseId($savedBillingService->getBillingId())->getData()[0]->getId(), 
            'serviceId'=>ServiceRepositoryImp::fetchServiceById($serviceId)->getData()[0]->getId()
        ];
    }


}