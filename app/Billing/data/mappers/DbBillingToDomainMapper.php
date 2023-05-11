<?php
namespace App\Billing\data\mappers;
use App\Billing\domain\model\Billing;
use App\Corp\data\repository\CorpRepositoryImp;
class DbBillingToDomainMapper{
    static function map($dbBilling){
        return new Billing(
            $dbBilling['id'],
            $dbBilling['billId'],
            $dbBilling['amount'],
            $dbBilling['createdAt'],
            $dbBilling['dueDays'],
            $dbBilling['extraDays'],
            $dbBilling['fee'],
            CorpRepositoryImp::searchCorpById($dbBilling['corpId'])->getData()->getCorpseCode(),
            $dbBilling['billfor']
        );
    }
}