<?php
namespace App\Billing\presentation;

class MapOfUIModel{

    public static function mapOfSuccess($data){
        return [
            "success"=> $data
        ];
    }
    public static function mapOfBilling($data){
        return [
            "bill"=> $data
        ];
    }
    public static function mapOfBillings($data){
        return [
            "bills"=> $data
        ];
    }
    public static function mapOfValidation($data){
        return [
            "validationresult"=> $data
        ];
    }
}