<?php

namespace App\payment\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbPayment extends Model
{
     
     public $timestamps =false;
     public $incrementing = false;
     protected $primaryKey = 'paymentId';
     protected $table = 'payments';
     protected $fillable =['paymentId','amount','description','billId','createdAt','updatedAt'];
     protected $hidden = ['created_at','updated_at'];
    
}
