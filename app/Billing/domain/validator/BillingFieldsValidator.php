<?php
namespace App\Billing\domain\validator;
use App\core\domain\validation\Validator;
class BillingFieldsValidator {
    private $isDateCreatedValid=false;
    private $isCorpseIdValid=false;
    private $isServiceIdValid=false;
    //private $isBillDescriptionValid=false;
    private $isBillAmountValid=false;

    public function __construct($fieldData){
        $this->isDateCreatedValid = Validator::validateDate($fieldData->getCreatedAt());
        $this->isCorpseIdValid = Validator::validateDate($fieldData->getCorpseId()) ;
        $this->isServiceIdValid = Validator::validateServiceId($fieldData->getServiceIds()) ;
        //$this->isBillDescriptionValid =  Validator::validateDate($fieldData->getBillFor());
        $this->isBillAmountValid = Validator::validateDate($fieldData->getAmount());

    }
    public function mapOfFieldValidation(){
        return [
            'isDateValid'=>$this->isDateCreatedValid,
            'isCorpseIdValid'=>$this->isCorpseIdValid,
            'isServiceIdValid'=>$this->isServiceIdValid,
            //'isBillDescriptionValid'=>$this->isBillDescriptionValid,
            'isBillAmountValid'=>$this->isBillAmountValid
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