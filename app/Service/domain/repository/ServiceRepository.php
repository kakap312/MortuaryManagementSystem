<?php
namespace App\Service\domain\repository;
interface ServiceRepository{
    public static function createService($dbService);
    public static function updateService($id,$dbService);
    public static function fetchService($corpseId);
    public static function fetchServiceById($id);
    public static function fetchAllServices();
    public static function fetchAllServicesLimitFive();
    public static function deleteService($id);
}