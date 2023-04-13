<?php
namespace App\Clearance\domain\factory;
use App\Clearance\domain\model\SavedClearanceInfo;
class ClearanceFactory{

    public static function getSavedClearanceInfo($req){
        $corpseId = $req->get('corpId');
        $paymentId = $req->get('id');
        return new SavedClearanceInfo(
            isset($paymentId)?$paymentId:"",
            isset($corpseId)?$corpseId:"",
            is_null($req->get('state'))?"":$req->get('state') ,
            is_null($req->get('datecreated'))?"":$req->get('datecreated'),
            ""
        );

    }
}