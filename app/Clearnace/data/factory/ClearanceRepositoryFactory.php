<?php
namespace App\Clearance\data\factory;
use App\Clearance\data\repository\ClearanceRepositoryImp;
class ClearanceRepositoryFactory{

    private $clearanceRepositoryImp;

    function __construct(){
        $clearanceRepositoryImp = new ClearanceRepositoryImp();
    }

    public function getClearanceRepositoryImp(){
        return  $this->clearanceRepositoryImp;
    }
}