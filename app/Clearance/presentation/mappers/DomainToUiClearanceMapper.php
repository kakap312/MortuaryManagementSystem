<?php
namespace App\Clearance\presentation\mappers;
use App\Clearance\presentation\model\UiClearance;
use  App\Corp\data\repository\CorpRepositoryImp;
class DomainTOUiClearanceMapper{
    public static function map($clearance){
        $corpId = (CorpRepositoryImp::searchCorpById($clearance->getCorpseCode()))->getData()->getCorpseCode();
        if(is_array($clearance)){
            foreach ($clearance as $clearance) {
                return new UiClearance(
                    $clearance->getClearanceId(),
                    $clearance->getCreatedAt(),
                    $clearance->getStatus(),
                    $corpId
                );
            }
           
        }else{
            return new UiClearance(
                $clearance->getClearanceId(),
                $clearance->getCreatedAt(),
                $clearance->getStatus(),
                $corpId
            );
        }
        
    }
}