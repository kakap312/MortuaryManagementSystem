<?php
namespace App\Report\presentation\mappers;
use App\Corp\presentation\mappers\CorpToUiModelMapper;
use App\Report\presentation\model\UiCorpseReport;
class DomainToCorpseReportUiMapper{

    public static function map($corpse,$clearanceStatus,$femaleCorpse,$maleCorpse){
        $totalNumberOfCorpseDischarged = 0;
        if(! is_null($clearanceStatus)){
            
            foreach ($clearanceStatus as $clearance){
                $clearanceStatus = $clearance->getStatus();
                $totalNumberOfCorpseDischarged += 1;
            };
        }else{
            $clearanceStatus = "false";
        }
        
        return new UiCorpseReport(
            $corpse->getCorpseCode(),
            $corpse->getName(),
            $corpse->getSex(),
            $clearanceStatus,
            $corpse->getCategory(),
            $corpse->getRelativeName(),
            $corpse->getRelativeContactOne(),
            $corpse->getRelativeContactTwo(),
            $totalNumberOfCorpseDischarged,
            $femaleCorpse,
            $maleCorpse
            
        );
    }
}