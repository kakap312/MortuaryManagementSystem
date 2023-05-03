<?php
namespace App\Account\domain\factory;
use App\Account\domain\model\SavedAccountInfo;

class AccountFactory{

    public static function makeSavedAccountInfo($req){
        $createdAt = $req->get('datecreated');
        $id = $req->get('id');
        return new SavedAccountInfo(
           isset($id)?$id:"",
           is_null($req->get('username'))?"": $req->get('username'),
           is_null($req->get('password'))?"":$req->get('password'),
           is_null($req->get('type'))?"":$req->get('type'),
           isset($createdAt)? $createdAt:""
        );
    }
}