<?php
namespace App\Clearance\presentation\mappers;
use App\Clearance\presentation\model\UiClearance;
class DomainTOUiClearanceMapper{
    public static function map($clearance){
        return new UiClearance(
            $clearance->getClearanceId(),
            $clearance->getStatus(),
            $clearance->getCreatedAt(),
            
        );
    }
}