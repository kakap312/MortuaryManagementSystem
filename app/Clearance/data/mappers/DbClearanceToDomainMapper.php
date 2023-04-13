<?php
namespace App\Clearance\data\mappers;
use App\Clearance\domain\model\Clearance;

class DbClearanceToDomainMapper{
    public static function map($dbClearance){
        if(is_array($dbClearance)){
            return new Clearance(
                $dbClearance['clearanceId'],
                $dbClearance['corpseId'],
                $dbClearance['createdAt'],
                $dbClearance['status']
            );
        }else{
            return new Clearance(
                $dbClearance->get('clearanceId'),
                $dbClearance->get('corpseId'),
                $dbClearance->get('createdAt'),
                $dbClearance->get('status')
            );
        }
    }
}