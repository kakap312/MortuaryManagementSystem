<?php
namespace App\Billing\domain\model;
class SavedBillingInfo{
    private $billingId;
    private $createdAt;
    private $serviceIds; // array of service Id
    private $corpseId;
    private $billfor;
    private $amount;

    public function __construct($billingId,$createdAt,$serviceIds,$corpseId,$billfor,$amount){
        $this->billingId = $billingId;
        $this->serviceIds = $serviceIds;
        $this->createdAt = $createdAt;
        $this->corpseId = $corpseId;
        $this->billfor = $billfor;
        $this->amount = $amount;
    }
    public function setBillingId($id){$this->billingId = $id;}
    public function getBillingId(){return $this->billingId;}
    public function setCreatedAt($date){$this->createdAt = $date;}
    public function getCreatedAt(){return $this->createdAt;}
    public function setServiceIds($serviceIds){$this->serviceIds=$serviceIds;}
    public function getServiceIds(){ return $this->serviceIds;}
    public function setCorpseId($corpseId){$this->corpseId = $corpseId;}
    public function getCorpseId(){return $this->corpseId;}
    public function getBillFor(){return $this->billfor;}
    public function setBillFor($billfor){$this->billfor = $billfor;}
    public function getAmount(){return $this->amount;}
    public function setAmount($amount){$this->amount = $amount;}

}