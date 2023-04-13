<?php
namespace App\Clearance\domain\model;
class Clearance{
    private $clearanceId;
    private $corpseId;
    private $status;
    private $createdAt;
    private $corpseCode;

    public function __construct($clearanceId,$corpseId,$status,$createdAt,$corpseCode){
        $this->clearanceId = $clearanceId;
        $this->corpseId = $corpseId;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->corpseCode = $corpseCode;
    }

    public function setClearanceId($id){$this->clearanceId = $id;}
    public function getClearanceId(){return $this->clearanceId;}
    public function setCorpseId($id){$this->corpseId = $id;}
    public function getCorpseId(){return $this->corpseId;}
    public function setStatus($status){$this->status = $status;}
    public function getStatus(){return $this->status;}
    public function setCreatedAt($date){$this->createdAt = $date;}
    public function getCreatedAt(){return $this->createdAt;}
    public function setCorpseCode($code){$this->corpseCode = $code;}
    public function getCorpseCode(){return $this->corpseCode;}
}
