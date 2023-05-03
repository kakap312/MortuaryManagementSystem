<?php
namespace App\Account\data\mappers;
class DomainToDbAccountMapper {
    public static function map($savedAccountInfo){
        return [
            "accId"=>$savedAccountInfo->getId(),
            "username"=>$savedAccountInfo->getUsername(),
            "password"=>$savedAccountInfo->getPassword(),
            "type"=>$savedAccountInfo->getAccountType(),
            "createdAt"=> $savedAccountInfo->getCreatedAt(),
            "updatedAt"=> $savedAccountInfo->getCreatedAt()
        ];
    }
}