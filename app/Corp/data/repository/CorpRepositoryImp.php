<?php
namespace App\Corp\data\repository;
use App\Corp\data\db\dao\CorpDao;
use App\Corp\domain\repository\CorpRepository;
use App\core\domain\Result;
use App\Corp\data\mappers\DomainToDbCorpMapper;
use App\Corp\data\mappers\DbCorpToDomainMapper;

class CorpRepositoryImp implements CorpRepository{

    static function createCorp($savedCorpInfo)
    {
        $dbCorps = DomainToDbCorpMapper::map($savedCorpInfo);
        $isCorpseCreated = CorpDao::insertCorp($dbCorps);
        if($isCorpseCreated){
            return new Result(null,true);
        }else{
            return new Result(null,false);
        }  
    }
    public static function fetchCorps(){
        $dbCorps = CorpDao::findAllCorps();
        if(is_null($dbCorps)){
            return new Result(null,false);
        }else{
            $corps = array();
            foreach ($dbCorps as $dbcorp) {
                array_push($corps,DbCorpToDomainMapper::map($dbcorp));
            }
            return new Result($corps,true);
        }
    }

    public static function updateCorp($id,$savedCorpInfo){
        if(CorpDao::updateCorp($id,DomainToDbCorpMapper::map($savedCorpInfo))){
            return new Result(null,true);
        }else{
            return new Result(null,false);
        } 
    }
    public static function totalCorpse(){
        $totalNumberOfCorpse = CorpDao::totalNumberOfCorpse();
        if(is_null($totalNumberOfCorpse)){
            return new Result(null,false);
        }else{
            return new Result($totalNumberOfCorpse,false);
        }
    }
    public static function searchCorpById($nameOrId)
    {
        $dbCorp = CorpDao::findCoprById($nameOrId);
        if(is_null($dbCorp) || ($dbCorp->count() === 0)){
            return new Result(null,false);
        }else{
            $corp = DbCorpToDomainMapper::map($dbCorp);
            // foreach ($dbCorps as $dbcorp) {
            //     array_push($corps,DbCorpToDomainMapper::map($dbcorp));
            // }
            return new Result($corp,true);
        }

    }
   
    public static function  deleteCorp($id){
        if(!(CorpDao::deleteCorpById($id))){
            return new Result(null,false);
        }else{
            return new Result(null,true);
        }
    }

    
}