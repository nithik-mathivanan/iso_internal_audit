<?php

namespace App;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Database\Eloquent\Model;

class AuditChecklist extends Model implements ToModel, WithHeadingRow{
  protected $table="auditchecklist";
  protected $fillable = ['id','RelevantClause','PS','CheckPoint','Conformance','NonConformanceMajor','NonConformanceMinor','Observation','Improvement','Remarks'];

   public function model(array $row){
      if($row['relevant_clauses']){
 return new AuditChecklist([
           'RelevantClause'     => $row['relevant_clauses'],
            'PS'     => $row['ps'],
            'CheckPoint'     => $row['ps'],
            'Conformance'     => $row['ps'],
            'NonConformanceMajor'     => $row['ps'],
            'NonConformanceMinor'     => $row['ps'],
            'Observation'     => $row['ps'],
            'Improvement'     => $row['ps'],
            'Remarks'     => $row['ps'],
        ]);
      }
    
   }

}
