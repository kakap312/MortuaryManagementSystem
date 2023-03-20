<?php
namespace App\Service\presentation\model;
class MapOfViewModel{

    static function mapOfServices($uiservices){
        return [
            'services'=>$uiservices
        ];
    }
}