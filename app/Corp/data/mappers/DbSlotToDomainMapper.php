<?php
namespace App\Corp\data\mappers;
use App\Corp\domain\model\Slot;

class DbSlotToDomainMapper{
    static function map($dbSlot){
        return new  Slot(
            is_null($dbSlot->slotId)?"":$dbSlot->slotId,
            is_null($dbSlot->name)?"":$dbSlot->name,
            is_null($dbSlot->state)?"":$dbSlot->state,
        );
    }
}

