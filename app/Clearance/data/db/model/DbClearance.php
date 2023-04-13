<?php

namespace App\Clearance\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbClearance extends Model
{
    //
     //
     public $timestamps =false;
     public $incrementing = false;
     protected $primaryKey = 'clearanceId';
     protected $table = 'clearance';
     protected $fillable =['clearanceId','corpseId','status','createdAt','updatedAt'];
     protected $hidden = ['created_at','updated_at'];
}
