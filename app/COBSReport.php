<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class COBSReport extends Model
{
    //use SoftDeletes;
    protected $table="obsreport";
     protected $fillable = ['id','company_id','AuditPlanNo','OBSNO','auditee','description','propose','response','target','status','created_at','updated_at'];
    // protected $attributes=['status'=>1];
}
