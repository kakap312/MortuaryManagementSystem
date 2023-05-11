<?php
namespace App\Billing\domain\factory;
use App\Billing\domain\model\SavedBillingInfo;
class BillingFactory{

    static function makeSavedBillingInfo($req){
        $billId = ($req->get('billId'));
        return new SavedBillingInfo(
            isset($billId)?$billId:"",
            $req->get('datecreated'),
            $req->get('corpseId'),
           is_null($req->get('billfor'))?"":$req->get('billfor'),
            number_format(doubleval($req->get('amount')),2,'.',''),
            $req->get('extraDays'),
            $req->get('dueDays'),
            number_format(doubleval($req->get('servicefee')),2,'.',''),
            explode(',', $req->get('serviceids')),
            // get a list of service ids["","",""]
        );
    }
}