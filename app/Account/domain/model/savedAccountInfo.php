<?php
namespace App\Account\domain\model;
class SavedAccountInfo{
    private $accountType;
    private $userName;
    private $password;
    public function __construct($userName,$password,$accountType){
        $this->userName = $userName;
        $this->password = $password;
        $this->accountType = $accountType;
    }

    public function setUserName($userName){
        $this->userName = $userName;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setAccountType($accountType){
        $this->accountType = $accountType;
    }
    public function getAccountType(){
        return $this->accountType;
    }
}