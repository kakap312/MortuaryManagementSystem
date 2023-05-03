<?php
namespace App\Service\domain\model;
class SavedServiceInfo{
    private $id;
    private $serviceName;
    private $serviceFee;
    private $per;
    private $createdAt;
    private $updatedAt;


    public function __construct($id,$serviceName,$serviceFee,$createdAt,$updatedAt,$per){
        $this->id = $id == "" ?uniqid():$id;
        $this->serviceName = $serviceName;
        $this->serviceFee = $serviceFee;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->per = $per;
    }

    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setServiceName($name){$this->serviceName=$name;}
    public function getServiceName(){return $this->serviceName;} 
    public function setServiceFee($serviceFee){$this->serveceFee = $serviceFee;}
    public function getServiceFee(){return $this->serviceFee;}
    public function setCreatedAt($date){$this->createdAt = $date;}
    public function getCreatedAt(){return $this->createdAt;}
    public function setUpdatedAt(){$this->updatedAt = $updatedAt;}
    public function getUpdatedAt(){return $this->updatedAt;}
    public function getPer(){return $this->per;}
    public function setPer($per){$this->per = $per;}
}