<?php
namespace App\Clearance\presentation\model;
class UiClearance{
    public $id;
    public $state;
    public $date;
    public $corpseCode;



    public function __construct($id,$date,$state,$corpseCode){
        $this->id = $id;
        $this->date = $date;
        $this->state = $state;
        $this->corpseCode = $corpseCode;
    }
    
}