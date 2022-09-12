<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CScope extends Model
{
        protected $table="mc_scope";
    protected $fillable = ['id','company','name','status'];
 
}
