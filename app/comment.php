<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class comment extends Model
{
	//use SoftDeletes;
    protected $table="comment";
     protected $fillable = ['id','comment','program_id','created_at'];
    // protected $attributes=['status'=>1];
}
