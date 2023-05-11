<?php
namespace App\Corp\presentation\mappers;
use App\Corp\presentation\model\FridgeUiModel;
class FridgeToUiModelMapper{

    public static function map($fridge)
    {
        return new FridgeUiModel(
            $fridge->getFridgeId(),
            $fridge->getName(),
        );
    }
}