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
}