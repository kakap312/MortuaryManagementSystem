<?php
namespace App\Service\domain\model;
class SavedServiceInfo{
    private $id;
    private $serviceName;
    private $regularFee;
    public $vipFee;
    private $per;
    private $createdAt;
    private $updatedAt;


    public function __construct($id,$serviceName,$regularFee,$vipFee,$createdAt,$updatedAt,$per){
        $this->id = $id == "" ?uniqid():$id;
        $this->serviceName = $serviceName;
        $this->regularFee = $regularFee;
        $this->vipFee = $vipFee;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->per = $per;
    }

    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setServiceName($name){$this->serviceName=$name;}
    public function getServiceName(){return $this->serviceName;} 
    public function setRegularFee($fee){$this->regularFee = $fee;}
    public function getRegularFee(){return $this->regularFee;}
    public function setVipFee($fee){$this->vipFee = $fee;}
    public function getVipFee(){return $this->vipFee;}
    public function setCreatedAt($date){$this->createdAt = $date;}
    public function getCreatedAt(){return $this->createdAt;}
    public function setUpdatedAt(){$this->updatedAt = $updatedAt;}
    public function getUpdatedAt(){return $this->updatedAt;}
    public function getPer(){return $this->per;}
    public function setPer($per){$this->per = $per;}
}