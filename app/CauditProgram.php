<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauditProgram  extends Model{
      protected $table="audit_program";
    protected $fillable = ['id','company','audit_frequency','start','end','scope','department','plan','actual','audit_number','remarks','comment','status','circulate','circulate_created'];
}
