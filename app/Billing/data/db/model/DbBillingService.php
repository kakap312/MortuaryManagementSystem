<?php

namespace App\Billing\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbBillingService extends Model
{
    //
    public $timestamps =false;
    protected $primaryKey = 'id';
    protected $table = 'billingservices';
    protected $fillable =['id','billServiceId','billId','serviceId'];
    protected $hidden = ['created_at','updated_at'];
}
