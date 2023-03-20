<?php
class AccountLoginValidation{
    public  $isUsernameValid;
    public  $isPasswordValid;

    public function __construct($isUsernameValid,$isPasswordValid){
        $this->isUsernameValid = $isUsernameValid;
        $this->isPasswordValid = $isPasswordValid;
    }
    public function getIsUserNameValid(){
        return $this->isUsernameValid;
    }
    public function isPasswordValid(){
        return $this->isPasswordValid;
    }

}