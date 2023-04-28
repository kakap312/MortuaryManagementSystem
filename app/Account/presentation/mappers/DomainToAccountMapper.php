<?php
namespace App\Account\presentation\mappers;
use App\Account\presentation\model\AccountLoginUiModel;
class DomainToAccountMapper{

    public function map($account){
        return new AccountLoginUiModel(
            $account->getId(),
            $account->getUsername(),
            $account->getPassword()
        );
    }
}