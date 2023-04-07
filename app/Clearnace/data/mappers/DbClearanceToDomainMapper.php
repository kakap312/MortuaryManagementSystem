<?php
namespace App\Clearance\data\mapper;
use App\Clearance\domain\model\Clearance;

class DbClearanceToDomainMapper{
    public static function map($dbClearance){
        return new Clearance(
            $dbClearance->get('clearanceId'),
            $dbClearance->get('corpseId'),
            $dbClearance->get('createdAt'),
            $dbClearance->get('status')
        );
    }
}