<?php
namespace App\Corp\presentation\mappers;
use App\Corp\presentation\model\CorpUiModel;
use App\core\services\DateToDaysConversion;
class CorpToUiModelMapper{

    public static function map($corp,$fridgeName,$slotName)
    {
        $extraDays = DateToDaysConversion::convert($corp->getCollectionDate(),date("Y-m-d"));
        $dueDays = DateToDaysConversion::convert($corp->getAdmissionDate(),$corp->getCollectionDate());
        return new CorpUiModel(
            $corp->getCorpseId(),
            $corp->getCorpseCode(),
            $corp->getAdmissionDate(),
            $corp->getCollectionDate(),
            $corp->getName(),
            $corp->getAge(),
            $corp->getSex(),
            ($dueDays < 0)? 0 : $dueDays,
            ($extraDays < 0)? 0 : $extraDays,
            $corp->getRelativeName(),
            $corp->getRelativeContactOne(),
            $corp->getRelativeContactTwo(),
            is_null($fridgeName)?"":$fridgeName,
            is_null($slotName)?"":$slotName,
            $corp->getCategory(),
            $corp->getReleasedBy(),
            $corp->getRemarks(),
            $corp->getHometown()
        );
    }
}