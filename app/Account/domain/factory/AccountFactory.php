<?php
namespace App\Account\domain\factory;
use App\Account\domain\model\SavedAccountInfo;

class AccountFactory{

    public static function makeSavedAccountInfo($req){
        return new SavedAccountInfo(
           is_null($req->get('username'))?"": $req->get('username'),
           is_null($req->get('password'))?"":$req->get('password'),
           is_null($req->get('accounttype'))?"":$req->get('accounttype'),
        );
    }
}