<?php
namespace App\Account\domain\repository;
interface AccountRepository{
    public function createAccount($savedAccountInfo);
    public function login($username,$password);
}
?>