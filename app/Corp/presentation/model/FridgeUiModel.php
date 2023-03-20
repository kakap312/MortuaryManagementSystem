<?php
namespace App\Corp\presentation\model;

class FridgeUiModel{
    public $id;
    public $name;

    public function __construct( $id,$name){
        $this->id = $id;
        $this->name = $name;
    }
}