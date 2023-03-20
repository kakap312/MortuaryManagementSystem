<?php
namespace App\Corp\domain\model;
class Fridge {
    private $id;
    private $name;
    private $state;

    public function __construct($id,$name,$state){
        $this->id = $id;
        $this->name = $name;
        $this->state = $state;
    }

    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setName($name){$this->name = $name;}
    public function getName(){return $this->name;}
    public function setState($state){$this->state = $state;}
    public function getState(){return $this->state;}

}