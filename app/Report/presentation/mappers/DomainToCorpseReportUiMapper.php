<?php
namespace App\Report\presentation\mappers;
use App\Corp\presentation\mappers\CorpToUiModelMapper;
use App\Report\presentation\model\UiCorpseReport;
class DomainToCorpseReportUiMapper{

    public static function map($corpse,$clearanceStatus,$totalNumberOfCorpseDischarged,$femaleCorpse,$maleCorpse){
        if(! is_null($clearanceStatus)){
            foreach ($clearanceStatus as $clearance){
                $clearanceStatus = $clearance->getStatus();
            };
        }else{
            $clearanceStatus = "false";
        }
        
        return new UiCorpseReport(
            $corpse->getCorpseCode(),
            $corpse->getName(),
            $corpse->getSex(),
            $clearanceStatus == "true" ? "Discharged":"in Morgue",
            $corpse->getCategory(),
            $corpse->getRelativeName(),
            $corpse->getRelativeContactOne(),
            $corpse->getRelativeContactTwo(),
            $totalNumberOfCorpseDischarged->getData(),
            count($femaleCorpse),
            count($maleCorpse)
            
        );
    }
}