<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class CActivity extends Model
{
	//use SoftDeletes;
    protected $table="mc_activity";
     protected $fillable = ['id','company','name','status'];
    // protected $attributes=['status'=>1];
}
