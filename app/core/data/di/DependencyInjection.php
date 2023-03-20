<?php
require_once(dirname(__FILE__).'/../../../account/domain/validators/UsernameValidation.php');
require_once(dirname(__FILE__).'/../../../account/domain/validators/PasswordValidation.php');
require_once(dirname(__FILE__).'/../../../account/domain/validators/NameValidation.php');
require_once(dirname(__FILE__).'/../../../account/data/AccountRepositoryImp.php');
require_once(dirname(__FILE__).'/../../../account/data/dao/AccountDao.php');
require_once(dirname(__FILE__).'/../db/model/DbConnection.php');
class DependencyInjection{
    private  $dbConnection;
    private  $accountRepositoryImp;
    private  $accountDao;
    private  $userNameValidator;
    private  $passwordValidator;

    public function __construct(){
        $this->connection = (new DBConnection("127.0.0.1","root","","perfectdb"))->getDbConnection();
        $this->accountDao = new accountDao($this->connection);
        $this->accountRepositoryImp = new AccountRepositoryImp($this->accountDao);
    }
    public  function getAccountRepository(){
        return $this->accountRepositoryImp;
    }
    public  function getAccountDao(){
        return $this->accountDao;
    }
    public  function getDbConnection(){
        return $this->dbConnection;
    }
    public function getUserNameValidator(){
        return new UserNameValidation();
    }
    public function getPasswordValidator(){
        return new PasswordValidation();
    }
    public function getNameValidator(){
        return new NameValidation();
    }
}