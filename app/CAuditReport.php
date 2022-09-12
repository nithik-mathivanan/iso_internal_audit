<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class CAuditReport extends Model
{
	//use SoftDeletes;
    protected $table="auditreport";
     protected $fillable = ['id','company_id','AuditPlanNo','auditor','plan_date','summary1','summary2','summary3','status','created_at','updated_at'];
    // protected $attributes=['status'=>1];
}
