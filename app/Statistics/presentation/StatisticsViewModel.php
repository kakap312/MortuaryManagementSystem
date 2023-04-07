<?php
namespace App\Statistics\presentation;
class StatisticsViewModel{
    static function  mapOfStatistics($data){
        return [
            'statistics'=>$data
        ];
    }
}