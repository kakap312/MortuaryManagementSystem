<?php

namespace App\payment\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbPayment extends Model
{
     
     public $timestamps =false;
     protected $primaryKey = 'id';
     protected $table = 'payments';
     protected $fillable =['id','paymentId','amount','description','billId','createdAt','updatedAt'];
     protected $hidden = ['created_at','updated_at'];
    
}
