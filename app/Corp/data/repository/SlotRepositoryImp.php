<?php
namespace App\Corp\data\repository;
use App\Corp\data\db\dao\SlotDao;
use App\Corp\domain\repository\SlotRepository;
use App\core\domain\Result;
use App\Corp\data\mappers\DomainToDbSlotMapper;
use App\Corp\data\mappers\DbSlotToDomainMapper;

class SlotRepositoryImp implements SlotRepository{

    static function createSlot($savedCorpInfo){}
    public static function fetchSlots(){
        $dbSlots = SlotDao::findAllSlots();
        if(is_null($dbSlots)){
            return new Result(null,false);
        }else{
            $slots = array();
            foreach ($dbSlots as $dbSlot) {
                array_push($slots,DbSlotToDomainMapper::map($dbSlot));
            }
            return new Result($slots,true);
        }
    }
    public static function fetchAvailableSlots($id){
        $dbSlots = SlotDao::findAvailableSlotByFridgeId($id);
        if(is_null($dbSlots)){
            return new Result(null,false);
        }else{
            $slots = array();
            foreach ($dbSlots as $dbSlot) {
                array_push($slots,DbSlotToDomainMapper::map($dbSlot));
            }
            return new Result($slots,true);
        }
    }
    public static function updateSlot($id,$dbSlot){
        if(SlotDao::updateSlotById($id,$dbSlot)){
            return new Result(null,true);
        }else{
            return new Result(SlotDao::updateSlotById($id,$dbSlot),false);
        }
    }
    public static function searchSlotByNameOrId($nameOrId){
        $dbSlot = SlotDao::findSlotByIdOrName($nameOrId);
        if(is_null($dbSlot)){
            return new Result(null,false);
        }else{
            $slot = DbSlotToDomainMapper::map($dbSlot);
            // $slots = array();
            // foreach ($dbSlots as $dbSlot) {
            //     array_push($slots,DbSlotToDomainMapper::map($dbSlot));
            // }
            return new Result($slot,true);
        }
    }
    public static function  deleteSlot($id){}

    
    
    
}