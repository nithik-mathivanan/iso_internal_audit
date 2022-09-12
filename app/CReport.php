<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class CReport extends Model
{
	//use SoftDeletes;
    protected $table="ncreport";
     protected $fillable = ['id','AuditPlanNo','NCRNO','grade','auditee','CorrectionResponsible','CorrectionTargetDate','CorrectionStatus','root','CorrectionResponsible','CorrectiveTargetDate','plan_date','plan_auditor','plan_comments','plan_status','verify_date','verify_auditor','verify_comments','verify_status'];
    // protected $attributes=['status'=>1];
}
