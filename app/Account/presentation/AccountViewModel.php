<?php
namespace App\Account\presentation;
class AccountViewModel {

    public $isUsernameValid;
    public $isPasswordValid;
    public $isAccountFound;
    public $content;

    public function __construct($isUsernameValid,$isPasswordValid,$isAccountFound,$content){
        $this->isUsernameValid = $isUsernameValid;
        $this->isPasswordValid = $isPasswordValid;
        $this->content = $content;
        $this->isAccountFound = $isAccountFound;
    }
}