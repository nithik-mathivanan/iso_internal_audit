<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
       protected $table="city";
    protected $fillable = ['name','country','state','district'];
    protected $attributes=['status'=>1];
}
