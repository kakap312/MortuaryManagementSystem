<?php
namespace App\Corp\domain\model;
class SavedCorpInfo{
    private $id;
    private $corpseCode;
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
    private $category;
   

    public function __construct($id,$corpseCode,$admissionDAte,$collectionDate,$name,$age,$sex,$relativeName,$relativeContactOne,$relativeContactTwo,$remarks,$releasedBy,$updatedAt,$hometown,$fridgeId,$slotId,$category){
        $this->id = $id;
        $this->corpseCode = $corpseCode;
        $this->admissionDAte = $admissionDAte;
        $this->collectionDate = $collectionDate;
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
        $this->relativeName = $relativeName;
        $this->relativeContactOne = $relativeContactOne;
        $this->relativeContactTwo =$relativeContactTwo;
        $this->remarks =$remarks;
        $this->releasedBy = $releasedBy;
        $this->hometown=$hometown;
        $this->updatedAt = $updatedAt;
        $this->fridgeId = $fridgeId;
        $this->slotId = $slotId;
        $this->category = $category;
    }

    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setName($name){$this->name = $name;}
    public function getName(){return $this->name;}
    public function setAdmissionDAte($admissionDAte){$this->admissionDAte = $admissionDAte;}
    public function getAdmissionDAte(){return $this->admissionDAte;}
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
    public function setSlotId($slotId){$this->slotId = $slotId;}
    public function getSlotId(){return $this->slotId;}
    public function setFridgeId($fridgeId){$this->fridgeId = $fridgeId;}
    public function getFridgeId(){return $this->fridgeId;}
    public function getCorpseCode(){return $this->corpseCode;}
    public function setCorpseCode($corpseCode){$this->corpseCode = $corpseCode;}
    public function getCategory(){return $this->category;}
    public function setCategory($category){$this->category = $corpseCode;}

}

