<?php
namespace App\Clearance\domain\model;
class SavedClearanceInfo{
    private $id;
    private $corpseId;
    private $status;
    private $createdAt;
    private $updatedAt;

    public function __construct($id,$corpseId,$status,$createdAt,$updatedAt){
        $this->id = $id;
        $this->corpseId = $corpseId;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    function getId(){return $this->id;}
    function setId($id){ $this->id = $id;}
    function getCorpseId(){return $this->corpseId;}
    function setCorpseId($corpseId){$this->corpseId = $corpseId;}
    function getStatus(){return $this->status;}
    function setStatus($status){$this->status = $status;}
    function setCreatedAt($date){$this->createdAt = $date;}
    function getCreatedAt(){return $this->createdAt;}
    function setUpdatedAt($date){$this->updatedAt = $date;}
    function getUpdatedAt(){return $this->updatedAt;}
    
}