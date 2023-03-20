<?php
namespace App\Billing\data\mappers;
use App\Billing\domain\model\BillingService;
class DbBillingServiceToDomainMapper{
    static function map($dbBilingService){
        return  new BillingService(
            $dbBilingService['billServiceId'],
            $dbBilingService['serviceId']

        );
    }


}