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
    public function fetchClearanceLimit5(){
        $dbClearances = ClearanceDao::findAllClearanceLimitFive();
        if(is_null($dbClearances) || $dbClearances->count() == 0){
            return new Result(null,false);
        }else{
            $clearance = array_map(function($dbClearance){
                return DbClearanceToDomainMapper::map($dbClearance);
            }, $dbClearances->toArray());
            return new Result($clearance,true);
        }
    }
    public function fetchAllClearance(){
        $dbClearances = ClearanceDao::findClearances();
        if(is_null($dbClearances) || $dbClearances->count() == 0){
            return new Result(null,false);
        }else{
            $clearance = array_map(function($dbClearance){
                return DbClearanceToDomainMapper::map($dbClearance);
            }, $dbClearances->toArray());
            return new Result($clearance,true);
        }
    }
    public function updateClearance($id,$savedClearanceInfo){
        $dbClearances = ClearanceDao::updateClearance($id,DomainToDbClearanceMapper::map($savedClearanceInfo));
        if(! $dbClearances){
            return new Result(null,false);
        }else{
            return new Result(null,true);
        }
    }
    public function deleteClearance($id){

    }
    public function totalNumberOfClearance(){
        $dbClearance =  ClearanceDao::totalCLearance();
        return (is_null($dbClearance) || $dbClearance == 0 )?new Result(null,false):
         new Result($dbClearance,true);
    }
   
    public function fetchClearanceById($id){
        $dbClearances =  ClearanceDao::findClearanceBy($id);
        if (is_null($dbClearances) || $dbClearances->count() == 0){
            return new Result(null,false);
        }else{
            $clearance = array();
            foreach ($dbClearances->toArray() as $dbClearance) {
                array_push($clearance,DbClearanceToDomainMapper::map($dbClearance));
            }
            return new Result($clearance,true);
            
            
        }
    }
}
