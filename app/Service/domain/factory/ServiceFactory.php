<?php
namespace App\Service\domain\factory;
use App\Service\domain\model\SavedServiceInfo;
class ServiceFactory{

    static function makeSavedServiceInfo($req){
        $serviceId = $req->get('id');
        return new SavedServiceInfo(
            isset($serviceId)?$serviceId:"",
            is_null($req->get('servicename'))?"":$req->get('servicename') ,
            is_null($req->get('servicefee'))?"":$req->get('servicefee'),
            is_null($req->get('datecreated'))?"":$req->get('datecreated'),
            "",
            is_null($req->get('per'))?"":$req->get('per'),
        );
    }
}