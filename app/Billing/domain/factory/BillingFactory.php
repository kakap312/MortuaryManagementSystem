<?php
namespace App\Billing\domain\factory;
use App\Billing\domain\model\SavedBillingInfo;
class BillingFactory{

    static function makeSavedBillingInfo($req){
        return new SavedBillingInfo(
            "",
            $req->get('datecreated'),
            //explode(',', $req->get('serviceIds')),
            $req->get('corpseId'),
            $req->get('billfor'),
            number_format(doubleval($req->get('amount')),2,'.',''),
            $req->get('extraDays'),
            $req->get('dueDays'),
            number_format(doubleval($req->get('servicefee')),2,'.',''),
        );
    }
}