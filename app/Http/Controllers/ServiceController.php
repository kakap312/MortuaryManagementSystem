<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\data\repository\ServiceRepositoryImp;
use App\Service\presentation\mapper\DomainToUiModelMapper;
use App\Service\presentation\model\MapOfViewModel;

class ServiceController extends Controller
{
    function viewServices(Request $req){
        $services = ServiceRepositoryImp::fetchAllServices($req->get('corpId'))->getData();
        $uiServices = array();
        foreach($services as $service){
            array_push($uiServices, DomainToUiModelMapper::map($service));
        }
        return response()->json(MapOfViewModel::mapOfServices($uiServices));

    }
}
