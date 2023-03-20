<?php
namespace App\Billing\presentation\model;
class UiBilling {
    public $id;
    public $date;
    public $serviceNames;
    public $amount;
    public $type;

    function __construct($id,$date,$amount,$serviceNames,$type){
        $this->id = $id;
        $this->date = $date;
        $this->amount = $amount;
        $this->serciceNames = $serviceNames;
        $this->type = $type;
    }

}