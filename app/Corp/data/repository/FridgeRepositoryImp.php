<?php
namespace App\Corp\data\repository;
use App\Corp\data\db\dao\FridgeDao;
use App\Corp\domain\repository\FridgeRepository;
use App\core\domain\Result;
use App\Corp\data\mappers\DomainToDbFridgeMapper;
use App\Corp\data\mappers\DbFridgeToDomainMapper;

class FridgeRepositoryImp implements FridgeRepository{

    static function createFridge($savedCorpInfo){}
    public static function fetchFridge(){
        if(is_null(FridgeDao::findAllFridge())){
            return new Result(null,false);
        }else{
            $dbFridges = FridgeDao::findAllFridge();
            $fridges = array();
            foreach ($dbFridges as $dbFridge) {
                array_push($fridges,DbFridgeToDomainMapper::map($dbFridge));
            }
            return new Result($fridges,true);
        }
    }
    public static function updateFridge($savedDrugsInfo){}
    public static function searchFridgeByNameOrId($idOrName){
        $dbFridge = FridgeDao::findFidgeByIdOrName($idOrName);
        if(is_null($dbFridge)){
            return new Result(null,false);
        }else{
            $fridge = DbFridgeToDomainMapper::map($dbFridge);
            // $fridges = array();
            // foreach ($dbFridges as $dbFridge) {
            //     array_push($fridges,DbFridgeToDomainMapper::map($dbFridge));
            // }
            return new Result($fridge,true);
        }
    }
    public static function  deleteFridge($id){}

    
    
    
}