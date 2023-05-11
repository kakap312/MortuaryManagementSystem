<?php
namespace App\Service\domain\model;
class Service{
    private $id;
    private $serviceId;
    private $dateCreated;
    private $name;
    private $regularFee;
    private $vipFee;
    private $per;

    public function __construct($id,$serviceId,$name,$regularFee,$vipFee,$per,$dateCreated){
        $this->id = $id;
        $this->serviceId = $serviceId;
        $this->name = $name;
        $this->regularFee = $regularFee;
        $this->vipFee = $vipFee;
        $this->per = $per;
        $this->dateCreated = $dateCreated;
    }

    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setServiceId($id){$this->serviceId = $id;}
    public function getServiceId(){return $this->serviceId;}
    public function setName($name){$this->name=$name;}
    public function getName(){return $this->name;}
    public function setRegularFee($fee){$this->regularFee = $fee;}
    public function getRegularFee(){return $this->regularFee;}
    public function setVipFee($fee){$this->vipFee = $fee;}
    public function getVipFee(){return $this->vipFee;}
    public function getPer(){return $this->per;}
    public function setPer($per){$this->per = $per;}
    public function getDateCreated(){return $this->dateCreated;}
    public function setDateCreated($date){$this->dateCreated = $date;}
}