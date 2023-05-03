<?php
namespace App\Account\domain\model;
class SavedAccountInfo{
    private $id;
    private $accountType;
    private $userName;
    private $password;
    private $createdAt;

    public function __construct($id,$userName,$password,$accountType,$createdAt){
        $this->id = $id == ""?uniqid():$id;
        $this->userName = $userName;
        $this->password = $password;
        $this->accountType = $accountType;
        $this->createdAt = $createdAt;
    }

    function getId(){return $this->id;}
    function setId($id){$this->id = $id;}
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
    public function setCreatedAt($date){
        $this->createdAt = $createdAt;
    }
    public function getCreatedAt(){
        return $this->createdAt;
    }
}