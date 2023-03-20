<?php

namespace App\Billing\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbBillingService extends Model
{
    //
    public $timestamps =false;
    public $incrementing = false;
    protected $primaryKey = 'billServiceId';
    protected $table = 'billingservices';
    protected $fillable =['billServiceId','billId','serviceId'];
    protected $hidden = ['created_at','updated_at'];
}
