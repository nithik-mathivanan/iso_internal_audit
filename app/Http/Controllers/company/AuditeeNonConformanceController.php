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
use App\CNonConformance;
use App\CObservation;
use App\CImprovement;
use App\CAuditReport;
use Session;
use App\CReport;
use App\CStandard;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class AuditeeNonConformanceController extends Controller
{
	public function view($AuditPlanNo)
	{
		$user = Auth::user();
		$company_id=$user->company_id;
		$id=$user->id;
		
		$program = CNonConformance::where('status',1)->where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->get();
      
		
		return view('company.Auditee.nonconformance.view',compact('program'))->with('sno',$sno=1);
    }
     public function ncview($AuditPlanNo){ 
                $user = Auth::user();
                $company_id=$user->company_id;
                $program = CNonConformance::where('status',1)->where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->get();
      
                
                return view('company.Auditee.nonconformance.view',compact('report'))->with('sno',$sno=1);
     }
    public function ncviewdetail($AuditPlanNo,Request $request){ 
        $uservalue = Auth::user();
        $company_id=$uservalue->company_id;
        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $user = CNonConformance::where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->offset($start)->limit($limit);
         
        $totalrecords= CNonConformance::where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->count();
      
        
        return DataTables::of($user)
        ->addColumn('action', function ($user){
                 $AuditPlanNo=CNonConformance::select('AuditPlanNo','company_id')->where('id',$user->id)->distinct()->count();
               
               return '<a href="'.route('auditeencreffective',['id'=>$user->id,'AuditPlanNo'=>$user->AuditPlanNo]).'"  class="btn btn-info btn-circle" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
            })
        ->addColumn('ncreport', function ($user){       
                //$program = CReport::select('NCRNO')->where('NCRNO',$user->id)->get();
           
                $program = CNonConformance::where('id',$user->id)->where('status',0)->get();
               if(count($program) === 1){
               return '<button type="button" class="btn btn-info btn-circle addAttr" data-toggle="modal" data-target="#myModal" id="'.$user->id.'" AuditPlanNo="'.$user->AuditPlanNo.'"><i class="fa fa-pencil" aria-hidden="true"></i></button>';
               }
            })

        ->editColumn('status',
                function ($row) {      
            $program = CNonConformance::where('id',$row->id)->where('status',0)->get();
           $program1= CNonConformance::where('id',$row->id)->where('status',1)->get();
           $program2= CNonConformance::where('id',$row->id)->where('status',2)->get();
            $program3= CNonConformance::where('id',$row->id)->where('status',3)->get();
            $program4= CNonConformance::where('id',$row->id)->where('status',4)->get();
          
               if(count($program) === 1){
                        return "<button class='btn btn-danger btn-sm'>Waiting for Your action </button>";
                }                 
               elseif(count($program1) === 1){
                        return "<button class='btn btn-danger btn-sm'>Waiting for Auditor Verification </button>";
                }
                elseif(count($program2) === 1){
                        return "<button class='btn btn-success btn-sm'>Completed</button>";
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
          
         ->rawColumns(['action','status','ncreport'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }
    public function ncreffective($id,$AuditPlanNo){ 
        $user = User::get();
        $ncr=CNonConformance::where('id',$id)->get(); 
        $report=Cauditreport::select('AuditPlanNo','company_id','plan_date')->distinct()->where('AuditPlanNo',$AuditPlanNo)->get(); 
        $auditplan=Cauditplan::where('id',$AuditPlanNo)->get();
     return view('company.Auditee.nonconformance.report',compact('ncr','auditplan','report','user'))->with('sno',$sno=1);
        
    }    
   public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Sample_data::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }
	public function destroy($id)
	{

	}
}