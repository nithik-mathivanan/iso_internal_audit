<?php
namespace App\Http\Controllers\company;
use App\Http\Controllers\Controller;
use App\Caudit_program;
use App\Caudit_plan;
use App\User;
use App\CDepartment;
use App\CScope;
use App\CReport;
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
class NonConformanceController extends Controller
{
	public function view($AuditPlanNo)
	{
		$user = Auth::user();
		$company_id=$user->company_id;
		$id=$user->id;
		//dd($AuditPlanNo);
		$program = CNonConformance::where('status',1)->where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->get();
      
	$ncreport = CReport::where('company_id',$company_id)->get();
       return view('company.nonconformance.view',compact('ncreport','program'))->with('sno',$sno=1);
    }
     public function ncview($AuditPlanNo){ 
                $user = Auth::user();
                $company_id=$user->company_id;
                $program = CNonConformance::where('status',1)->where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->get();
      
                
                return view('company.nonconformance.view',compact('program'))->with('sno',$sno=1);
     }
    public function ncviewdetail($AuditPlanNo,Request $request){ 
      //dd($AuditPlanNo);
       
   // dd($request()->AuditPlanNo);
        
        $uservalue = Auth::user();
        $company_id=$uservalue->company_id;
        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $user = CNonConformance::where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->offset($start)->limit($limit);
        
           
        $totalrecords= CNonConformance::where('company_id',$company_id)->where('AuditPlanNo',$AuditPlanNo)->count();
      
        
        return DataTables::of($user)
        ->addColumn('action', function ($user){
                 $AuditPlanNo=CNonConformance::select('AuditPlanNo','company_id')->where('id',$user->id)->distinct()->count();
               return '<a href="'.route('ncreffective',['id'=>$user->id,'AuditPlanNo'=>$user->AuditPlanNo]).'"  class="btn btn-info btn-circle" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
            })

        ->addColumn('delete', function ($user){
                 $AuditPlanNo=CNonConformance::select('AuditPlanNo','company_id')->where('id',$user->id)->distinct()->count();
               return '<a href="'.route('ncreffective',['id'=>$user->id,'AuditPlanNo'=>$user->AuditPlanNo]).'"  class="btn btn-info btn-circle" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
            })

        ->addColumn('ncreport', function ($user){  
             $report = CReport::where('AuditPlanNo',$user->AuditPlanNo)->get();
   $major = CReport::select('major')->where('AuditPlanNo',$user->AuditPlanNo)->where('NCRNO',$user->id)->first();
        $minor = CReport::select('major')->where('AuditPlanNo',$user->AuditPlanNo)->first();
        $CorrectiveTargetDate = CReport::select('CorrectiveTargetDate')->where('AuditPlanNo',$user->AuditPlanNo)->first();
        $plan_comments = CReport::select('plan_comments')->where('AuditPlanNo',$user->AuditPlanNo)->where('NCRNO',$user->id)->first();
        $CorrectiveResponsible = CReport::select('CorrectiveResponsible')->where('AuditPlanNo',$user->AuditPlanNo)->first();
        $root = CReport::select('root')->where('AuditPlanNo',$user->AuditPlanNo)->first();
        $CorrectionTargetDate = CReport::select('CorrectionTargetDate')->where('AuditPlanNo',$user->AuditPlanNo)->first();
        $CorrectionResponsible = CReport::select('CorrectionResponsible')->where('AuditPlanNo',$user->AuditPlanNo)->first();
        $plan_date = CReport::select('plan_date')->where('AuditPlanNo',$user->AuditPlanNo)->first();
        $CorrectiveStatus = CReport::select('CorrectiveStatus')->where('AuditPlanNo',$user->AuditPlanNo)->first();
        $CorrectionStatus = CReport::select('CorrectionStatus')->where('AuditPlanNo',$user->AuditPlanNo)->first();
        $plan_auditor = CReport::select('plan_auditor')->where('AuditPlanNo',$user->AuditPlanNo)->first();
        $plan_status = CReport::select('plan_status')->where('AuditPlanNo',$user->AuditPlanNo)->first();

        $program = CNonConformance::where('id',$user->id)->where('status',0)->get();       
        $program1 = CNonConformance::where('id',$user->id)->where('status',1)->get();      
        $program2 = CNonConformance::where('id',$user->id)->where('status',2)->get();  
        $program3= CNonConformance::where('id',$user->id)->where('status',3)->get();  
        $program4= CNonConformance::where('id',$user->id)->where('status',4)->get();
        if(count($program) === 1){
         return ' <a href="'.route('ncrwithdraw',['id'=>$user->id]).'"  class="btn btn-info btn-sm btn-danger" data-toggle="tooltip" data-original-title="Edit">Withdraw</a>';
        }
        elseif(count($program2) === 1){
        return '';
        }
        elseif(count($program3) === 1){
        return '';
        }
        elseif(count($program1) === 1){
    
             if(count($report)>0){
                
     

        return '<button type="button" class="btn btn-info btn-circle addAttr" data-toggle="modal" data-target="#myModal" id="'.$user->id.'" AuditPlanNo="'.$user->AuditPlanNo.'" 
            major ="'.$major->major.'" plan_comments="'.$plan_comments->plan_comments.'" minor ="'.$minor->minor.'" CorrectionResponsible ="'.$CorrectionResponsible->CorrectionResponsible.'" CorrectionTargetDate ="'.$CorrectionTargetDate->CorrectionTargetDate.'"  root ="'.$root->root.'" CorrectiveResponsible ="'.$CorrectiveResponsible->CorrectiveResponsible.'" CorrectiveTargetDate ="'.$CorrectiveTargetDate->CorrectiveTargetDate.'" CorrectiveStatus ="'.$CorrectiveStatus->CorrectiveStatus.'"  CorrectionStatus ="'.$CorrectionStatus->CorrectionStatus.'" plan_date ="'.$plan_date->plan_date.'" plan_auditor ="'.$plan_auditor->plan_auditor.'" plan_status ="'.$plan_status->plan_status.'" ><i class="fa fa-pencil" aria-hidden="true"></i></button>';
        }
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
                        return "<button class='btn btn-danger btn-sm'>Waiting for Auditee action </button>";
                }                 
               elseif(count($program1) === 1){
                        return "<button class='btn btn-danger btn-sm'>Waiting for your Verification </button>";
                }
                elseif(count($program2) === 1){
                        return "<button class='btn btn-success   btn-sm'> Completed</button>";
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
     return view('company.nonconformance.report',compact('ncr','auditplan','report','user'))->with('sno',$sno=1);
    }
	public function destroy($id)
	{
       $data=CNonConformance::where('id',$id)->update(['status'=>'3']);
     
        Session::flash('error', 'Withdraw Successfully');
        return redirect()->back();
	}
}
