<?php
namespace App\Account\domain\model;
class Account{
    private $id;
    private $createdAt;
    private $username;
    private $password;
    private $accountType;

    public function __construct($id,$createdAt,$username,$password,$accountType){
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->username = $username;
        $this->password = $password;
        $this->accountType = $accountType;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function getUsername(){
        return $this->username;
    }
    public function setPassword($password){
        $this->password  = $password;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setCreatedAt($date){
        $this->createdAt  = $date;
    }
    public function getCreatedAt(){
        return $this->createdAt;
    }
    public function setAccountType($type){
        $this->accountType  = $type;
    }
    public function getAccountType(){
        return $this->accountType;
    }
}