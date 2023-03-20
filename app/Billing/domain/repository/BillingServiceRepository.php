<?php
namespace App\Billing\domain\repository;
interface BillingServiceRepository{
    public static function createBillingService($dbBilling);
    public static function updateBillingService($id,$dbBilling);
    public static function fetchBillingServiceByBillingId($billingId);
    
}