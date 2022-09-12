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
use App\CIMPReport;
use Session;
use App\CStandard;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class IMPreportController extends Controller
{	
	public function store(Request $request)
	{
		$impreport = new CIMPReport;
		$imp = new CImprovement;
		$user = Auth::user();
		$impreport->company_id=$user->company_id;
		$impreport->AuditPlanNo=$request->AuditPlanNo;
		$impreport->IMPNO=$request->IMPNO;
		$impreport->auditee=$user->id;
		$impreport->description=$request->description;
        $impreport->propose=$request->propose;
        $impreport->response=$request->response;
        $impreport->target=$request->target;
        $impreport->status=$request->status;
        $impreport->save(); 
        $imp->status=$request->status;
		$res = CImprovement::where('id',$request->IMPNO)					
				->update([
					'status' => $request->status,
					]);
	return response()->json("Y");
	}
	public function update(Request $request)
	{
		$impreport = new CReport;
		$res = CReport::where('IMPNO',$request->IMPNO)					
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
