<?php
namespace App\corp\data\mappers;
class DomainToDbcorpMapper{
    static function map($corp){
        
        if($corp->getId() != ""){
            return array(
                "admissionDate"=>$corp->getAdmissionDate(),
                "name"=>$corp->getName(),
                "age"=>$corp->getAge(),
                "sex"=>$corp->getSex(),
                "hometown"=>$corp->getHomeTown(),
                "relativeName"=>$corp->getRelativeName(),
                "relativeContactOne"=>$corp->getRelativeContactOne(),
                "relativeContactTwo"=>$corp->getRelativeContactTwo(),
                "collectionDate"=>$corp->getCollectionDate(),
                "remarks" => $corp->getRemarks(),
                "releasedBy" => $corp->getReleasedBy(),
                "updatedAt" => $corp->getUpdatedAt(),
                "fridgeId"=> $corp->getFridgeId(),
                "slotId"=>$corp->getSlotId(),
                "category"=>$corp->getCategory()
            );
        }else{
            return array(
                "corpId"=>uniqid(),
                "corpseCode"=>$corp->getCorpseCode(),
                "admissionDate"=>$corp->getAdmissionDate(),
                "name"=>$corp->getName(),
                "age"=>$corp->getAge(),
                "sex"=>$corp->getSex(),
                "hometown"=>$corp->getHomeTown(),
                "relativeName"=>$corp->getRelativeName(),
                "relativeContactOne"=>$corp->getRelativeContactOne(),
                "relativeContactTwo"=>$corp->getRelativeContactTwo(),
                "collectionDate"=>$corp->getCollectionDate(),
                "remarks" => $corp->getRemarks(),
                "releasedBy" => $corp->getReleasedBy(),
                "updatedAt" => $corp->getUpdatedAt(),
                "fridgeId"=> $corp->getFridgeId(),
                "slotId"=>$corp->getSlotId(),
                "category"=>$corp->getCategory()
            );

        }
        
    }
}