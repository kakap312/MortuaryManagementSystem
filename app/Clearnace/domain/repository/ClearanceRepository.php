<?php
namespace App\Clearance\domain\repository;
interface ClearanceRepository{
    public function createClearance();
    public function fetchAllClearance();
    public function updateClearance($id,$dbClearance);
    public function deleteClearance($id);


}