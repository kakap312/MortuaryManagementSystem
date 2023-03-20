<?php
namespace App\Billing\data\mappers;
class DomainToDbBillingMapper{
    static function map($savedBillingInfo){
        return  [
            'billId'=>uniqid(),
            'corpId'=>$savedBillingInfo->getCorpseId(),
            'billfor'=>$savedBillingInfo->getBillFor(),
            'amount'=>$savedBillingInfo->getAmount(),
            'createdAt'=>$savedBillingInfo->getCreatedAt(),
            'updatedAt'=>$savedBillingInfo->getCreatedAt()
        ];
    }


}