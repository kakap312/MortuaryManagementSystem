<?php
namespace App\Clearance\data\mappers;
class DomainToDbClearanceMapper {
    public static function map($clearance){
        if($clearance->getId() == ""){
            return [
                "clearanceId"=>uniqid(),
                "corpseId"=>$clearance->getCorpseId(),
                "status"=>$clearance->getStatus(),
                "createdAt"=>$clearance->getCreatedAt(),
                "updatedAt"=>$clearance->getUpdatedAt()
            ];
        }else{
            return [
                "clearanceId"=>$clearance->getId(),
                "corpseId"=>$clearance->getCorpseId(),
                "status"=>$clearance->getStatus(),
                "createdAt"=>$clearance->getCreatedAt(),
                "updatedAt"=>$clearance->getUpdatedAt()
            ];
        }

    }
}