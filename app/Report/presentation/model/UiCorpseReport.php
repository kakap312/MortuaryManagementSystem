<?php
namespace App\Report\presentation\model;

class UiCorpseReport{
    public $corpse;
    public $totalNumberOfCorpseDischarged;
    public $totalNumberOfFemaleCorpse;
    public $totalNumberOfMaleCorpse;

    public function __construct($corpse,$totalNumberOfCorpseDischarged,$totalNumberOfFemaleCorpse,$totalNumberOfMaleCorpse){
        $this->corpse = $corpse;
        $this->totalNumberOfCorpseDischarged = $totalNumberOfCorpseDischarged;
        $this->totalNumberOfFemaleCorpse = $totalNumberOfFemaleCorpse;
        $this->totalNumberOfMaleCorpse = $totalNumberOfMaleCorpse;
    }
}