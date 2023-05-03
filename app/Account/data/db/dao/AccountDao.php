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
    public static function findAccountByUsername($username){
        try {
            $GLOBALS['id'] = $username;
            return DbAccount::where(function($query){
                $query->where('username','=',$GLOBALS['id']);
            })->get()->toArray();
            
        } catch (\Throwable $th) {
            return false;
          // return $th->getMessage();
        }

    }
    public static function insertAccount($dbAccount){
        try {
            DbAccount::create($dbAccount);
            return true;
        } catch (\Throwable $th) {
            //return false;
           return $th->getMessage();
        }

    }
    public static function deleteAccount(){

    }
}