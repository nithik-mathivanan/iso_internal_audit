<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class CSetting extends Model
{
	//use SoftDeletes;
    protected $table="mr_setting";
     protected $fillable = ['id','logo','company_name','document_name','prepared','reviewed','approved','status'];
    // protected $attributes=['status'=>1];
}
