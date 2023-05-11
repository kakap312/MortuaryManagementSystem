<?php

namespace App\Corp\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbCorp extends Model
{
    //
    public $timestamps =false;
    protected $primaryKey = 'id';
    protected $table = 'corps';
    protected $fillable =['corpId','corpseCode','admissionDate','name','age','sex','hometown','relativeName','relativeContactOne','relativeContactTwo','collectionDate','remarks','releasedBy','updatedAt','fridgeId','slotId','category'];
    protected $hidden = ['created_at','updated_at'];
}