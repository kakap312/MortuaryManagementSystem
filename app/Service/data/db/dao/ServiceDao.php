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
    static function delete($id){
        try {
            DbService::where('serviceId',$id)->delete();
            return true;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    static function update($billId){

    }
    static function findServiceLimitOfFive(){
        try {
            return DbService::skip(0)->take(5)->get();
        } catch (\Throwable $th) {
            return false;
           // return $th->getMessage();
        }
       
    }
    static function findServiceById($id){
        try {
            $GLOBALS['id'] = $id;
            return DbService::where(function($query){
                $query->where('serviceId','=',$GLOBALS['id'])->
                orWhere('name','=',$GLOBALS['id']);
            })->get();
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
    static function updateService($id,$dbService){
        try {
            DbService::where('serviceId','=',$id)->update($dbService);
            return true;
        } catch (\Throwable $th) {
            //return false;
           return $th->getMessage();
        }
    }

}