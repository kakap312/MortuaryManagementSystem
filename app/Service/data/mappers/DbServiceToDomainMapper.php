<?php
namespace App\Service\data\mappers;
use App\Service\domain\model\Service;
class DbServiceToDomainMapper{
    static function map($dbService){
        return new Service(
            $dbService['id'],
            $dbService['serviceId'],
            $dbService['name'],
            $dbService['regularFee'],
            $dbService['vipFee'],
            $dbService['per'],
            $dbService['createdAt']
        );
    }
}