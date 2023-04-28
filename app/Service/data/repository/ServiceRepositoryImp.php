<?php
namespace App\Service\data\repository;
use App\Service\data\db\dao\ServiceDao;
use App\core\domain\Result;
use App\Service\domain\repository\ServiceRepository;
use App\Service\data\mappers\DomainToDbServiceMapper;
use App\Service\data\mappers\DbServiceToDomainMapper;
use App\Service\data\repository\ServiceRepositoryImp;


class ServiceRepositoryImp implements ServiceRepository{
    
    public static function createService($savedServiceInfo){
        return  ServiceDao::insert(DomainToDbServiceMapper::map($savedServiceInfo))?  new Result(null,true):  new Result(null,false);
    }
    public static function updateService($id,$dbService){}

    public static function fetchAllServices(){
        $dbServices = ServiceDao::fetchAllServices();
        if(is_null($dbServices) || $dbServices->count() == 0){
            return new Result(null,false);
        }else{
            $services = array();
            foreach ($dbServices->toArray() as $dbService) {
                array_push($services, DbServiceToDomainMapper::map($dbService));
            }
            return new Result($services,true);
        }
    }
    public static function fetchServiceById($id){
        $dbService = ServiceDao::findServiceById($id);
        if(is_null($dbService)){
            return new Result(null,false);
        }else{
            $service = DbServiceToDomainMapper::map($dbService);
            return new Result($service,true);
        }
    }

    public static function fetchService($corpseId){}

    
}