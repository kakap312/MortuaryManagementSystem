<?php
namespace App\payment\domain\factory;
use App\payment\data\repository\PaymentRepositoryImp;
class RepositoryImpFactory{
    private $paymentRepositoryImp;

    public function __construct(){
        $this->paymentRepositoryImp = new PaymentRepositoryImp() ;
    }
    function makePaymentRepositoryImp(){
        return $this->paymentRepositoryImp;
    }
}