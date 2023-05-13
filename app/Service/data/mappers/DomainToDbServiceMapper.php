<?php
namespace App\Service\data\mappers;
class DomainToDbServiceMapper{
    static function map($savedServiceInfo){
        if($savedServiceInfo->getUpdatedAt() == ""){
            return  [
                'serviceId'=>$savedServiceInfo->getid(),
                'name'=>$savedServiceInfo->getServiceName(),
                'regularFee'=>$savedServiceInfo->getRegularFee(),
                'vipFee'=> $savedServiceInfo->getVipFee(),
                'per'=>$savedServiceInfo->getPer(),
                'createdAt'=>$savedServiceInfo->getCreatedAt(),
                'updatedAt'=>$savedServiceInfo->getCreatedAt()
            ];
        }else{
            return  [
                'name'=>$savedServiceInfo->getServiceName(),
                'regularFee'=>$savedServiceInfo->getRegularFee(),
                'vipFee'=> $savedServiceInfo->getVipFee(),
                'per'=>$savedServiceInfo->getPer(),
                'updatedAt'=>$savedServiceInfo->getUpdatedAt()
            ];
        }
       
    }


}