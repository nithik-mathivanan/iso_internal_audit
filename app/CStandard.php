<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CStandard extends Model
{
    protected $table="mc_standard";
    protected $fillable = ['id','company','name','status'];
}
