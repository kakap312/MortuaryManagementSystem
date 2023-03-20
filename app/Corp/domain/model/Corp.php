<?php
namespace App\Corp\domain\model;
class Corp{
    private $id;
    private $admissionDAte;
    private $collectionDate;
    private $name;
    private $age;
    private $sex;
    private $hometown;
    private $relativeName;
    private $relativeContactOne;
    private $relativeContactTwo;
    private $remarks;
    private $releasedBy;
    private $updatedAt;
    private $fridgeId;
    private $slotId;

    public function __construct($id,$admissionDate,$collectionDate,$name,$age,$sex,$relativeName,$relativeContactOne,$relativeContactTwo,$remarks,$releasedBy,$updatedAt,$hometown,$fridgeId,$slotId){
        $this->id = $id;
        $this->admissionDate = $admissionDate;
        $this->collectionDate = $collectionDate;
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
        $this->relativeName = $relativeName;
        $this->relativeContactOne = $relativeContactOne;
        $this->relativeContactTwo =$relativeContactTwo;
        $this->remarks =$remarks;
        $this->releasedBy = $releasedBy;
        $this->updatedAt = $updatedAt;
        $this->hometown = $hometown;
        $this->fridgeId = $fridgeId;
        $this->slotId = $slotId;
    }
    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setName($name){$this->name = $name;}
    public function getName(){return $this->name;}
    public function setAdmissionDAte($admissionDate){$this->admissionDAte = $admissionDate;}
    public function getAdmissionDAte(){return $this->admissionDate;}
    public function setCollectionDate($collectionDate){$this->collectionDate = $collectionDate;}
    public function getCollectionDate(){return $this->collectionDate;}
    public function setAge($age){$this->age = $age;}
    public function getAge(){return $this->age;}
    public function setSex($sex){$this->sex = $sex;}
    public function getSex(){return $this->sex;}
    public function setRelativeName($relativeName){$this->relativeName = $relativeName;}
    public function getRelativeName(){return $this->relativeName;}
    public function setRelativeContactOne($relativeContactOne){$this->relativeContactOne = $relativeContactOne;}
    public function getRelativeContactOne(){return $this->relativeContactOne;}
    public function setRelativeContactTwo($relativeContactTwo){$this->relativeContactTwo = $relativeContactTwo;}
    public function getRelativeContactTwo(){return $this->relativeContactTwo;}
    public function setRemarks($remarks){$this->remarks = $remarks;}
    public function getRemarks(){return $this->remarks;}
    public function setReleasedBy($releasedBy){$this->releasedBy = $releasedBy;}
    public function getReleasedBy(){return $this->releasedBy;}
    public function setHometown($hometown){$this->hometown = $hometown;}
    public function getHometown(){return $this->hometown;}
    public function setUpdatedAt($updatedAt){$this->updatedAt = $updatedAt;}
    public function getUpdatedAt(){return $this->updatedAt;}
    public function setFridgeId($fridgeId){$this->fridgeId = $fridgeId;}
    public function getFridgeId(){return $this->fridgeId;}
    public function setSlotId($slotId){$this->slotId = $slotId;}
    public function getSlotId(){return $this->slotId;}
}