<?php
namespace App\Service\domain\model;
class Service{
    private $id;
    private $name;
    private $serviceFee;

    public function __construct($id,$name,$serviceFee){
        $this->id = $id;
        $this->name = $name;
        $this->serviceFee = $serviceFee;
    }

    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setName($name){$this->name=$name;}
    public function getName(){return $this->name;}
    public function setServiceFee($serviceFee){$this->serveceFee = $serviceFee;}
    public function getServiceFee(){return $this->serviceFee;}
}