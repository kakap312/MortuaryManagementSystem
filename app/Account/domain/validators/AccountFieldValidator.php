<?php
namespace App\Account\domain\validators;
use App\core\domain\validation\Validator;
use App\Account\domain\validators\UsernameValidation;
use App\Account\domain\validators\PasswordValidation;

class AccountFieldValidator {
    public $isDateValid;
    public $isUsernameValid;
    public $isPasswordValid;
    public $isTypeValid;
    

    public function __construct($fieldData){
        $this->isDateValid = Validator::validateDate($fieldData->getCreatedAt());
        $this->isUsernameValid = UsernameValidation::validate($fieldData->getUserName());
        $this->isPasswordValid = PasswordValidation::validate($fieldData->getPassword());
        $this->isType = Validator::validateName($fieldData->getAccountType());
    }
    public function mapOfFieldValidation(){
        return [
            'isDateValid' => $this->isDateValid,
            'isUsernameValid' => $this->isUsernameValid,
            'isPasswordValid' => $this->isPasswordValid,
            'isTypeValid' => $this->isType,
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