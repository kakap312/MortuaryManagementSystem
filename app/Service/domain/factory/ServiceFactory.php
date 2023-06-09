<?php
namespace App\Service\domain\factory;
use App\Service\domain\model\SavedServiceInfo;
class ServiceFactory{

    static function makeSavedServiceInfo($req){
        $serviceId = $req->get('serviceId');
        $updatedAt = $req->get('updatedat');
        return new SavedServiceInfo(
            isset($serviceId)?$serviceId:"",
            is_null($req->get('servicename'))?"":$req->get('servicename') ,
            number_format(doubleval($req->get('regularfee')),2,'.',''),
            number_format(doubleval($req->get('vipfee')),2,'.',''),
            is_null($req->get('datecreated'))?"":$req->get('datecreated'),
            isset($updatedAt)?$updatedAt:"",
            is_null($req->get('per'))?"":$req->get('per'),
        );
    }
}