<?php
namespace App\Service\data\mappers;
class DomainToDbServiceMapper{
    static function map($savedServiceInfo){
        if($savedServiceInfo->getUpdatedAt() == ""){
            return  [
                'serviceId'=>$savedServiceInfo->getid(),
                'name'=>$savedServiceInfo->getServiceName(),
                'fee'=>$savedServiceInfo->getServiceFee(),
                'per'=>$savedServiceInfo->getPer(),
                'createdAt'=>$savedServiceInfo->getCreatedAt(),
                'updatedAt'=>$savedServiceInfo->getCreatedAt()
            ];
        }else{
            return  [
                'name'=>$savedServiceInfo->getServiceName(),
                'fee'=>$savedServiceInfo->getServiceFee(),
                'per'=>$savedServiceInfo->getPer(),
                'updatedAt'=>$savedServiceInfo->getUpdatedAt()
            ];
        }
       
    }


}