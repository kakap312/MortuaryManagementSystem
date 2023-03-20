<?php

namespace App\Account\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbAccount extends Model
{
    //
    protected $primaryKey = 'acc_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'accounts';
}
