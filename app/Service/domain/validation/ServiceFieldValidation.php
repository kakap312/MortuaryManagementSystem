<?php
namespace App\Service\domain\validation;
use App\core\domain\validation\Validator;

class ServiceFieldValidation{
    private $isDateCreatedValid=false;
    private $isServiceNameValid=false;
    private $isServiceFeeValid=false;

    public function __construct($fieldData){
        $this->isDateCreatedValid = Validator::validateDate($fieldData->getCreatedAt());
        $this->isServiceNameValid = Validator::validateDate($fieldData->getServiceName()) ;
        $this->isServiceFeeValid = Validator::validateDate($fieldData->getServiceFee()) ;
    }
    public function mapOfFieldValidation(){
        return [
            'isDateValid'=>$this->isDateCreatedValid,
            'isServiceNameValid'=>$this->isServiceNameValid,
            'isServiceFeeValid'=>$this->isServiceFeeValid,
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