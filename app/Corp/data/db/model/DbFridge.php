<?php

namespace App\Corp\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbFridge extends Model
{
    //
    public $timestamps =false;
    protected $table = 'fridges';
    protected $fillable = ['id','fridgeId','name','state'];
    //protected $fillable =['corpId','admissionDate','name','age','sex','hometown','relativeName','relativeContactOne','relativeContactTwo','collectionDate','remarks','releasedBy','updatedAt'];
    protected $hidden = ['created_at','updated_at'];
}
