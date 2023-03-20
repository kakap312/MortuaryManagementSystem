<?php
namespace App\Billing\data\mappers;
use App\Billing\domain\model\Billing;
class DbBillingToDomainMapper{
    static function map($dbBilling){
        return new Billing(
            $dbBilling['billId'],
            [],
            $dbBilling['amount'],
            $dbBilling['createdAt'],
            $dbBilling['billfor']
        );
    }
}