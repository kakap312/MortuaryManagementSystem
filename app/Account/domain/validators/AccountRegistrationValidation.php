<?php
class AccountRegistrationValidation{
    public $isUsernameValid;
    public $isPasswordValid;
    public $isFullNameValid;

    public function __construct($isUsernameValid,$isPasswordValid,$isFullNameValid){
        $this->isUsernameValid = $isUsernameValid;
        $this->isUsernameValid = $isPasswordValid;
        $this->isUsernameValid= $isFullNameValid;
    }

}