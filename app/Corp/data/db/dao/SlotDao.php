<?php
namespace App\Corp\data\db\dao;
use  App\Corp\data\db\model\DbSlot;
class SlotDao{

    public static function insertSlot($dbSlotInfo)
    {

    }
    public static function findAllSlots(){
        return DbSlot::all();
    }
    public static function findAvailableSlotByFridgeId($fridgeId){

        try {
            $GLOBALS['frigeid'] = $fridgeId;
            $GLOBALS['state'] = "free";
            return DbSlot::where(function($query){
                $query->where('fridgeId','=',$GLOBALS['frigeid']);
            })->where(function($query){
                $query->where('state','=',$GLOBALS['state']);
            })->get();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
         
    }
    public static function findSlotByIdOrName($idOrName){
        try {
            $GLOBALS['id'] = $idOrName;
            return DbSlot::where(function($query){
                $query->where('slotId','=',$GLOBALS['id']);
                $query->orWhere('name','=',$GLOBALS['id']);
                $query->orWhere('id','=',$GLOBALS['id']);
            })->get()->first();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public static function updateSlotById($id,$dbSlot){
        try {
            DbSlot::where('slotId','=',$id)->update($dbSlot);
            return true;
        } catch (\Throwable $th) {
           // return $th->getMessage();
           return false;
        }
    }
}