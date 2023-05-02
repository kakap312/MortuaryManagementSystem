<?php
namespace App\payment\data\repository;
use App\payment\domain\repository\PaymentRepositroy;
use App\payment\data\db\dao\PaymentDao;
use App\payment\data\mappers\DomainToDbPaymentMapper;
use App\payment\data\mappers\DbPaymentToDomainMapper;
use App\payment\domain\repository\PaymentRepository;
use App\core\domain\Result;

class PaymentRepositoryImp implements PaymentRepository {

    public function makePayment($savedPaymentInfo){
       $result =  PaymentDao::insertPayment(DomainToDbPaymentMapper::map($savedPaymentInfo));
        return($result)?new Result(null,true):  new Result($result,false);     
    }
    public  function fetchAllPayment(){
       $result =  PaymentDao::findAllPayements();
        if(is_null($result) || count($result) == 0 ){
            return new Result(null,false);
        }else{
            $payments = array_map(function($dbpayment){
                return DbPaymentToDomainMapper::map($dbpayment);
            },$result->toArray());
            return new Result($payments,true);
        }
    }
    public  function fetchPaymentById($id){
        $dbPayments = PaymentDao::findPaymentById($id);
        if(is_null($dbPayments) || $dbPayments->count() == 0 ){
            return new Result(null,false);
        }else{
            if($dbPayments->count() >= 1){
                $payments = array();
                foreach ($dbPayments->toArray() as $dbpayment) {
                    array_push($payments,DbPaymentToDomainMapper::map($dbpayment));
                }
                return new Result($payments,true);
            } 
        }
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