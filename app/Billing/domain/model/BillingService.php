<?php
namespace App\Billing\domain\model;
class BillingService{
    private $id;
    private $serviceId;

    public function __construct($id,$serviceId){
        $this->id = $id;
        $this->serviceId = $serviceId;
    }
    function setId($id){$this->id = $id;}
    function getId(){return $this->id;}
    function setbService($service){$this->serviceId = $service;}
    function getService(){return $this->serviceId;}
}