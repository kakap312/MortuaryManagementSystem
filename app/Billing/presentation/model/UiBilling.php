<?php
namespace App\Billing\presentation\model;
class UiBilling {
    public $id;
    public $date;
    //public $serviceNames;
    public $servicefee;
    public $corpseCode;
    public $amount;
    public $extraDays;
    public $dueDays;
    public $billPurpose;


    function __construct($id,$date,$amount,$servicefee,$corpseCode,$extraDays,$dueDays,$billPurpose){
        $this->id = $id;
        $this->date = $date;
        $this->amount = $amount;
        //$this->serciceNames = $serviceNames;
        $this->servicefee = $servicefee;
        $this->corpseCode = $corpseCode;
        $this->extraDays = $extraDays;
        $this->dueDays = $dueDays;
        $this->billPurpose = $billPurpose;
    }

}