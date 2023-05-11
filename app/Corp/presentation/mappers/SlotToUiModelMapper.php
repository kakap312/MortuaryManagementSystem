<?php
namespace App\Corp\presentation\mappers;
use App\Corp\presentation\model\SlotUiModel;
class SlotToUiModelMapper{

    public static function map($Slot)
    {
        return new SlotUiModel(
            $Slot->getSlotId(),
            $Slot->getName(),
            $Slot->getState(),
        );
    }
}
