<?php
namespace App\Corp\data\mappers;
use App\Corp\domain\model\Slot;

class DbSlotToDomainMapper{
    static function map($dbSlot){
        return new  Slot(
            $dbSlot->slotId,
            $dbSlot->name,
            $dbSlot->state,
        );
    }
}

