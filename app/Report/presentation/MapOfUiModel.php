<?php
namespace App\Report\presentation;

class MapOfUiModel{
    
    static function mapOfReport($data){
        return ["report"=>$data];
    }
    static function mapOfTotalCorpse($data){
        return ["totalCorpse"=>$data];
    }
    static function mapOfFridges($data){
        return ["fridges"=>$data];
    }
    static function mapOfValidation($data){
        return ["validation"=>$data];
    }
    static function mapOfSuccess($data){
        return ["success"=>$data];
    }
}
?>
