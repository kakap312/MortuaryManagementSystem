<?php
namespace App\Account\presentation\model;
class AccountLoginUiModel{
    public $id;
    public $username;
    public $accountType;

    public function __construct($id,$username,$accountType){
        $this->id = $id;
        $this->username = $username;
        $this->accountType = $accountType;
    }
}
