<?php
namespace App\payment\domain\model;
class SavedPaymentInfo{
    private $billId;
    private $amount;
    private $description;
    private $createdAt;
    private $updatedAt;

    public function __construct($billId,$amount,$description,$createdAt,$updatedAt){
        $this->billId = $billId;
        $this->amount = $amount;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->description = $description;
    }

    public function setId($billId){$this->billId = $billId;}
    public function getId(){return $this->billId;}
    public function setAmount($amount){$this->amount = $amount;}
    public function getAmount(){return $this->amount;}
    public function getCreatedAt(){return $this->createdAt;}
    public function setUpdatedAt($date){$this->udatedAt = $date;}
    public function getUpdatedAt(){return $this->updatedAt;}
    public function setDescription($description){$this->description = $description;}
    public function getDescription(){return $this->description;}
}