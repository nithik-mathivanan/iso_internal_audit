<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class CObservation extends Model
{
	//use SoftDeletes;
    protected $table="observation";
     protected $fillable = ['id','company_id','AuditPlanNo','auditor','observation','status','created_at','updated_at'];
    // protected $attributes=['status'=>1];
}
