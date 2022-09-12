<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
	use SoftDeletes;
    protected $table="companies";
    // protected $fillable = ['name','code'];
    // protected $attributes=['status'=>1];
}