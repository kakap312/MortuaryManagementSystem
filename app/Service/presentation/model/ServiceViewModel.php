<?php
namespace App\Service\presentation\model;
class ServiceViewModel{
    public $id;
    public $name;
    public $regularFee;
    public $vipFee;
    public $per;
    public $dateCreated;

    function __construct($id,$name,$regularFee,$vipFee,$per,$dateCreated){
        $this->id = $id;
        $this->name = $name;
        $this->regularFee = $regularFee;
        $this->vipFee = $vipFee;
        $this->per = $per;
        $this->dateCreated = $dateCreated;
    }
}