<?php
namespace App\Clearance\domain\validation;
use App\core\domain\validation\Validator;
class ClearanceFieldValidation{
    private $isDateValid;
    private $isCorpseIdValid;
    private $isStateValid;

    public function __construct($fieldData){
        $this->isDateValid = Validator::validateDate($fieldData->getCreatedAt());
        $this->isCorpseIdValid = Validator::validateId($fieldData->getCorpseId());
        $this->isStateValid = Validator::validateDate($fieldData->getStatus());
    }

    public function mapOfFieldValidation(){
        return [
            'isDateValid'=>$this->isDateValid,
            'isCorpseIdValid'=>$this->isCorpseIdValid,
            'isStateValid'=>$this->isStateValid,
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