<?php
namespace App\Clearance\data\db\dao;
use App\CLearance\data\db\model\DbClearance;
class ClearanceDao{

    static function insertClearance($dbClearance){
        try {
            DbClearance::create($dbClearance);
            return true;
        } catch (\Throwable $th) {
            //return false;
           return $th->getMessage();
        }
    }

    static function updateClearance($id,$dbClearance){
        try {
            DbCorp::where('corpseId','=',$id)->update($dbClearance);
            return true;
        } catch (\Throwable $th) {
            //return false;
           return $th->getMessage();
        }
    }
    static function deleteClearanceById($id){
        try {
            DbClearance::where('clearanceId',$id)->delete();
            return true;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }
    static function findClearanceBy($id){
        
    }
}