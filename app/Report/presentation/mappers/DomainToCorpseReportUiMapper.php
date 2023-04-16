<?php
namespace App\Report\presentation\mappers;
use App\Corp\presentation\mappers\CorpToUiModelMapper;
use App\Report\presentation\model\UiCorpseReport;
class DomainToCorpseReportUiMapper{

    public static function map($corpse,$totalNumberOfCorpseDischarged,$totalNumberFemaleCorpse,$totalNumberOfMaleCorpse){
        $corpseUiModel = array_map(function($corpse){
            return CorpToUiModelMapper::map($corpse,null,null);
        },$corpse->getData());
        return new UiCorpseReport(
            $corpseUiModel,
            $totalNumberOfCorpseDischarged->getData(),
            count($totalNumberFemaleCorpse->getData()),
            count($totalNumberOfMaleCorpse->getData())
            
        );
    }
}