<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
     protected $table="district";
    protected $fillable = ['name','country','state'];
    protected $attributes=['status'=>1];
}
