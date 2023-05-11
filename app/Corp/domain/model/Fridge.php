<?php
namespace App\Corp\domain\model;
class Fridge {
    private $id;
    private $name;
    private $state;
    private $fridgeId;

    public function __construct($id,$fridgeId,$name,$state){
        $this->id = $id;
        $this->name = $name;
        $this->state = $state;
        $this->fridgeId = $fridgeId;
    }

    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setName($name){$this->name = $name;}
    public function getName(){return $this->name;}
    public function setState($state){$this->state = $state;}
    public function getState(){return $this->state;}
    public function setFridgeId($id){$this->fridgeId = $id;}
    public function getFridgeId(){return $this->fridgeId;}

}