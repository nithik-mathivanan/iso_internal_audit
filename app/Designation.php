<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class Designation extends Model
{
	//use SoftDeletes;
    protected $table="m_designation";
    protected $fillable = ['name','status'];
    // protected $attributes=['status'=>1];
}
