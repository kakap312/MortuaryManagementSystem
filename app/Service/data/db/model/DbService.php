<?php

namespace App\Service\data\db\model;

use Illuminate\Database\Eloquent\Model;

class DbService extends Model
{
    //
    public $timestamps =false;
    public $incrementing = false;
    protected $primaryKey = 'serviceId';
    protected $table = 'services';
    protected $fillable =['serviceId','name','fee','per','createdAt','updatedAt'];
    protected $hidden = ['created_at','updated_at'];

}
