<?php
namespace App\Billing\domain\validator;
use App\core\domain\validation\Validator;
class BillingFieldValidator {
    private $isDateCreatedValid=false;
    private $isCorpseIdValid=false;
    private $isServiceFeeValid=false;
    private $isBillDescriptionValid=false;
    private $isBillAmountValid=false;

    public function __construct($fieldData){
        $this->isDateCreatedValid = Validator::validateDate($fieldData->getCreatedAt());
        $this->isCorpseIdValid = Validator::validateDate($fieldData->getCorpseId()) ;
        $this->isServiceFeeValid = Validator::validateDate($fieldData->getServiceFee()) ;
        $this->isBillDescriptionValid =  Validator::validateDate($fieldData->getBillFor());
        $this->isBillAmountValid = Validator::validateDate($fieldData->getBillFor());
    }
    public function mapOfFieldValidation(){
        return [
            'isDateValid'=>$this->isDateCreatedValid,
            'isCorpseIdValid'=>$this->isCorpseIdValid,
            'isServiceFeeValid'=>$this->isServiceFeeValid,
            'isBillDescriptionValid'=>$this->isBillDescriptionValid,
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