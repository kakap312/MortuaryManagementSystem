<?php
namespace App\Service\presentation\model;
class MapOfViewModel{

    static function mapOfServices($uiservices){
        return [
            'services'=>$uiservices
        ];
    }
    public static function mapOfValidation($data){
        return [
            "validationresult"=> $data
        ];
    }
    public static function mapOfSuccess($data){
        return [
            "success"=> $data
        ];
    }
}