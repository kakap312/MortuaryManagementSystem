<?php
namespace App\Account\presentation\model;
class AccountLoginUiModel{
    public $id;
    public $date;
    public $username;
    public $password;
    public $accountType;

    public function __construct($id,$date,$username,$password,$accountType){
        $this->id = $id;
        $this->date = $date;
        $this->username = $username;
        $this->password = $password;
        $this->accountType = $accountType;
    }
}
