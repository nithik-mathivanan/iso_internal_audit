<?php
namespace App\Http\Controllers\company;
use App\Http\Controllers\Controller;
use App\Caudit_program;
use App\Caudit_plan;
use App\User;
use App\CDepartment;
use App\CScope;
use App\CReport;
use App\COBSReport;
use App\Cauditplan;
use App\CConformance;
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
class OBSController extends Controller
{
	public function view($AuditPlanNo)
	{
		$user = Auth::user();
		$company_id=$user->company_id;
		$id=$user->id;
		
		$report = CObservation::where('status',1)->where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->get();
	  
		$ncreport = COBSReport::where('company_id',$company_id)->get();
	  
		return view('company.OBS.view',compact('report','ncreport'))->with('sno',$sno=1);
	}
	 public function OBSview($AuditPlanNo){ 
				$user = Auth::user();
				$company_id=$user->company_id;
				$report = CObservation::where('status',1)->where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->get();
	  
				
				return view('company.OBS.view',compact('report'))->with('sno',$sno=1);
	 }
	public function OBSviewdetail($AuditPlanNo,Request $request){ 
		$uservalue = Auth::user();
		$company_id=$uservalue->company_id;
		$limit = $request->get('length');
		$start = ($request->start) * $request->length;
		$obs = CObservation::where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->offset($start)->limit($limit);
		
		$totalrecords= CObservation::where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->count();
	  
		
		return DataTables::of($obs)
		->addColumn('action', function ($obs){
				 $AuditPlanNo=CObservation::select('AuditPlanNo','company_id')->where('id',$obs->id)->distinct()->count();
			   return '<a href="'.route('ncreffective',['id'=>$obs->id,'AuditPlanNo'=>$obs->AuditPlanNo]).'"  class="btn btn-info btn-circle" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
			})

		->addColumn('delete', function ($obs){
				 $AuditPlanNo=CObservation::select('AuditPlanNo','company_id')->where('id',$obs->id)->distinct()->count();
			   return '<a href="'.route('ncreffective',['id'=>$obs->id,'AuditPlanNo'=>$obs->AuditPlanNo]).'"  class="btn btn-info btn-circle" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
			})

		->addColumn('OBS', function ($obs){       
			$program = CObservation::where('id',$obs->id)->where('status',0)->get();       
			$report = COBSReport::where('OBSNO',$obs->id)->first();    
			$program1 = CObservation::where('id',$obs->id)->where('status',1)->get();      
			$program2 = CObservation::where('id',$obs->id)->where('status',2)->get();  
			$program3= CObservation::where('id',$obs->id)->where('status',3)->get();  
			$program4= CObservation::where('id',$obs->id)->where('status',4)->get();
		if(count($program) === 1){
		 return ' <a href="'.route('obswithdraw',['id'=>$obs->id]).'"  class="btn btn-info btn-sm btn-danger" data-toggle="tooltip" data-original-title="Edit">Withdraw</a>';
		}
		elseif(count($program2) === 1){
		return '';
		}
		elseif(count($program3) === 1){
		return '';
		}
		elseif(count($program1) === 1){
		return '';
		}
			})
		->editColumn('status',
				function ($row) {
			$program = CObservation::where('id',$row->id)->where('status',0)->get();
		   $program1= CObservation::where('id',$row->id)->where('status',1)->get();
		   $program2= CObservation::where('id',$row->id)->where('status',2)->get();
			$program3= CObservation::where('id',$row->id)->where('status',3)->get();
			$program4= CObservation::where('id',$row->id)->where('status',4)->get();
		    
			   if(count($program) === 1){
						return '<a href="'.route('obswithdraw',['id'=>$row->id]).'"  class="btn btn-info btn-sm btn-success" data-toggle="tooltip" data-original-title="Edit">Withdraw</a>';
				}                 
			   elseif(count($program1) === 1){
						return "<button class='btn btn-danger btn-sm'>Waiting for your Verification </button>";
				}
				elseif(count($program2) === 1){
						return "<button class='btn btn-success btn-sm'> Completed</button>";
				}
				elseif(count($program3) === 1){
						return "<button class='btn btn-warning btn-sm'>Already Withdrawn</button>";
				}
				elseif(count($program4) === 1){
						return "<button class='btn btn-warning btn-sm'>Not Accepted</button>";
				}
				else{
				}
				})
		  
		 ->rawColumns(['action','status'])
		 ->setTotalRecords($totalrecords)
		 ->make(true);
	}
	public function obseffective($id,$AuditPlanNo){ 
		 
		$user = User::get();
		$ncr=CObservation::where('id',$id)->get(); 
		$report=Cauditreport::select('AuditPlanNo','company_id','plan_date')->distinct()->where('AuditPlanNo',$AuditPlanNo)->get(); 
		$auditplan=Cauditplan::where('id',$AuditPlanNo)->get();
	 return view('company.nonconformance.report',compact('ncr','auditplan','report','user'))->with('sno',$sno=1);
	}
	public function destroy($id)
	{
	   $data=CObservation::where('id',$id)->update(['status'=>'3']);
	 
		Session::flash('error', 'Withdraw Successfully');
		return redirect()->back();
	}
}
