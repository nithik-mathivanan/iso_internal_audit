<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditChecklist extends Model{
      protected $table="auditchecklist";
    protected $fillable = ['id','RelevantClause','PS','CheckPoint','Conformance','NonConformanceMajor','NonConformanceMinor','Observation','Improvement','Remarks'];
}
