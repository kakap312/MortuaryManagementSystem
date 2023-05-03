<?php
namespace App\Account\presentation;
class AccountViewModel {
    
    static function mapOfAccounts($data){
        return ["account"=>$data];
    }
    static function mapOfSuccess($data){
        return ["success"=>$data];
    }
    static function mapOfValidation($data){
        return ["validationresult"=>$data];
    }
    static function mapOfFridges($data){
        return ["fridges"=>$data];
    }
    static function mapOfAccountExisting($data){
        return ["isExisting"=>$data];
    }
    static function mapOfAccoubtType($data){
        return ["acctype"=>$data];
    }
    static function mapOfPasswordValidator($data){
        return ["isPasswordValid"=>$data];
    }
    static function mapOfUsernameValidator($data){
        return ["isUsernameValid"=>$data];
    }
}
?>
