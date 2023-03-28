<?php
namespace App\Corp\data\db\dao;
use  App\Corp\data\db\model\DbCorp;
class CorpDao{

    public static function insertCorp($dbCorpInfo)
    {
        try {
            DbCorp::create($dbCorpInfo);
            return true;
        } catch (\Throwable $th) {
            return false;
           // return $th->getMessage();
        }
    }
    public static function findAllCorps(){
        return DbCorp::skip(0)->take(5)->get();
    }
    public static function updateCorp($id,$dbCorp){
        try {
            DbCorp::where('corpId','=',$id)->update($dbCorp);
            return true;
        } catch (\Throwable $th) {
            //return false;
           return $th->getMessage();
        }
    }
    public static function findCoprById($id)
    {
        try {
            $GLOBALS['id'] = $id;
            return DbCorp::where(function($query){
                $query->where('corpseCode','=',$GLOBALS['id']);
            })->get()->first();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
       
    }
    static function totalNumberOfCorpse(){
        return DbCorp::all()->count();
    }
    
    static function  deleteCorpById($id){
        try {
            DbCorp::where('corpId',$id)->delete();
            return true;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}