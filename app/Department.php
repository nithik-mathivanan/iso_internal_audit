<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table="m_department";
    protected $fillable = ['name','shortname','status'];
    //protected $attributes=['status'=>1];
}
