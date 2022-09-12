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
use App\CAuditReport;
use Session;
use App\CStandard;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class NCReportController extends Controller
{	
	public function store(Request $request)
	{
		//dd($_FILES);
	$image1 = $request->correction_document;
	$filename1 = time().rand(100,999).'NCR.'.$image1->getClientOriginalExtension();
	$image1->move(public_path().'/images',$filename1);
     
	$image2 = $request->desc_document;
	$filename2 = time().rand(100,999).'NCR.'.$image2->getClientOriginalExtension();
	$image2->move(public_path().'/images',$filename2);


	$image3 = $request->correction_comment;
	$filename3 = time().rand(100,999).'NCR.'.$image3->getClientOriginalExtension();
	$image3->move(public_path().'/images',$filename3);

    	$ncrport = new CReport;
		$nc = new CNonConformance;
		$user = Auth::user();
		$ncrport->company_id=$user->company_id;
		if($request->major=='on'){ 
		$ncrport->major='1';
		}
		if($request->minor=='on'){ 
		$ncrport->minor='1';
		}
		$ncrport->AuditPlanNo=$request->AuditPlanNo;
		$ncrport->NCRNO=$request->NCRNO;
		$ncrport->auditee=$user->id;
       $ncrport->DescDocument=$filename2;
		$ncrport->CorrectionResponsible=$request->CorrectionResponsible;
        $ncrport->CorrectionTargetDate=$request->CorrectionTargetDate;
       $ncrport->CorrectionDocument=$filename1;
       // $ncrport->path = '/public/'.$path;
        $ncrport->CorrectionStatus=$request->CorrectionStatus;
		$ncrport->CorrectiveResponsible=$request->CorrectiveResponsible;
        $ncrport->CorrectiveTargetDate=$request->CorrectiveTargetDate;
        $ncrport->CorrectiveStatus=$request->CorrectiveStatus;
        $ncrport->plan_date=$request->correction_date;
        $ncrport->plan_comments=$filename3;
        $ncrport->plan_status=$request->plan_status;
        $ncrport->root=$request->root[0];
        $ncrport->status='0';
        $ncrport->save(); 
        $nc->status='1';
		$res = CNonConformance::where('id',$request->NCRNO)					
				->update([
					'status' => '1',
					]);
	return response()->json("Y");
	}
	public function update(Request $request)
	{
		$ncrport = new CReport;
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
