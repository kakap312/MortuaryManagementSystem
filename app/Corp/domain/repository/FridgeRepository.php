<?php
namespace App\Corp\domain\repository;
interface FridgeRepository{
    public static function fetchFridge();
    public static function updateFridge($savedDrugsInfo);
    public static function searchFridgeByNameOrId($nameOrId);
    public static function  deleteFridge($id);
}