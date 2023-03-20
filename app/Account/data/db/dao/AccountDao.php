<?php
namespace App\Account\data\db\dao;
use App\Account\data\db\model\DbAccount;

 class AccountDao {


    public static function findAccountByPasswordAndUsername($username,$password){
        try {
            return DbAccount::where("username",'=',$username)->where("password","=",$password)->get();
        } catch (\Throwable $th) {
            $th->getMessage();
        }
        
        // return list of dbAccount
    }
}