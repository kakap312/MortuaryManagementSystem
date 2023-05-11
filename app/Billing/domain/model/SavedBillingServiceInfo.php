<?php
namespace App\Billing\domain\model;
class SavedBillingServiceInfo{
    public  $id;
    public $billingId;
    public $ServiceIds;

    public function __construct($id,$billingId,$ServiceIds){
        $this->id = $id;
        $this->billingId = $billingId;
        $this->ServiceIds = $ServiceIds;
    }
    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setBillingId($billingId){$this->billingId = $billingId;}
    public function getBillingId(){return $this->billingId;}
    public function setServiceId($ServiceIds){$this->ServiceIds=$ServiceIds;}
    public function getServiceId(){return $this->ServiceIds;}

}