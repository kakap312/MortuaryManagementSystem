<?php
namespace App\Account\data\db\dao;
use App\Account\data\db\model\DbAccount;

 class AccountDao {


    public static function findAccountByPasswordAndUsername($savedAccountInfo){
        try {
            $GLOBALS['username'] = $savedAccountInfo->getUserName();
            $GLOBALS['password'] = $savedAccountInfo->getPassword();
            $GLOBALS['accounttype'] = $savedAccountInfo->getAccountType();
            return DbAccount::where(function($query){
                $query->where('username','=',$GLOBALS['username'])
                ->where('password','=',$GLOBALS['password'])->
                where('type','=',$GLOBALS['accounttype']);
            })->get();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        // try {
        //     return DbAccount::where("username",'=',$username)->where("password","=",$password)->get();
        // } catch (\Throwable $th) {
        //     $th->getMessage();
        // }
        
        // return list of dbAccount
    }
    public static function insertAccount($dbAccount){

    }
    public static function deleteAccount(){
        
    }
}