<?php
namespace App\Clearance\domain\model;
class Clearance{
    public $clearanceId;
    public $status;
    private $createdAt;
    private $corpseCode;

    public function __construct($clearanceId,$status,$createdAt,$corpseCode){
        $this->clearanceId = $clearanceId;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->corpseCode = $corpseCode;
    }

    public function setClearanceId($id){$this->clearanceId = $id;}
    public function getClearanceId(){return $this->clearanceId;}
    public function setStatus($status){$this->status = $status;}
    public function getStatus(){return $this->status;}
    public function setCreatedAt($date){$this->createdAt = $date;}
    public function getCreatedAt(){return $this->createdAt;}
    public function setCorpseCode($code){$this->corpseCode = $code;}
    public function getCorpseCode(){return $this->corpseCode;}
}
