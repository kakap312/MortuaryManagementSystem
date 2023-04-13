<?php
namespace App\Clearance\data\repository;
use App\Clearance\domain\repository\ClearanceRepository;
use App\Clearance\data\db\dao\ClearanceDao;
use App\Clearance\data\mappers\DomainToDbClearanceMapper;
use App\core\domain\Result;
use App\Clearance\data\mappers\DbCLearanceToDomainMapper;


class ClearanceRepositoryImp implements CLearanceRepository{

    public function createClearance($savedClearanceInfo){
       $result =  ClearanceDao::insertClearance(DomainToDbClearanceMapper::map($savedClearanceInfo));
       return ($result)?new Result(null,true): new Result(null,false);
    }
    public function fetchAllClearance(){
        $dbClearances = ClearanceDao::findAllClearance();
        if(is_null($dbClearances) || $dbClearances->count() == 0){
            return new Result(null,false);
        }else{
            $clearance = array_map(function($dbClearance){
                return DbClearanceToDomainMapper::map($dbClearance);
            }, $dbClearances->toArray());
            return new Result($clearance,true);
        }
    }
    public function updateClearance($id,$dbClearance){

    }
    public function deleteClearance($id){

    }
   
    public function fetchClearanceById($id){
        $dbClearance =  ClearanceDao::findClearanceBy($id);
        return (is_null($dbClearance) || $dbClearance->count() == 0 )?new Result(null,false):
         new Result(DbClearanceToDomainMapper::map($dbClearance),true);
    }

}