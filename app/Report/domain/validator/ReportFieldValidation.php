<?php
namespace App\Report\domain\validator;
use App\core\domain\validation\Validator;

class ReportFieldValidation {
    public $isReportTypeValid;
    public $isStartDateValid;
    public $isEndDateValid;

    public function __construct($fieldData){
        $this->isReportTypeValid = Validator::validateDate($fieldData->getReportType());
        $this->isStartDateValid = Validator::validateDate($fieldData->getStartDate());
        $this->isEndDateValid = Validator::validateDate($fieldData->getEndDate());
    }
    public function mapOfFieldValidation(){
        return [
            'isReportTypeValid' => $this->isReportTypeValid,
            'isStartedDateValid' => $this->isStartDateValid,
            'isEndDateValid' => $this->isEndDateValid,
        ];
    }
    public function isAllFieldValid(){
        $isAllfieldValid = true;
        $validationResult = $this->mapOfFieldValidation();
        foreach($validationResult as $key => $value){
            if($value == false){
                $isAllfieldValid = false;
                break;
            }
        }
        return $isAllfieldValid;
    }
}