<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table="country";
    protected $fillable = ['name','code'];
    protected $attributes=['status'=>1];
    
}
