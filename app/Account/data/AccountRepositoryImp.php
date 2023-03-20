<?php
namespace App\Account\data;
use App\Account\data\db\dao\AccountDao;
use App\Account\domain\repository\AccountRepository;
use App\core\domain\Result;

class AccountRepositoryImp implements AccountRepository {

    public function __construct(){}
    public function Login($username,$password)
    {
        $account = AccountDao::findAccountByPasswordAndUsername($username,$password);
        return $account == null ? new Result(null,false): new Result($account,true);
    }
    public  function createAccount($savedAccountInfo){}
}