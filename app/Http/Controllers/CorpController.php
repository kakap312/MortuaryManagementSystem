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

class CorpController extends Controller
{
    //
    function registerCorp(Request $req)
    {
        $savedCorpInfo = CorpFactory::makeSaveCorpInfo($req);
        $isCorpCreated = CorpRepositoryImp::createCorp($savedCorpInfo)->getSuccess();
        if($isCorpCreated){
            if(SlotRepositoryImp::updateSlot($req->get('slotId'),['state'=>'used'])->getSuccess()){
                return response()->json(CorpViewModel::mapOfSuccess($isCorpCreated));
            }
        }
        
    }
    function updateCorp(Request $req)
    {
        $savedCorpInfo = CorpFactory::makeSaveCorpInfo($req);
        $isCorpUpdated = CorpRepositoryImp::updateCorp($req->get('corpId'),$savedCorpInfo)->getSuccess();
        if($isCorpUpdated){
            if(SlotRepositoryImp::updateSlot($req->get('slotId'),['state'=>'used'])->getSuccess()){
                return response()->json(CorpViewModel::mapOfSuccess($isCorpUpdated));
            }
        }
        
    }
    function searchCorp(Request $req)
    {
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
        }
    }
    function viewAllCorps()
    {
        $corpseResult = CorpRepositoryImp::fetchCorps();
        if($corpseResult->getSuccess()){
            $corpse =  $corpseResult->getData(); 
            $uiCorps = array();
            foreach ($corpse as $corp) {
                $fridge = (FridgeRepositoryImp::searchFridgeByNameOrId($corp->getFridgeId()))->getData();
                $slot = (SlotRepositoryImp::searchSlotByNameOrId($corp->getSlotId()))->getData();
               array_push($uiCorps,CorpToUiModelMapper::map($corp,$fridge->getName(),$slot->getName()));
            }
            return response()->json(CorpViewModel::mapOfCorpse($uiCorps));
        }
    }
    
    function viewAllFridges()
    {
        if(FridgeRepositoryImp::fetchFridge()->getSuccess()){
            $uiFridges = array();
            foreach (FridgeRepositoryImp::fetchFridge()->getData() as $fridge) {
               array_push($uiFridges,FridgeToUiModelMapper::map($fridge));
            }
            return response()->json(CorpViewModel::mapOfFridges($uiFridges));
        }
    }
    function viewAvailableSlot(Request $req)
    {
       
        if(SlotRepositoryImp::fetchAvailableSlots($req->get("fridgeid"))->getSuccess()){
            $uiSlots = array();
            foreach (SlotRepositoryImp::fetchAvailableSlots($req->get("fridgeid"))->getData() as $slot) {
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
        $deleteResponse = CorpRepositoryImp::deleteCorp($req->get("corpid"))->getSuccess();
        if($deleteResponse){return response()->json(CorpViewModel::mapOfSuccess($deleteResponse));}
    }
    function freeSlot(Request $req)
    {
        $isSlotFree = SlotRepositoryImp::updateSlot($req->get('slotId'),['state'=>'free'])->getSuccess();
        if($isSlotFree){
            return response()->json(CorpViewModel::mapOfSuccess($isSlotFree));
        }
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
