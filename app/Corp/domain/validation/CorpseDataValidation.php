<?php
namespace App\Corp\domain\validation;
use App\core\domain\validation\Validator;
class CorpseDataValidation{

    static function mapOfNameValidation($name){
        return [
            'isNameValid'=>Validator::validateName($name)
        ];
    }

    static function mapOfAgeValidation($age){
        return [
            'isAgeValid'=>Validator::validateAge($age)
        ];
    }
    static function mapOfFridgeValidation($fridge){
        return [
            'isFridgeNameValid'=>Validator::validateFridge($fridge)
        ];
    }
    static function mapOfRemarksValidation($remarks){
        return ['isRemarksValid'=> validator::validateRemarks($remarks)];
    }
    static function mapOfContactValidation($contact){
        return ['isContactValid' => validator::validateContact($contact)];
    }
}