<?php
namespace App\Service\presentation\mapper;
use  App\Service\presentation\model\ServiceViewModel;
class DomainToUiModelMapper{
    static function map($service){
        return new ServiceViewModel(
            $service->getId(),
            $service->getName(),
            $service->getServiceFee()
        );
    }
}