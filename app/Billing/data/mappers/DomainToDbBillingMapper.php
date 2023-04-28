<?php
namespace App\Billing\data\mappers;
class DomainToDbBillingMapper{
    static function map($savedBillingInfo){
        return  [
            'billId'=>$savedBillingInfo->getBillingId(),
            'corpId'=>$savedBillingInfo->getCorpseId(),
            'billfor'=>$savedBillingInfo->getBillFor(),
            'amount'=>$savedBillingInfo->getAmount(),
            'dueDays'=>$savedBillingInfo->getDueDays(),
            'extraDays'=>$savedBillingInfo->getExtraDays(),
            'fee'=>$savedBillingInfo->getServiceFee(),
            'createdAt'=>$savedBillingInfo->getCreatedAt(),
            'updatedAt'=>$savedBillingInfo->getCreatedAt()
        ];
    }


}