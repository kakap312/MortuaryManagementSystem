<?php
namespace App\Billing\domain\model;
class SavedBillingServiceInfo{
    private $id;
    private $billingId;
    private $ServiceId;

    public function __construct($id,$billingId,$ServiceId){
        $this->id = $id;
        $this->billingId = $billingId;
        $this->ServiceId = $ServiceId;
    }
    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setBillingId($billingId){$this->billingId = $billingId;}
    public function getBillingId(){return $this->billingId;}
    public function setServiceId($ServiceId){$this->ServiceId=$ServiceId;}
    public function getServiceId(){return $this->ServiceId;}

}