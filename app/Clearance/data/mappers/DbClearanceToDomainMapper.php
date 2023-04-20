<?php
namespace App\Clearance\data\mappers;
use App\Clearance\domain\model\Clearance;

class DbClearanceToDomainMapper{
    public static function map($dbClearance){
        if(is_array($dbClearance)){
            return new Clearance(
                $dbClearance['clearanceId'],
                $dbClearance['status'],
                $dbClearance['createdAt'],
                $dbClearance['corpseId'],
            );
        }else{
            return new Clearance(
                $dbClearance->get('clearanceId'),
                $dbClearance->get('status'),
                $dbClearance->get('createdAt'),
                $dbClearance->get('corpseId'),
            );
        }
    }
}