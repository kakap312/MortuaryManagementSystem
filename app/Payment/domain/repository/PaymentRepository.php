<?php
namespace App\payment\domain\repository;
abstract class PaymentRepository {
    public abstract  function makePayment($savedPaymentInfo);
    public abstract function fetchAllPayment();
    public abstract function fetchPaymentById();
    public abstract function deletePayment($id);
}