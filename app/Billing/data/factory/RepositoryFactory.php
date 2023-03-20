<?php
namespace App\Billing\data\factory;
use App\Billing\data\repository\BillingRepositoryImp;
use App\Billing\data\repository\BillingServiceRepositoryImp;
use App\Service\data\repository\ServiceRepositoryImp;
class RepositoryFactory {
    private $billingRepository;
    private $billingServiceRepository;
    private $servicesRepository;

    function __construct(){
        $this->billingRepository = new BillingRepositoryImp() ;
        $this->billingServiceRepository = new BillingServiceRepositoryImp() ;
        $this->servicesRepository = new ServiceRepositoryImp() ;
    }

    function getBillingRepositoryImp(){
        return $this->billingRepository;
    }
    function getBillingServiceRepositoryImp(){
        return $this->billingServiceRepository;
    }
    function getServiceRepositoryImp(){
        return $this->servicesRepository;
    }
}