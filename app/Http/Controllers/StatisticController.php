<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statistics\data\StatisticsRepositoryImp;
use App\Statistics\presentation\StatisticsViewModel;

class StatisticController extends Controller
{
    private $StatisticsRepositoryImp;
    //
    public function __construct(){
        $this->StatisticsRepositoryImp = new StatisticsRepositoryImp();
    }

    public function getStatistics(){
        $corpseStatisticsResult = $this->StatisticsRepositoryImp->getCorpseStatistics();
        $BillStatisticsResult = $this->StatisticsRepositoryImp->getBillingStatistis();
        $paymentStatisticsResult = $this->StatisticsRepositoryImp->getPaymentStatistics();
        $statisticsModel = array_merge(
            $corpseStatisticsResult->getData(),
            $BillStatisticsResult->getData(),
            $paymentStatisticsResult->getData()

        );
        return response()->json(StatisticsViewModel::mapOfStatistics($statisticsModel));
    }
}
