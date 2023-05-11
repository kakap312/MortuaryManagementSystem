<?php

namespace App\Service\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbService extends Model
{
    //
    public $timestamps =false;
    protected $primaryKey = 'id';
    protected $table = 'services';
    protected $fillable =['id','serviceId','name','fee','per','createdAt','updatedAt'];
    protected $hidden = ['created_at','updated_at'];

}
