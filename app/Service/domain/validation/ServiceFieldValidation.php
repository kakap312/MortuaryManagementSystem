<?php
namespace App\Service\domain\validation;
use App\core\domain\validation\Validator;

class ServiceFieldValidation{
    private $isDateCreatedValid=false;
    private $isServiceNameValid=false;
    private $isRegularFeeValid=false;
    private $isVipFeeValid=false;

    public function __construct($fieldData){
        $this->isDateCreatedValid = Validator::validateDate($fieldData->getCreatedAt());
        $this->isServiceNameValid = Validator::validateDate($fieldData->getServiceName()) ;
        $this->isRegularFeeValid = Validator::validateDate($fieldData->getRegularFee()) ;
        $this->isVipFeeValid = Validator::validateDate($fieldData->getVipFee()) ;
    }
    public function mapOfFieldValidation(){
        return [
            'isDateValid'=>$this->isDateCreatedValid,
            'isServiceNameValid'=>$this->isServiceNameValid,
            'isRegularFeeValid'=>$this->isRegularFeeValid,
            'isVipFeeValid'=>$this->isVipFeeValid,
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