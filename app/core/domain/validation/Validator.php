<?php
namespace App\core\domain\validation;
class Validator{

    static function validateName($name){
        $isValid=true;
        if($name==""){
            $isValid = false;
        }else if(strlen($name) >= 30 || strlen($name)<= 0){
            $isValid = false;
        }
        return $isValid;
    }
    static function validateDate($date){
        $isValid =true;
        if($date == ""){
            $isValid = false;
        }
        return $isValid;
    }
    static function validateSex($sex){
        $isValid = true;
        if($sex == ""){
            $isValid = false;
        }
        return $isValid;
    }
    static function validateAge($age){
        $isValid = true;
        if($age == ""){
            $isValid = false;
        }else if($age>=200){
            $isValid = false;
        }
        return $isValid;
    }
    static function validateFridge($fridge){
        $isValid=true;
        if($fridge == ""){
            $isValid = false;
        }
        return $isValid;
    }
    static function validateSlot($slot){
        $isValid=true;
        if($slot == ""){
            $isValid = false;
        }
        return $isValid;
    }
    static function validateContact($contact){
        $isValid=true;
        if($contact == ""){
            $isValid = false;
        }else if(strlen($contact)>10 || strlen($contact)<10){
            $isValid = false;
        }
        return $isValid;
    }
    static function validateRemarks($remarks){
        $isValid = true;
        if($remarks == ""){
            $isValid = false;
        }else if(strlen($remarks)>100){
            $isValid = false;
        }
        return $isValid;
    }

}
