<?php
namespace App\Report\presentation\model;

class UiCorpseReport{
    public $corpseCode;
    public $corpseName;
    public $sex;
    public $status;
    public $serviceType;
    public $relativeName;
    public $totalCorpseRecieved;
    public $relativeNumberOne;
    public $relativeNumberTwo;
    public $totalNumberOfCorpseDischarged;
    public $totalNumberOfFemaleCorpse;
    public $totalNumberOfMaleCorpse;

    public function __construct(
        $corpseCode,
        $corpseName,
        $sex,
        $status,
        $serviceType,
        $relativeName,
        $relativeNumberOne,
        $relativeNumberTwo,
        $totalNumberOfCorpseDischarged,
        $totalNumberOfFemaleCorpse,
        $totalNumberOfMaleCorpse,
        $totalCorpseRecieved
        ){
        $this->corpseCode = $corpseCode;
        $this->corpseName = $corpseName;
        $this->sex = $sex;
        $this->status = $status;
        $this->serviceType = $serviceType;
        $this->relativeName = $relativeName;
        $this->relativeNumberOne = $relativeNumberOne;
        $this->relativeNumberTwo = $relativeNumberTwo;
        $this->totalNumberOfCorpseDischarged = $totalNumberOfCorpseDischarged;
        $this->totalNumberOfFemaleCorpse = $totalNumberOfFemaleCorpse;
        $this->totalNumberOfMaleCorpse = $totalNumberOfMaleCorpse;
        $this->totalCorpseRecieved = $totalCorpseRecieved;
    }
}