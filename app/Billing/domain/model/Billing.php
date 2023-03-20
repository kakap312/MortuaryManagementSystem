<?php
namespace App\Billing\domain\model;

class Billing{
    private $billId;
    private $services; // list of billing services domain object
    private $amount;
    private $createdAt;
    private $type;

    public function __construct($billId,$services,$amount,$createdAt,$type){
        $this->billId = $billId;
        $this->services = $services;
        $this->amount = $amount;
        $this->createdAt = $createdAt;
        $this->type = $type;
        
    }

    function setBillId($billId){$this->billId = $billId;}
    function getBillId(){return $this->billId;}
    function setServices($services){$this->services = $services;}
    function getService(){return $this->services;}
    function setCorpse($corpse){$this->corpse = $corpse;}
    function getCorpse(){return $this->corpse;}
    function setAmount($amount){$this->amount = $amount;}
    function getAmount(){return $this->amount;}
    function setCreatedAt($createdAt){$this->createdAt = $createdAt;}
    function getCreatedAt(){return $this->createdAt;}
    function setType($type){$this->type = $type;}
    function getType(){return $this->type;}

}