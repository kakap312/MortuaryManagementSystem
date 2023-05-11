<?php
namespace App\Corp\domain\model;
class Slot {
    private $id;
    private $slotId;
    private $name;
    private $state;

    public function __construct($id,$name,$state,$slotId){
        $this->id = $id;
        $this->name = $name;
        $this->state = $state;
        $this->slotId = $slotId;
    }

    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setName($name){$this->name = $name;}
    public function getName(){return $this->name;}
    public function setState($state){$this->state = $state;}
    public function getState(){return $this->state;}
    public function setSlotId($id){$this->slotId = $id;}
    public function getSlotId(){return $this->slotId;}

}