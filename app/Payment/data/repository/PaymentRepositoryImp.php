<?php
use App\payment\domain\repository\PaymentRepositroy;
use App\payment\data\db\dao\PaymentDao;
use App\payment\domain\factory\PaymentFactory;
class PaymentRepositoryImp implements PaymentRepository {

    public   function makePayment($savedPaymentInfo){
        // validateInputs
        //maps domain to db model
        //insert data into database
        $savedPaymentInfo = PaymentFactory::makeSavedPaymentInfo();
        $validationResult = new paymentFieldValidation($savedPaymentInfo);
            return (PaymentDao::insertPayment(DomainToDbPaymentMapper::map($savedPaymentInfo)))? new Result(null,true): new Result(null,false);
    }
    public  function fetchAllPayment(){}
    public  function fetchPaymentById(){}
    public  function deletePayment($id){}
}