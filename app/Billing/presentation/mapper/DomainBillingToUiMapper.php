<?php
namespace App\Billing\presentation\mapper;
use App\Billing\presentation\model\UiBilling;

class DomainBillingToUiMapper {

    static function map($billing,$serviceIds){
        return new UiBilling(
            $billing->getBillId(),
            $billing->getCreatedAt(),
            $billing->getAmount(),
            //self::getServiceName($billing->getService()),
            $serviceIds,
            $billing->getCorpseCode(),
            $billing->getExtraDays(),
            $billing->getDueDays(),
            $billing->getBillPurpose(),
        );
    }
    static function getServiceName($services){
         $serviceNames = array_map(function($service){
            return $service->getName();
        },$services);

        return $serviceNames;
    }
}