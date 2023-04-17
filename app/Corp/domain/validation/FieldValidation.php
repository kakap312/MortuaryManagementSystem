<?php
namespace App\Corp\domain\validation;
use App\core\domain\validation\Validator;

class FieldValidation {
    public $isCorpseNameValid;
    public $homeTownValidator;
    public $isAdmissionDateValid;
    public $isCollectionDateValid;
    public $isRelativeNameValid;
    public $isReleasedByValid;
    public $isAgeValid;
    public $isSexValid;
    public $isContactOneValid;
    public $isContactTwoValid;
    public $isCommentValid;
    public $isSlotValid;
    public $isFridgeValid;

    public function __construct($fieldData){
        $this->isAdmissionDateValid = Validator::validateDate($fieldData->getAdmissionDate());
        $this->isCollectionDateValid = Validator::validateDate($fieldData->getCollectionDate());
        $this->isCorpseNameValid = Validator::validateName($fieldData->getName());
        $this->homeTownValidator = Validator::validateName($fieldData->getHomeTown());
        $this->isRelativeNameValid = Validator::validateName($fieldData->getRelativeName());
        $this->isReleasedByValid = Validator::validateName($fieldData->getReleasedBy());
        $this->isAgeValid = Validator::validateAge($fieldData->getAge());
        $this->isSexValid = Validator::validateSex($fieldData->getSex());
        $this->isContactOneValid = Validator::validateContactOne($fieldData->getRelativeContactOne());
        $this->isContactTwoValid = Validator::validateContactTwo($fieldData->getRelativeContactTwo());
        $this->isCommentValid = Validator::validateRemarks($fieldData->getRemarks());
        $this->isSlotValid = Validator::validateSlot($fieldData->getSlotId());
        $this->isFridgeValid = Validator::validateFridge($fieldData->getFridgeId());;
    }
    public function mapOfFieldValidation(){
        return [
            'isAdmissionDateValid' => $this->isAdmissionDateValid,
            'isCollectionDateValid' => $this->isCollectionDateValid,
            'isCorpseNameValid' => $this->isCorpseNameValid,
            'homeTownValidator' => $this->homeTownValidator,
            'isRelativeNameValid' => $this->isRelativeNameValid,
            'isReleasedByValid' => $this->isReleasedByValid,
            'isAgeValid' => $this->isAgeValid,
            'isSexValid' => $this->isSexValid,
            'isContactOneValid' => $this->isContactOneValid,
            'isContactTwoValid' => $this->isContactTwoValid,
            'isCommentValid' => $this->isCommentValid,
            'isSlotValid' => $this->isSlotValid,
            'isFridgeValid' => $this->isFridgeValid

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