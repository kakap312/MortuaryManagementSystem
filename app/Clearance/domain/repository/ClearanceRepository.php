<?php
namespace App\Clearance\domain\repository;
interface ClearanceRepository{
    public function createClearance($savedClearanceInfo);
    public function fetchAllClearance();
    public function updateClearance($id,$dbClearance);
    public function deleteClearance($id);
    public function fetchClearanceById($id);
    public function totalNumberOfClearance();
    public function fetchClearanceLimit5();
    public function fetchClearanceByDate($startDate,$endDate);
}