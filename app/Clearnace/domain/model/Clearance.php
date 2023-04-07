<?php
class Clearance{
    private $clearanceId;
    private $corpseId;
    private $status;
    private $createdAt;

    public function __construct($clearanceId,$corpseId,$status,$createdAt){
        $this->clearanceId = $clearanceId;
        $this->corpseId = $corpseId;
        $this->status = $status;
        $this->createdAt = $createdAt;
    }

    public function setClearanceId($id){$this->clearanceId = $id;}
    public function getClearanceId(){return $this->clearanceId;}
    public function setCorpseId($id){$this->corpseId = $id;}
    public function getCorpseId(){return $this->corpseId;}
    public function setStatus($status){$this->status = $status;}
    public function getStatus(){return $this->status;}
}
