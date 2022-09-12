<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cauditplan  extends Model{
      protected $table="audit_plan";
    protected $fillable = ['id','audit_number','company','objective','standard','scope','department','activity','plan_date','start_time','end_time','auditor','auditee','document_ref','relevant_clause','remarks','status','comment','created_at','updated_at'];
}
