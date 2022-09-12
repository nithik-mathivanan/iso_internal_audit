<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class CNonConformance extends Model
{
	//use SoftDeletes;
    protected $table="nonconformance";
     protected $fillable = ['id','company_id','AuditPlanNo','auditor','nonconformance','status','created_at','updated_at'];
    // protected $attributes=['status'=>1];
}
