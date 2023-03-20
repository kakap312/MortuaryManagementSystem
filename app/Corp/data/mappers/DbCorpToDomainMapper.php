<?php
namespace App\Corp\data\mappers;
use App\Corp\domain\model\Corp;

class DbCorpToDomainMapper{
    static function map($dbCorp){
        return new  Corp(
            $dbCorp->corpId,
            $dbCorp->admissionDate,
            $dbCorp->collectionDate,
            $dbCorp->name,
            $dbCorp->age,
            $dbCorp->sex,
            $dbCorp->relativeName,
            $dbCorp->relativeContactOne,
            $dbCorp->relativeContactTwo,
            $dbCorp->remarks,
            $dbCorp->releasedBy,
            $dbCorp->updatedAt,
            $dbCorp->hometown,
            $dbCorp->fridgeId,
            $dbCorp->slotId,
        );
    }
}