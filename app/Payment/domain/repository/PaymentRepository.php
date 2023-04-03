<?php
namespace App\payment\domain\repository;
interface  PaymentRepository {
    public  function makePayment($savedPaymentInfo);
    public  function fetchAllPayment();
    public  function fetchPaymentById();
    public  function deletePayment($id);
}