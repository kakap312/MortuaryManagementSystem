<?php
namespace App\Statistics\domain\repository; 
interface StatisticsRepository{
    public function getCorpseStatistics();
    public function getBillingStatistis();
    public function getPaymentStatistics();
}