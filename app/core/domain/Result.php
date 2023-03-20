<?php
namespace App\core\domain;
class Result {
    private  $data;
    private $success;

    public function __construct($data,$success){
        $this->data = $data;
        $this->success = $success;
    }
    public function setData($data){
        $this->data = $data;
    }
    public function getData(){
        return $this->data;
    }
    public function setSuccess($success){
        $this->success = $success;
    }
    public function getSuccess(){
        return $this->success;
    }
    
}