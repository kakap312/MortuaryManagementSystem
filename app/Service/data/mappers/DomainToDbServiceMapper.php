<?php
class DomainToDbServiceMapper{
    static function map($savedServiceInfo){
        return  [
            'serviceId'=>$savedServiceInfo->getid() ==""?uniqid():$savedServiceInfo->getid(),
            'name'=>$savedServiceInfo->getName(),
            'fee'=>$savedServiceInfo->getFee(),
            'per'=>$savedServiceInfo->getPer(),
            'createdAt'=>$savedServiceInfo->getCreatedAt(),
            'updatedAt'=>$savedServiceInfo->getCreatedAt()
        ];
    }


}