<?php
namespace App\Http\Controllers\company;
use App\Http\Controllers\Controller;
use App\Caudit_program;
use App\Caudit_plan;
use App\User;
use App\CDepartment;
use App\CScope;
use App\Cauditplan;
use App\CConformance;
use App\CReport;
use App\CNonConformance;
use App\CObservation;
use App\CImprovement;
use App\COBSReport;
use Session;
use App\CStandard;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class OBSreportController extends Controller
{	
	public function store(Request $request)
	{
		$obsreport = new COBSReport;
		$obs = new CObservation;
		$user = Auth::user();
		$obsreport->company_id=$user->company_id;
		$obsreport->AuditPlanNo=$request->AuditPlanNo;
		$obsreport->OBSNO=$request->OBSNO;
		$obsreport->auditee=$user->id;
		$obsreport->description=$request->description;
        $obsreport->propose=$request->propose;
        $obsreport->response=$request->response;
        $obsreport->target=$request->target;
        $obsreport->status=$request->status;
        $obsreport->save(); 
        $obs->status=$request->status;
		$res = CObservation::where('id',$request->OBSNO)					
				->update([
					'status' => $request->status,
					]);
	return response()->json("Y");
	}
	public function update(Request $request)
	{
		$obsreport = new CReport;
		$res = CReport::where('NCRNO',$request->NCRNO)					
				->update([
					'verify_comments' => $request->verify_comments,
					'verify_date' => $request->verify_date,
					'status' => '1',
					]);
			
		
		if ($res == true) 
		{
			return response()->json("Y");
		}

     
	
	}
	public function destroy($id)
	{

	}
}
