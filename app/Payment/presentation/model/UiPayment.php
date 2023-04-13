<?php
namespace App\Payment\presentation\model;
class UiPayment{
    public $paymentId;
    public $dateCreated;
    public $billId;
    public $amount;
    public $description;

    public function __construct($paymentId,$billId,$amount,$dateCreated,$description){
        $this->dateCreated = $dateCreated;
        $this->billId = $billId;
        $this->amount = $amount;
        $this->description = $description;
        $this->paymentId = $paymentId;
    }

}