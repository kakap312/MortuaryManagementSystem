<?php
namespace App\Clearance\domain\factory;
use App\Clearance\domain\model\SavedClearanceInfo;
class ClearanceFactory{

    public static function getSavedClearanceInfo($req){
        $id = $req->get('corpId');
        return new SavedClearanceInfo(
            "",
            isset($id)?$id:"",
            is_null($req->get('state'))?"":$req->get('state') ,
            is_null($req->get('datecreated'))?"":$req->get('datecreated') ,
            ""
            
        );

    }
}