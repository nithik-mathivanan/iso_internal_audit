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
use App\OBSReport;
use App\CStandard;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class AuditeeOBSController extends Controller
{
	public function view($AuditPlanNo)
	{
		$user = Auth::user();
		$company_id=$user->company_id;
		$id=$user->id;
		
		$program = CObservation::where('status',1)->where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->get();
      
		
		return view('company.Auditee.OBS.view',compact('program'))->with('sno',$sno=1);
    }
     public function obsview($AuditPlanNo){ 
                $user = Auth::user();
                $company_id=$user->company_id;
                $program = CObservation::where('status',1)->where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->get();
      
                
                return view('company.Auditee.OBS.view',compact('report'))->with('sno',$sno=1);
     }
    public function OBSviewdetail($AuditPlanNo,Request $request){ 
        $uservalue = Auth::user();
        $company_id=$uservalue->company_id;
        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $user = CObservation::where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->offset($start)->limit($limit);
       //  $report = Cauditreport::select('AuditPlanNo','company_id','plan_date')->distinct()->where('company_id',$company_id)->where('auditee',$id)->offset($start)->limit($limit);
        
        $totalrecords= CObservation::where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->count();
      
        
        return DataTables::of($user)
        ->addColumn('action', function ($user){
                 $AuditPlanNo=CObservation::select('AuditPlanNo','company_id')->where('id',$user->id)->distinct()->count();
               
               return '<a href="'.route('auditeencreffective',['id'=>$user->id,'AuditPlanNo'=>$user->AuditPlanNo]).'"  class="btn btn-info btn-circle" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
            }) 
        ->addColumn('obsreport', function ($user){       
                //$program = CReport::select('NCRNO')->where('NCRNO',$user->id)->get();
           
                $program = CObservation::where('id',$user->id)->where('status',0)->get();
               if(count($program) === 1){
               
               return '<button type="button" class="btn btn-info btn-circle addAttr" data-toggle="modal" data-target="#myModal" id="'.$user->id.'" AuditPlanNo="'.$user->AuditPlanNo.'"><i class="fa fa-pencil" aria-hidden="true"></i></button>';
               }
            })
       
        ->editColumn('status',
                function ($row) {      
            $program = CObservation::where('id',$row->id)->where('status',0)->get();
           $program1= CObservation::where('id',$row->id)->where('status',1)->get();
           $program2= CObservation::where('id',$row->id)->where('status',2)->get();
            $program3= CObservation::where('id',$row->id)->where('status',3)->get();
          
               if(count($program) === 1){
                        return "<button class='btn btn-danger btn-sm'>Waiting for Your action </button>";
                }                 
               elseif(count($program1) === 1){
                        return "<button class='btn btn-danger btn-sm'>Waiting for Action </button>";
                }
                elseif(count($program2) === 1){
                        return "<button class='btn btn-warning btn-sm'>Action Planned</button>";
                }
                elseif(count($program3) === 1){
                        return "<button class='btn btn-success btn-sm'>Completed</button>";
                }
                else{
                }
                })
          
         ->rawColumns(['action','status','obsreport'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }
    public function obseffective($id,$AuditPlanNo){ 
        $user = User::get();
        $ncr=CObservation::where('id',$id)->get(); 
        $report=Cauditreport::select('AuditPlanNo','company_id','plan_date')->distinct()->where('AuditPlanNo',$AuditPlanNo)->get(); 
        $auditplan=Cauditplan::where('id',$AuditPlanNo)->get();
     return view('company.Auditee.OBS.report',compact('ncr','auditplan','report','user'))->with('sno',$sno=1);
        
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