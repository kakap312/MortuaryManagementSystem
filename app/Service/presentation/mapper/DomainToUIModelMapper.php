<?php
namespace App\Service\presentation\mapper;
use  App\Service\presentation\model\ServiceViewModel;
class DomainToUiModelMapper{
    static function map($service){
        return new ServiceViewModel(
            $service->getServiceId(),
            $service->getName(),
            $service->getRegularFee(),
            $service->getVipFee(),
            $service->getPer(),
            $service->getDateCreated()
        );
    }
}