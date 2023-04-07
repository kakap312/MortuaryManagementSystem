<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clearance\data\factory\ClearanceRepositoryFactory;

class ClearnaceController extends Controller
{
    //
    private $clearanceRepositoryImpFactory;
    public function __construct(){
        $this->clearanceRepositoryImpFactory = new ClearanceRepositoryFactory();
    }
    public function makeClearance(Request $req){
        $this->clearanceRepositoryImpFactory->getClearanceRepositoryImp()->createClearance();
    }
}
