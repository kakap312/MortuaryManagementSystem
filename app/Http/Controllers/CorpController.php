<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Corp\data\repository\CorpRepositoryImp;
use  App\Corp\data\repository\FridgeRepositoryImp;
use  App\Corp\data\repository\SlotRepositoryImp;
use App\Corp\presentation\CorpViewModel;
use App\Corp\domain\factory\CorpFactory;
use App\Corp\presentation\mappers\CorpToUiModelMapper;
use App\Corp\presentation\mappers\FridgeToUiModelMapper;
use App\Corp\presentation\mappers\SlotToUiModelMapper;
use App\Corp\domain\validation\CorpseDataValidation;
use App\Corp\domain\validation\FieldValidation;

class CorpController extends Controller
{
    //
    function registerCorp(Request $req)
    {
        $savedCorpInfo = CorpFactory::makeSaveCorpInfo($req);
        $corpseFieldValidator = new FieldValidation($savedCorpInfo);
        if($corpseFieldValidator->isAllFieldValid()){
            $savedCorpInfo = CorpFactory::makeSaveCorpInfo($req);
            $isCorpCreated = CorpRepositoryImp::createCorp($savedCorpInfo)->getSuccess();
                if($isCorpCreated){
                    if(SlotRepositoryImp::updateSlot($req->get('slotId'),['state'=>'used'])->getSuccess()){
                    return response()->json(CorpViewModel::mapOfSuccess($isCorpCreated));
                }
            }
        }else{
            return response()->json($corpseFieldValidator->mapOfFieldValidation());
        } 
    }
    function updateCorp(Request $req)
    {
        $savedCorpInfo = CorpFactory::makeSaveCorpInfo($req);
        $corpseFieldValidator = new FieldValidation($savedCorpInfo);
        if($corpseFieldValidator->isAllFieldValid()){
            $isCorpUpdated = CorpRepositoryImp::updateCorp($req->get('corpId'),$savedCorpInfo)->getSuccess();
            if($isCorpUpdated){
                if(SlotRepositoryImp::updateSlot($req->get('slotId'),['state'=>'used'])->getSuccess()){
                    return response()->json(CorpViewModel::mapOfSuccess($isCorpUpdated));
                }
            }
            
        }else{
            return response()->json($corpseFieldValidator->mapOfFieldValidation());
        }
    }
    function searchCorp(Request $req)
    {
        $uiCorpse = null;
        $corpseResult = CorpRepositoryImp::searchCorpById($req->get('corpId'));
        if($corpseResult->getSuccess()){
            $corp = $corpseResult->getData(); 
            $fridge = (FridgeRepositoryImp::searchFridgeByNameOrId($corp->getFridgeId()))->getData();
            $slot = (SlotRepositoryImp::searchSlotByNameOrId($corp->getSlotId()))->getData();
            $uiCorpse = CorpToUiModelMapper::map($corp,$fridge->getName(),$slot->getName());
            
            // $uiCorps = array();
            
            // foreach (CorpRepositoryImp::searchCorpById($req->get('corpId'))->getData() as $corp) {
            //     $fridge = (FridgeRepositoryImp::searchFridgeByNameOrId($corp->getFridgeId()))->getData()[0];
            //     $slot = (SlotRepositoryImp::searchSlotByNameOrId($corp->getSlotId()))->getData()[0];
            //    array_push($uiCorps,CorpToUiModelMapper::map($corp,$fridge->getName(),$slot->getName()));
            // }
            return response()->json(CorpViewModel::mapOfCorpse($uiCorpse));
        }else{
            return response()->json(CorpViewModel::mapOfCorpse($uiCorpse));
        }
    }
    function viewAllCorps()
    {
        $corpseResult = CorpRepositoryImp::fetchCorps();
        $uiCorps = array();
        if($corpseResult->getSuccess()){
            $corpse =  $corpseResult->getData(); 
            foreach ($corpse as $corp) {
                $fridge = (FridgeRepositoryImp::searchFridgeByNameOrId($corp->getFridgeId()))->getData();
                $slot = (SlotRepositoryImp::searchSlotByNameOrId($corp->getSlotId()))->getData();
               array_push($uiCorps,CorpToUiModelMapper::map($corp,$fridge->getName(),$slot->getName()));
            }
            return response()->json(CorpViewModel::mapOfCorpse($uiCorps));
        }else{
            return response()->json(CorpViewModel::mapOfCorpse($uiCorps));
        }
    }
    
    function viewAllFridges()
    {
        $fridges = FridgeRepositoryImp::fetchFridge();
        $uiFridges = array();
        if($fridges->getSuccess()){
            foreach ($fridges->getData() as $fridge) {
               array_push($uiFridges,FridgeToUiModelMapper::map($fridge));
            }
            return response()->json(CorpViewModel::mapOfFridges($uiFridges));
        }else{
            return response()->json(CorpViewModel::mapOfFridges($uiFridges));
        }
    }
    function viewAvailableSlot(Request $req)
    {
       
        $result = SlotRepositoryImp::fetchAvailableSlots($req->get("fridgeid"));
        if($result->getSuccess()){
            $uiSlots = array();
            foreach ($result->getData() as $slot) {
               array_push($uiSlots,SlotToUiModelMapper::map($slot));
            }
            return response()->json(CorpViewModel::mapOfSlots($uiSlots));
        }
    }
    function viewSlots()
    {
        $slots = SlotRepositoryImp::fetchSlots();
        if($slots->getSuccess()){
            $uiSlots = array();
            foreach ($slots->getData() as $slot) {
               array_push($uiSlots,SlotToUiModelMapper::map($slot));
            }
            return response()->json(CorpViewModel::mapOfSlots($uiSlots));
        }
    }
    function deleteCorp(Request $req)
    {
        $corpseResult = CorpRepositoryImp::searchCorpById($req->get('corpid'))->getData();
        
        $isSlotFree = SlotRepositoryImp::updateSlot($corpseResult->getSlotId(),['state'=>'free'])->getSuccess();
        
        $deleteResponse = CorpRepositoryImp::deleteCorp($req->get("corpid"))->getSuccess();
        if($isSlotFree &&  $deleteResponse){
            return response()->json(CorpViewModel::mapOfSuccess($deleteResponse));
        }
    }
    function freeSlot(Request $req)
    {
        $isSlotFree = SlotRepositoryImp::updateSlot($req->get('slotId'),['state'=>'free'])->getSuccess();
        if($isSlotFree){
            return response()->json(CorpViewModel::mapOfSuccess($isSlotFree));
        }
    }
    function totalcorpse(){
        $result = CorpRepositoryImp::totalCorpse();
        return response()->json(CorpViewModel::mapOfTotalCorpse($result->getData()));
    }
    function validateName(Request $req){
        return response()->json(CorpseDataValidation::mapOfNameValidation($req->get('name')));
    }
    function validateAge(Request $req){
        return response()->json(CorpseDataValidation::mapOfAgeValidation($req->get('age')));
    }
    function validateFridgeName(Request $req){
        return response()->json(CorpseDataValidation::mapOfFridgeValidation($req->get('fridgename')));
    }
    function validateRemarks(Request $req){
        return response()->json(CorpseDataValidation::mapOfRemarksValidation($req->get('remarks')));
    }
    function validateContact(Request $req){
        return response()->json(CorpseDataValidation::mapOfContactValidation($req->get('contact')));
    }
        
}
