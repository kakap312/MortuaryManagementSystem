<?php
namespace App\Corp\presentation\model;
class CorpUiModel{
    public $id;
    public $corpseCode;
    public $admissionDate;
    public $collectionDate;
    public $name;
    public $age;
    public $sex;
    public $dueDays;
    public $extraDays;
    public $relativeName;
    public $relativeContactOne;
    public $relativeContactTwo;
    public $fridgeName;
    public $slotName;
    public $category;
    public $releasedBy;
    public $remarks;
    public $hometown;


    public function __construct($id,$corpseCode,$admissionDate,$collectionDate,$name,$age,$sex,$dueDays,$extraDays,$relativeName,$relativeContactOne,$relativeContactTwo,$fridgeName,$slotName,$category,$releasedBy,$remarks,$hometown){
        $this->id = $id;
        $this->corpseCode = $corpseCode;
        $this->admissionDate = $admissionDate;
        $this->collectionDate = $collectionDate;
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
        $this->dueDays = $dueDays;
        $this->extraDays = $extraDays;
        $this->relativeName = $relativeName;
        $this->relativeContactOne = $relativeContactOne;
        $this->relativeContactTwo =$relativeContactTwo;
        $this->fridgeName = $fridgeName;
        $this->slotName = $slotName;
        $this->category = $category;
        $this->releasedBy=$releasedBy;
        $this->remarks = $remarks;
        $this->hometown = $hometown;
    }
    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setName($name){$this->name = $name;}
    public function getName(){return $this->name;}
    public function setAdmissionDate($admissionDate){$this->admissionDate = $admissionDate;}
    public function getAdmissionDate(){return $this->admissionDate;}
    public function setCollectionDate($admissionDate){$this->admissionDate = $admissionDate;}
    public function getCollectionDate(){return $this->admissionDate;}
    public function setAge($age){$this->age = $age;}
    public function getAge(){return $this->age;}
    public function setSex($sex){$this->sex = $sex;}
    public function getDueDays(){return $this->dueDays;}
    public function setDueDays($dueDays){$this->dueDays = $dueDays;}
    public function getExtraDays(){return $this->extraDays;}
    public function setExtraDays($dueDays){$this->extraDays = $extraDays;}
    public function getSex(){return $this->sex;}
    public function setRelativeName($relativeName){$this->relativeName = $relativeName;}
    public function getRelativeName(){return $this->relativeName;}
    public function setRelativeContactOne($relativeContactOne){$this->relativeContactOne = $relativeContactOne;}
    public function getRelativeContactOne(){return $this->relativeContactOne;}
    public function setRelativeContactTwo($relativeContactTwo){$this->relativeContactTwo = $relativeContactTwo;}
    public function getRelativeContactTwo(){return $this->relativeContactTwo;}
    public function setCorpseCode($corpseCode){$this->corpseCode = $corpseCode;}
    public function getCorpseCode(){return $this->corpseCode;}
    public function setCategory($category){$this->category = $category;}
    public function getCategory(){return $this->category;}
}