<?php
namespace App\Account\presentation\mappers;
use App\Account\presentation\model\AccountLoginUiModel;
class DomainToAccountUiMapper{

    public static function map($account){
        return new AccountLoginUiModel(
            $account->getId(),
            $account->getCreatedAt(),
            $account->getUsername(),
            $account->getPassword(),
            $account->getAccountType()
        );
    }
}