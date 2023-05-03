<?php

namespace App\Account\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbAccount extends Model
{
    //
    public $timestamps =false;
    public $incrementing = false;
    protected $primaryKey = 'accId';
    protected $table = 'accounts';
    protected $fillable =['accId','username','password','type','createdAt','updatedAt'];
    protected $hidden = ['created_at','updated_at'];
}
