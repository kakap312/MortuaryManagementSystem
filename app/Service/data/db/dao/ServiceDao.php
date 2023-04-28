<?php
namespace App\Service\data\db\dao;
use App\Service\data\db\model\DbService;

class ServiceDao{

    static function insert($dbService){
        try {
            DbService::create($dbService);
            return true;
        } catch (\Throwable $th) {
            return false;
           // return $th->getMessage();
        }

    }
    static function delete($billId){

    }
    static function update($billId){

    }
    static function findServiceById($id){
        try {
            $GLOBALS['id'] = $id;
            return DbService::where(function($query){
                $query->where('serviceId','=',$GLOBALS['id']);
            })->get()->first();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    static function fetchAllServices(){
        try {
            return DbService::all();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
       
        
    }

}