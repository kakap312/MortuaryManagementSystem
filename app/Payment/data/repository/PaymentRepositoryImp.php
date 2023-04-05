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
    public  function fetchAllPayment(){
       $result =  PaymentDao::findAllPayements();
       return (is_null($result) || $result->count() == 0 )?new Result(null,false): new Result($result,true);
    }
    public  function fetchPaymentById($id){
        $result = PaymentDao::findPaymentById($id);
        return (is_null($result) || count($result) == 0 )?new Result(null,false): new Result($result,true);
    }
    public  function deletePayment($id){
        $result = PaymentDao::deletePayment($id);
        return (($result))?new Result(null,true): new Result(null,false);
    }
    public  function updatePaymentById($savedPaymentInfo,$id){
        $result = PaymentDao::updatePayment(DomainToDbPaymentMapper::map($savedPaymentInfo),$id);
        return (($result))?new Result(null,true): new Result(null,false);
    }
}