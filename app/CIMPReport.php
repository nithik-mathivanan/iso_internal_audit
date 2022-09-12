<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class CIMPReport extends Model
{
    //use SoftDeletes;
    protected $table="impreport";
     protected $fillable = ['id','company_id','AuditPlanNo','IMPNO','auditee','description','propose','response','target','status','created_at','updated_at'];
    // protected $attributes=['status'=>1];
}
