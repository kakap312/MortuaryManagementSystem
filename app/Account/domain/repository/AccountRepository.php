<?php
namespace App\Account\domain\repository;
interface AccountRepository{
    public function createAccount($savedAccountInfo);
    public function login($savedAccountInfo);
    function fetchAccount($username);
    function fetchAccountLimitFive();
    public function deleteAccount($id);
}
?>