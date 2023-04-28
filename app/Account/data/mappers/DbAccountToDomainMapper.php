<?php
namespace App\Account\data\mappers;
use App\Account\domain\model\Account;
class DbAccountToDomainMapper{
    public static function map($dbAccount){
        return new Account(
            $dbAccount['accId'],
            $dbAccount['username'],
            $dbAccount['password'],
            $dbAccount['type'],
            $dbAccount['createdAt'],
        );
    }
}