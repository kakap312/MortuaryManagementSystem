<?php

namespace App\Billing\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbBilling extends Model
{
    //
    public $timestamps =false;
    protected $primaryKey = 'id';
    protected $table = 'billings';
    protected $fillable =['id','billId','corpId','billfor','amount','dueDays','extraDays','fee','createdAt','updatedAt'];
    protected $hidden = ['created_at','updated_at'];
}
