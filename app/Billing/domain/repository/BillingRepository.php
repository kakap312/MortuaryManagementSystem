<?php
namespace App\Billing\domain\repository;
interface BillingRepository{
    public  function createBilling($dbBilling);
    public  function updateBilling($id,$dbBilling);
    public  function fetchBilling($corpseId);
    public  function fetchAllBillings();
    public  function fetchBillingByCorpseId($corpseId);
}