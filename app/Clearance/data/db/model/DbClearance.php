<?php

namespace App\Clearance\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbClearance extends Model
{
    //
     //
     public $timestamps =false;
     protected $primaryKey = 'id';
     protected $table = 'clearance';
     protected $fillable =['id','clearanceId','corpseId','status','createdAt','updatedAt'];
     protected $hidden = ['created_at','updated_at'];
}
