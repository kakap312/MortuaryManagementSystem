<?php
namespace App\core\services;
class DateToDaysConversion{
    static function convert($fisrtDate,$secondDate){
        $timestampForFirstDate = strtotime($fisrtDate);
        $timestampForSecondDate = strtotime($secondDate);
        return round(($timestampForSecondDate-$timestampForFirstDate)/(60*60*24));
        // if(date("Y-m-d") > $secondDate){
        //     $timestampForFirstDate = strtotime($secondDate);
        //     $timestampForSecondDate = strtotime(date("Y-m-d"));
        //     return round(($timestampForSecondDate-$timestampForFirstDate)/(60*60*24));
        // }else{
        //     return round(($timestampForSecondDate-$timestampForFirstDate)/(60*60*24));
        // }
    }
}