<?php
namespace App\payment\data\repository;
use App\payment\domain\repository\PaymentRepositroy;
use App\payment\data\db\dao\PaymentDao;
use App\payment\data\mappers\DomainToDbPaymentMapper;
use App\payment\domain\repository\PaymentRepository;
use App\core\domain\Result;

class PaymentRepositoryImp implements PaymentRepository {

    public function makePayment($savedPaymentInfo){
       $result =  PaymentDao::insertPayment(DomainToDbPaymentMapper::map($savedPaymentInfo));
        return($result)?new Result(null,true):  new Result($result,false);     
    }
    public  function fetchAllPayment(){}
    public  function fetchPaymentById(){}
    public  function deletePayment($id){}
}