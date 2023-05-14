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
    static function findAllClearanceLimitFive(){
        try {
            //code...
            return DbClearance::skip(0)->take(5)->get();
        } catch (\Throwable $th) {
            //throw $th;
            return false ;// $th->getMessage();
        }
        
    }
    static function findClearances(){
        try {
            //code...
            return DbClearance::all();
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    static function updateClearance($id,$dbClearance){
        try {
            DbClearance::where('clearanceId','=',$id)->update($dbClearance);
            return true;
        } catch (\Throwable $th) {
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
        try {
            $GLOBALS['id'] = $id;
            return DbClearance::where(function($query){
                $query->where('clearanceId','=',$GLOBALS['id'])
                ->orWhere('corpseId','=',$GLOBALS['id']);
            })->get();
        } catch (\Throwable $th) {
            //return $th->getMessage();
            return false;
        }
        
    }
    static function findClearanceStatus($status){
        try {
            $GLOBALS['status'] = $status;
            return DbClearance::where(function($query){
                $query->where('status','=',$GLOBALS['status']);
            })->get();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
    }
    static function fetchClearanceByDate($startDate,$endDate){
        try {
            $GLOBALS['startdate'] = $startDate;
            $GLOBALS['enddate'] = $endDate;
            return DbClearance::where(function($query){
                $query->whereDate('createdAt','>=',$GLOBALS['startdate'])
                ->WhereDate('createdAt','<=',$GLOBALS['enddate']);
            })->get();
        } catch (\Throwable $th) {
            //return $th->getMessage();
            return false;
        }
    }
    static function totalCLearance(){
        try {
            return DbClearance::all()->count();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}