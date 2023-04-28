<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\data\repository\ServiceRepositoryImp;
use App\Service\presentation\mapper\DomainToUiModelMapper;
use App\Service\presentation\model\MapOfViewModel;
use App\Service\domain\factory\ServiceFactory;
use App\Service\domain\validation\ServiceFieldValidation;

class ServiceController extends Controller
{
    private $serviceFieldValidator;

    function createService(Request $req){
        $savedServiceInfo = ServiceFactory::makeSavedServiceInfo($req);
        $this->serviceFieldValidator = new ServiceFieldValidation($savedServiceInfo);
        if($this->serviceFieldValidator->isAllFieldValid($savedServiceInfo)){
            $result =  ServiceRepositoryImp::createService($savedServiceInfo);
            if($result->getSuccess()){
                return  response()->json(MapOfViewModel::mapOfSuccess($result->getSuccess()));
            }else{
                return  response()->json(MapOfViewModel::mapOfSuccess($result->getSuccess()));
            }
        }else{
            return  response()->json(MapOfViewModel::mapOfValidation($this->serviceFieldValidator->mapOfFieldValidation()));
        }
    }
    function viewServices(Request $req){
        $services = ServiceRepositoryImp::fetchAllServices();
        if(is_null($services->getData())){
            return response()->json(MapOfViewModel::mapOfSuccess($services->getSuccess()));
        }else{
            $uiServices = array();
            foreach($services->getData() as $service){
                array_push($uiServices, DomainToUiModelMapper::map($service));
            }
        return response()->json(MapOfViewModel::mapOfServices($uiServices));
        }
        

    }
}
