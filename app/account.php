<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    //
    protected $primaryKey = 'acc_id';
    public $incrementing = false;
    protected $keyType = 'string';
}
