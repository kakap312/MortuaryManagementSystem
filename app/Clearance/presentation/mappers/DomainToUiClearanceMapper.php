<?php
namespace App\Clearance\presentation\mappers;
use App\Clearance\presentation\model\UiClearance;
class DomainTOUiClearanceMapper{
    public static function map($clearance){
        if(is_array($clearance)){
            foreach ($clearance as $clearance) {
                return new UiClearance(
                    $clearance->getClearanceId(),
                    $clearance->getCreatedAt(),
                    $clearance->getStatus(),
                    $clearance->getCorpseCode(),
                );
            }
           
        }else{
            return new UiClearance(
                $clearance->getClearanceId(),
                $clearance->getCreatedAt(),
                $clearance->getStatus(),
                $clearance->getCorpseCode(),
            );
        }
        
    }
}