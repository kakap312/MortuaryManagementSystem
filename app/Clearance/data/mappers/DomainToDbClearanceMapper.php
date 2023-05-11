<?php
namespace App\Clearance\data\mappers;
use  App\Corp\data\repository\CorpRepositoryImp;
class DomainToDbClearanceMapper {
    public static function map($clearance){
        $corpId = (CorpRepositoryImp::searchCorpById($clearance->getCorpseId()))->getData()->getId();
        if($clearance->getId() == ""){
            return [
                "clearanceId"=>uniqid(),
                "corpseId"=>$corpId,
                "status"=>$clearance->getStatus(),
                "createdAt"=>$clearance->getCreatedAt(),
                "updatedAt"=>$clearance->getUpdatedAt()
            ];
        }else{
            return [
                "clearanceId"=> $clearance->getId(),
                "corpseId"=>$corpId,
                "status"=>$clearance->getStatus(),
                "updatedAt"=>$clearance->getCreatedAt()
            ];
        }
    }
}