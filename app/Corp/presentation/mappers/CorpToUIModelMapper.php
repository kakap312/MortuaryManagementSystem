<?php
namespace App\Corp\presentation\mappers;
use App\Corp\presentation\model\CorpUiModel;
use App\core\services\DateToDaysConversion;
class CorpToUiModelMapper{

    public static function map($corp,$fridgeName,$slotName)
    {
        return new CorpUiModel(
            $corp->getId(),
            $corp->getCorpseCode(),
            $corp->getAdmissionDate(),
            $corp->getCollectionDate(),
            $corp->getName(),
            $corp->getAge(),
            $corp->getSex(),
            DateToDaysConversion::convert($corp->getAdmissionDate(),$corp->getCollectionDate()),
            DateToDaysConversion::convert($corp->getCollectionDate(), date("Y-m-d")),
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