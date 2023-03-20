<?php
namespace App\Service\presentation\model;
class ServiceViewModel{
    public $id;
    public $name;
    public $fee;

    function __construct($id,$name,$fee){
        $this->id = $id;
        $this->name = $name;
        $this->fee = $fee;
    }
}