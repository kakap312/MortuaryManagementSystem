<?php
namespace App\Corp\data\db\dao;
use  App\Corp\data\db\model\DbFridge;
class FridgeDao{

    public static function insertFridge($dbFridgeInfo)
    {

    }
    public static function findAllFridge(){
        return DbFridge::all();
    }
    public static function findFidgeByIdOrName($id){
        $GLOBALS['id'] = $id;
        try {
            return DbFridge::where(function($query){
                $query->where('fridgeId','=',$GLOBALS['id']);
                $query->orWhere('name','=',$GLOBALS['id']);
                $query->orWhere('id','=',$GLOBALS['id']);
            })->get()->first();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function updateFridge($savedCorpInfo){
        
    }
}