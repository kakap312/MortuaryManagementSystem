<?php
namespace App\payment\domain\repository;
interface  PaymentRepository {
    public  function makePayment($savedPaymentInfo);
    public  function fetchAllPayment();
    public  function fetchPaymentById($id);
    public  function deletePayment($id);
    public  function updatePaymentById($savedPaymentInfo,$id);
}