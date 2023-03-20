<?php
class DbConnection{
    private $dbUserName;
    private $dbPassword;
    private $dbServerName;
    private $dbName;
    

    public function __construct($dbServerName,$dbUserName, $dbPassword,$dbName){
        
        $this->dbServerName = $dbServerName;
        $this->dbUserName = $dbUserName;
        $this->dbPassword = $dbPassword;
        $this->dbName = $dbName;
    }
     public function getDbConnection(){
      return new Mysqli($this->dbServerName,$this->dbUserName,$this->dbPassword,$this->dbName);
     }
        
}
?>