<?php
namespace App\Clearance\presentation\model;
class UiClearance{
    public $id;
    public $state;
    public $date;



    public function __construct($id,$date,$state){
        $this->id = $id;
        $this->date = $date;
        $this->state = $state;
    }
    
}