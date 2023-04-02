<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DbPayment extends Model
{
     
     public $timestamps =false;
     public $incrementing = false;
     protected $primaryKey = 'paymentId';
     protected $table = 'payments';
     protected $fillable =['paymentId','amount','billId','createdAt','updatedAt'];
     protected $hidden = ['created_at','updated_at'];
    
}
