<?php

namespace App\Billing\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbBilling extends Model
{
    //
    public $timestamps =false;
    public $incrementing = false;
    protected $primaryKey = 'billId';
    protected $table = 'billings';
    protected $fillable =['billId','corpId','billfor','amount','createdAt','updatedAt'];
    protected $hidden = ['created_at','updated_at'];
}
