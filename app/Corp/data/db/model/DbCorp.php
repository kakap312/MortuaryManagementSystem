<?php

namespace App\Corp\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbCorp extends Model
{
    //
    public $timestamps =false;
    public $incrementing = false;
    protected $primaryKey = 'corpId';
    protected $table = 'corps';
    protected $fillable =['corpId','admissionDate','name','age','sex','hometown','relativeName','relativeContactOne','relativeContactTwo','collectionDate','remarks','releasedBy','updatedAt','fridgeId','slotId'];
    protected $hidden = ['created_at','updated_at'];
}