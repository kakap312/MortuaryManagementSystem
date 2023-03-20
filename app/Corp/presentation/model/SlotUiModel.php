<?php
namespace App\Corp\presentation\model;

class SlotUiModel{
    public $id;
    public $name;
    public $state;

    public function __construct( $id,$name,$state){
        $this->id = $id;
        $this->name = $name;
        $this->state = $state;
    }
}