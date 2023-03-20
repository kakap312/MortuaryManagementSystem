<?php
namespace App\core\services;
class DateToDaysConversion{
    static function convert($fisrtDate,$secondDate){
        $timestampForFirstDate = strtotime($fisrtDate);
        $timestampForSecondDate = strtotime($secondDate);
        return round(($timestampForSecondDate-$timestampForFirstDate)/(60*60*24));
    }
}