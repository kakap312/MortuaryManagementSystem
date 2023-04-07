<?php
namespace App\Clearance\data\repository;
use App\Clearance\domain\repository\ClearanceRepository;
use App\Clearance\data\db\dao\ClearanceDao;
use App\Clearance\data\mapper\DbClearanceToDomainMapper;
use App\core\domain\Result;


class ClearanceRepositoryInfo implements CLearanceRepository{

    public function createClearance($savedClearanceInfo){
       $result =  ClearanceDao::insertClearance(DbClearanceToDomainMapper::map($savedClearanceInfo));
       ($result)?new Result(null,true): new Result(null,false);
    }
    public function fetchAllClearance(){

    }
    public function updateClearance($id,$dbClearance){

    }
    public function deleteClearance($id){

    }

}