<?php
namespace App\Billing\data\mappers;
use  App\Corp\data\repository\CorpRepositoryImp;
use App\Service\data\repository\ServiceRepositoryImp;
class DomainToDbBillingMapper{
    static function map($savedBillingInfo){
        $corpId = (CorpRepositoryImp::searchCorpById($savedBillingInfo->getCorpseId()))->getData()->getId();
        //$billId = (new BillingRepositoryImp)->fetchBillingByCorpseId($savedBillingInfo->getBillingId())->getData()[0]->getId();
            return [
            'billId'=>$savedBillingInfo->getBillingId(),
            'corpId'=>$corpId,
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