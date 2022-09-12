<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class CDesignation extends Model
{
	//use SoftDeletes;
    protected $table="mc_designation";
     protected $fillable = ['id','company','name','status'];
    // protected $attributes=['status'=>1];
}
