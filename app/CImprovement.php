<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class CImprovement extends Model
{
	//use SoftDeletes;
    protected $table="improvement";
     protected $fillable = ['id','company_id','AuditPlanNo','auditor','improvement','status','created_at','updated_at'];
    // protected $attributes=['status'=>1];
}
