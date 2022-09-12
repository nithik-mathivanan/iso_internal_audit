<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CDepartment extends Model{
      protected $table="mc_department";
    protected $fillable = ['id','company','name','shortname','status'];
}
