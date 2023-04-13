<?php
namespace App\Clearance\data\factory;
use App\Clearance\data\repository\ClearanceRepositoryImp;
class ClearanceRepositoryFactory{

    private $clearanceRepositoryImp;

   public  function __construct(){
    $this->clearanceRepositoryImp = new ClearanceRepositoryImp();
    }

    public function getClearanceRepositoryImp(){
        return  $this->clearanceRepositoryImp;
    }
}