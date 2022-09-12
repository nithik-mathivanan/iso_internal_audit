<?php

namespace App\Imports;

use App\AuditChecklist;
use Maatwebsite\Excel\Concerns\ToModel;

class Import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AuditChecklist([
           'RelevantClause'     => $row['0'],
            'PS'     => $row['1'],
            'CheckPoint'     => $row['2'],
            'Conformance'     => $row['3'],
            'NonConformanceMajor'     => $row['4'],
            'NonConformanceMinor'     => $row['5'],
            'Observation'     => $row['6'],
            'Improvement'     => $row['7'],
            'Remarks'     => $row['8'],
        ]);
    }
}
