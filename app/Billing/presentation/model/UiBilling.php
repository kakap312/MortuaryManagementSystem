<?php
namespace App\Billing\presentation\model;
class UiBilling {
    public $id;
    public $date;
    public $serviceNames;
    public $amount;
    public $extraDays;
    public $dueDays;


    function __construct($id,$date,$amount,$serviceNames,$extraDays,$dueDays){
        $this->id = $id;
        $this->date = $date;
        $this->amount = $amount;
        $this->serciceNames = $serviceNames;
        $this->extraDays = $extraDays;
        $this->dueDays = $dueDays;
    }

}