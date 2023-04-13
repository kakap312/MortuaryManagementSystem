<?php
namespace App\Clearance\presentation;

class MapOfUiModel{

    public static function mapOfSuccess($data){
        return [
            "success"=> $data
        ];
    }
    public static function mapOfClearance($data){
        return [
            "clearance"=> $data
        ];
    }
    public static function mapOfClearanceExit($data){
        return [
            "isExisting"=> $data
        ];
    }
    public static function mapOfValidation($data){
        return [
            "validationresult"=> $data
        ];
    }
    public static function mapOfOutandingAmount($data){
        return [
            "outsandingamount"=> $data
        ];
    }
}