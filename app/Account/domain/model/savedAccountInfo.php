<?php

class SavedAccountInfo{
    private $fullName;
    private $userName;
    private $password;
    public function __construct($fullName,$userName,$password){
        $this->userName = $userName;
        $this->password = $password;
        $this->fullName = $fullName;
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
    public function setFullName($fullName){
        $this->fullName = $fullName;
    }
    public function getFullName(){
        return $this->fullName;
    }
}