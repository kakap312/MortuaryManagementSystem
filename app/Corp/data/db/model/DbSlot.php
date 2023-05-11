<?php

namespace App\Corp\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbSlot extends Model
{
    //
    public $timestamps =false;
    protected $primaryKey = 'id';
    protected $table = 'slots';
    protected $fillable = ['id','slotId','frifgeId','name','state'];
    //protected $fillable =['corpId','admissionDate','name','age','sex','hometown','relativeName','relativeContactOne','relativeContactTwo','collectionDate','remarks','releasedBy','updatedAt'];
    protected $hidden = ['created_at','updated_at'];
}
