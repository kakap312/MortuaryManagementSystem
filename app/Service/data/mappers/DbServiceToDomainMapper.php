<?php
namespace App\Service\data\mappers;
use App\Service\domain\model\Service;
class DbServiceToDomainMapper{
    static function map($dbService){
        return new Service(
            $dbService['serviceId'],
            $dbService['name'],
            $dbService['fee'],
            $dbService['per'],
            $dbService['createdAt']
        );
    }
}