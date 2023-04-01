<?php
namespace App\Billing\domain\model;

class Billing{
    private $billId;
    //private $services; // list of billing services domain object
    private $amount;
    private $createdAt;
    private $dueDays;
    private $extraDays;
    private $servicefee;
    private $corpseCode;
    private $billPurpose;

    public function __construct($billId,$amount,$createdAt,$dueDays,$extraDays,$servicefee,$corpseCode,$billPurpose){
        $this->billId = $billId;
        //$this->services = $services;
        $this->amount = $amount;
        $this->createdAt = $createdAt;
        $this->dueDays = $dueDays;
        $this->extraDays = $extraDays;
        $this->servicefee = $servicefee;
        $this->corpseCode = $corpseCode;
        $this->billPurpose = $billPurpose;

        
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
    function setDueDays($dueDays){$this->dueDays = $dueDays;}
    function getDueDays(){return $this->dueDays;}
    function setExtraDays($extraDays){$this->extraDays = $extraDays;}
    function getExtraDays(){return $this->extraDays;}
    function setServiceFee($servicefee){$this->servicefee = $servicefee;}
    function getServiceFee(){return $this->servicefee;}
    function setCorpseCode($code){$this->corpseCode = $code;}
    function getCorpseCode(){return $this->corpseCode;}
    function setBillPurpose($billpurpose){$this->billPurpose = $billpurpose;}
    function getBillPurpose(){return $this->billPurpose;}
}