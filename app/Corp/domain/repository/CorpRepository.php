<?php
namespace App\Corp\domain\repository;
interface CorpRepository{
    public static function createCorp($savedDrugsInfo);
    public static function updateCorp($id,$savedDrugsInfo);
    public static function searchCorpById($Id);
    public static function fetchCorps();
    public static function  deleteCorp($id);

}