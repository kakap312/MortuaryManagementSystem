<?php
namespace App\Corp\domain\repository;
interface SlotRepository{
    public static function fetchSlots();
    public static function updateSlot($id,$savedDrugsInfo);
    public static function searchSlotByNameOrId($nameOrId);
    public static function  deleteSlot($id);
    public static function fetchAvailableSlots($id);
}