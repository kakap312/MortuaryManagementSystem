<?php
namespace App\payment\presentation;
class PaymentViewModel {
    
    static function mapOfPayment($data){
        return ["corps"=>$data];
    }
    static function mapOfTotalPayment($data){
        return ["totalCorpse"=>$data];
    }
    static function mapOfSuccess($data){
        return ["success"=>$data];
    }
    static function mapOfValidation($data){
        return ["validation"=>$data];
    }
}
?>
