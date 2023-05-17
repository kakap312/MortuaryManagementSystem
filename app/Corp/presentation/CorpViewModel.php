<?php
namespace App\Corp\presentation;
class CorpViewModel {
    
    static function mapOfCorpse($data){
        return ["corps"=>$data];
    }
    static function mapOfTotalCorpse($data){
        return ["totalCorpse"=>$data];
    }
    static function mapOfFridges($data){
        return ["fridges"=>$data];
    }
    static function mapOfSlots($data){
        return ["slots"=>$data];
    }
    static function mapOfSuccess($data){
        return ["success"=>$data];
    }
    static function mapOfValidation($data){
        return ["validationResult"=>$data];
    }
}
?>
