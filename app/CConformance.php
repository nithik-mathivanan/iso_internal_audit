<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class CConformance extends Model
{
	//use SoftDeletes;
    protected $table="conformance";
     protected $fillable = ['id','company_id','AuditPlanNo','auditor','conformance','status','created_at','updated_at'];
    // protected $attributes=['status'=>1];
}
