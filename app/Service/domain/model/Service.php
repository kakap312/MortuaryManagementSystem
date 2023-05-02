<?php
namespace App\Service\domain\model;
class Service{
    private $id;
    private $dateCreated;
    private $name;
    private $serviceFee;
    private $per;

    public function __construct($id,$name,$serviceFee,$per,$dateCreated){
        $this->id = $id;
        $this->name = $name;
        $this->serviceFee = $serviceFee;
        $this->per = $per;
        $this->dateCreated = $dateCreated;
    }

    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setName($name){$this->name=$name;}
    public function getName(){return $this->name;}
    public function setServiceFee($serviceFee){$this->serveceFee = $serviceFee;}
    public function getServiceFee(){return $this->serviceFee;}
    public function getPer(){return $this->per;}
    public function setPer($per){$this->per = $per;}
    public function getDateCreated(){return $this->dateCreated;}
    public function setDateCreated($date){$this->dateCreated = $date;}
}