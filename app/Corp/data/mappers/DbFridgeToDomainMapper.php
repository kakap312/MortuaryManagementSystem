<?php
namespace App\Corp\data\mappers;
use App\Corp\domain\model\Fridge;

class DbFridgeToDomainMapper{
    static function map($dbFridge){
        return new  Fridge(
            $dbFridge['fridgeId'],
            $dbFridge['name'],
            $dbFridge['state'],
           
        );
    }
}