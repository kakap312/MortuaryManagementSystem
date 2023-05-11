<?php
namespace App\Payment\domain\model;

class Payment{
    private $id;
    private $paymentId;
    private $billId;
    private $amount;
    private $description;
    private $createdAt;
    private $updatedAt;

    public function __construct($id,$paymentId,$billId,$amount,$description,$createdAt,$updatedAt){
        $this->id = $id;
        $this->paymentId = $paymentId;
        $this->billId = $billId;
        $this->amount = $amount;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->description = $description;
    }

    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setBillId($billId){$this->billId = $billId;}
    public function getBillId(){return $this->billId;}
    public function setAmount($amount){$this->amount = $amount;}
    public function getAmount(){return $this->amount;}
    public function getCreatedAt(){return $this->createdAt;}
    public function setUpdatedAt($date){$this->udatedAt = $date;}
    public function getUpdatedAt(){return $this->updatedAt;}
    public function setDescription($description){$this->description = $description;}
    public function getDescription(){return $this->description;}
    public function setPaymentId($id){$this->paymentId = $paymentId;}
    public function getPaymentId(){return $this->paymentId;}

}