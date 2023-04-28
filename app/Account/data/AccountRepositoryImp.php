<?php
namespace App\Account\data;
use App\Account\data\db\dao\AccountDao;
use App\Account\domain\repository\AccountRepository;
use App\core\domain\Result;
use App\Account\data\mappers\DbAccountToDomainMapper;

class AccountRepositoryImp implements AccountRepository {

    public function __construct(){}
    public function Login($savedAccountInfo)
    {
        $dbAccounts = AccountDao::findAccountByPasswordAndUsername($savedAccountInfo);
        if(is_null($dbAccounts) || $dbAccounts->count() == 0){
            return new Result(null,false);
        }else{
            $accounts = array();
            foreach ($dbAccounts->toArray() as $dbAccount) {
                array_push($accounts,DbAccountToDomainMapper::map($dbAccount));
            }
            return new Result($accounts,true);

        }
        return $account == null ? new Result(null,false): new Result($account,true);
    }
    public  function createAccount($savedAccountInfo){}
}