<?php
namespace App\Service\presentation\model;
class ServiceViewModel{
    public $id;
    public $name;
    public $fee;
    public $per;

    function __construct($id,$name,$fee,$per){
        $this->id = $id;
        $this->name = $name;
        $this->fee = $fee;
        $this->per = $per;
    }
}