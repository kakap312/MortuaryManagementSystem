<?php
namespace App\Statistics\data;
use App\Statistics\domain\repository\StatisticsRepository;
use App\Corp\data\db\dao\CorpDao;
use App\Billing\data\db\dao\BillingDao;
use App\Payment\data\db\dao\PaymentDao;
use App\core\domain\Result;
class StatisticsRepositoryImp implements StatisticsRepository{
    public function getCorpseStatistics(){
        $totalCorpsDueForToday = CorpDao::getTotalNumberOfCorpseDueForColectionToday();
        $totalCorpse = CorpDao::totalNumberOfCorpse();
        $corpseStatistics = array(
            'corpsReadyForCollectionToday'=>$totalCorpsDueForToday,
            "totalCorpse" =>$totalCorpse
        );
        return new Result($corpseStatistics,true)  ;
        

    }
    public function getBillingStatistis(){
        $totalBill = BillingDao::totalBilling();
        $BillStatistics = array(
            "totalBill" =>$totalBill
        );
        return new Result($BillStatistics,true)  ;
        
    }
    public function getPaymentStatistics(){
        $totalpayment = PaymentDao::totalPayment();
        $paymentStatistics = array(
            "totalPayment" =>$totalpayment
        );
        return new Result($paymentStatistics,true);
    }
}