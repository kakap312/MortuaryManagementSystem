<?php
namespace App\payment\domain\validation;
use App\core\domain\validation\Validator;

class PaymentFieldValidation {
    private $isDateValid;
    private $isIdValid;
    private $isAmountValid;
    private $isDescriptionValid;

    public function __construct($savedPaymentInfo){
        $this->isDateValid = Validator::validateDate($savedPaymentInfo->getCreatedAt());
        $this->isIdValid = Validator::validateId($savedPaymentInfo->getId());
        $this->isAmountValid = Validator::validateDate($savedPaymentInfo->getAmount());
        $this->isDescriptionValid = Validator::validateRemarks($savedPaymentInfo->getDescription());
    }
    public function mapOfFieldValidation(){
        return [
            "isDateValid" => $this->isDateValid,
            "isIdValid" => $this->isIdValid,
            "isAmountValid"=> $this->isAmountValid,
            "isDescriptionValid"=>$this->isDescriptionValid
        ];
    }
    public function isAllFieldsValid(){
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