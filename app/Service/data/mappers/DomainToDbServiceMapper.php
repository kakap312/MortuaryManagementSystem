<?php
namespace App\Service\data\mappers;
class DomainToDbServiceMapper{
    static function map($savedServiceInfo){
        return  [
            'serviceId'=>$savedServiceInfo->getid() ==""?uniqid():$savedServiceInfo->getid(),
            'name'=>$savedServiceInfo->getServiceName(),
            'fee'=>$savedServiceInfo->getServiceFee(),
            'per'=>$savedServiceInfo->getPer(),
            'createdAt'=>$savedServiceInfo->getCreatedAt(),
            'updatedAt'=>$savedServiceInfo->getCreatedAt()
        ];
    }


}