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
use App\CStandard;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class AuditeeReportController extends Controller
{
	
	public function view()
	{
		$user = Auth::user();
		$companyid=$user->company_id;
		$id=$user->id;	

		$plan=Cauditplan::select('auditee')->where('company',$companyid)->where('auditee',$id)->get();
		
		$report=Cauditreport::where('company_id',$companyid)->where('auditee',$id)->get();

		return view('company.Auditee.Report.view',compact('report','plan'))->with('sno',$sno=1);
	}
	public function ncdata(Request $request){
        $uservalue = Auth::user();
        $company_id=$uservalue->company_id;
        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
      	$id=$uservalue->id;
        $plan=Cauditplan::where('company',$company_id)->where('auditee',$id)->get();
		    $planid=Cauditplan::select('id')->where('company',$company_id)->get();
        $plancount=Cauditplan::where('company',$company_id)->count();
    //     for($i=1;$i<$plancount;$i++){
				// $list_desings_ids=array($plan[$i]->auditee);
				// var_dump($list_desings_ids);
				// var_dump($id);
				// var_dump($planid[$i]->id);
				// if(in_array($id, $list_desings_ids))
				// 	{				
				// 	dd( "Yes, design_id: $design_id exits in array");

				// 	}else{ dd("no");}
				// 	}


        $report = Cauditreport::where('company_id',$company_id)->where('auditee',$id)->offset($start)->limit($limit);
        
        $totalrecords= Cauditreport::where('company_id',$company_id)->where('auditee',$id)->count();
      
        
        return DataTables::of($report)
        ->addColumn('action', function ($report){
               return '
                <a href="" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href=""  class="btn btn-danger delete btn-circle sa-params"
                      data-toggle="tooltip" data-original-title="Delete"  ><i class="fa fa-times" aria-hidden="true"></i></a>';
            })
        ->addColumn('nonconformance', function ($report){         
                $AuditPlanNo=CNonConformance::select('AuditPlanNo','company_id')->where('AuditPlanNo',$report->AuditPlanNo)->distinct()->count();
               return $AuditPlanNo.'
                <a href="'.route('auditeencview',['AuditPlanNo'=>$report->AuditPlanNo]).'"  class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
            })
         ->addColumn('OBS', function ($report){         
                $AuditPlanNo=CObservation::select('AuditPlanNo','company_id')->where('AuditPlanNo',$report->AuditPlanNo)->distinct()->count();
               return $AuditPlanNo.' <a href="'.route('auditeeOBSview',['AuditPlanNo'=>$report->AuditPlanNo]).'"  class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
            })
        ->addColumn('IMP', function ($report){         
                $AuditPlanNo=CImprovement::select('AuditPlanNo','company_id')->where('AuditPlanNo',$report->AuditPlanNo)->distinct()->count();
               return $AuditPlanNo.' <a href="'.route('auditeeIMPview',['AuditPlanNo'=>$report->AuditPlanNo]).'"  class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
            })
        ->editColumn('status',
              function ($row) {
                    if($row->status==1)
                      return "<b>Active</b>";
                    else
                      return "Inactive";
                })
        
          
         ->rawColumns(['action','status','nonconformance','OBS','IMP'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }
	public function reportview($companyid,$AuditPlanNo)
	{
		$user = Auth::user();	
        $report=Cauditreport::where('company_id',$companyid)->where('AuditPlanNo',$AuditPlanNo)->get();
		return view('company.AuditReport.AuditorReportView',compact('report'))->with('sno',$sno=1);
	}
	public function audit_report_complete($companyid,$audit_number,$department)
	{
		$plan = Cauditplan::where('department',$department)->where('audit_number',$audit_number)->where('company',$companyid)->get();

		$user= User::where('statusDelete','1')->get();
		
		return view('company.AuditReport.audit_report_complete',compact('plan','user'))->with('sno',$sno=0)->with('sn',$sn=0)->with('sn1',$sn1=0);
	}

	 public function add(Request $request)
    {
		
    	if($request->summary2=='on'){
		$this->validate($request,[
    	   'conformance.0' => 'required',
    	   'nonconformance.0' => 'required',
    	]);
	}
		if($request->summary1=='on'){
			$summary1='1';
		}     
		else{
			$summary1='0';
		}  
		if($request->summary2=='on'){
			$summary2='1';
		}     
		else{
			$summary2='0';
		}   
		if($request->summary3=='on'){
			$summary3='1';
		}     
		else{
			$summary3='0';
		}  
		$auditreport = new CAuditReport;
		$user = Auth::user();
		$auditreport->company_id=$user->company_id;
		$auditreport->AuditPlanNo=$request->AuditPlanNo;
        $auditreport->auditor=$request->auditor;
        $auditreport->auditee=$request->auditee;
        $auditreport->plan_date=$request->plan_date;
        $auditreport->summary1=$summary1;
        $auditreport->summary2=$summary2;
        $auditreport->summary3=$summary3;
        $auditreport->status='1';
        $auditreport->save(); 
		if($request->conformance[0]=='')
		{  
		}
		else{

		$count = count($request->conformance); //dd($count);
		for ($i=0; $i < $count; $i++)
		{ $j=$i+1;
		$CNO=$request->NCRNO.'-CNO-'.$j;
		$conformance = new CConformance;
		
		$user = Auth::user();
		$conformance->company_id=$user->company_id;
		$conformance->AuditPlanNo=$request->AuditPlanNo;
		$conformance->auditor=$request->auditor;
		$conformance->conformance=$request->conformance[$i];
		$conformance->CNO=$CNO;
        $conformance->status='1';	
        $conformance->save();
		}
		}
		if($request->nonconformance[0]==''){ }else{
		$count1 = count($request->nonconformance);
		for ($i=0; $i < $count1; $i++)
		{ 
			$j=$i+1;
		$NCRNO=$request->NCRNO.'-NCR-'.$j;
		//dd($NCRNO);
		$nonconformance = new CNonConformance;
		$user = Auth::user();
		$nonconformance->company_id=$user->company_id;
		$nonconformance->AuditPlanNo=$request->AuditPlanNo;
		$nonconformance->auditor=$request->auditor;
		$nonconformance->nonconformance=$request->nonconformance[$i];
		$nonconformance->NCRNO=$NCRNO;
        $nonconformance->status='1';	
        $nonconformance->save();
		}
		}
		if($request->observation[0]==''){ }else{
		$count2 = count($request->observation);
		for ($i=0; $i < $count2; $i++)
		{ $j=$i+1;
		$OBSNO=$request->NCRNO.'-OBS-'.$j;
		$observation = new CObservation;
		$user = Auth::user();
		$observation->company_id=$user->company_id;
		$observation->AuditPlanNo=$request->AuditPlanNo;
		$observation->auditor=$request->auditor;
		$observation->observation=$request->observation[$i];
		$observation->OBSNO=$OBSNO;
        $observation->status='1';	
        $observation->save();
		}
		}
		if($request->improvement[0]==''){ }else{
		$count3 = count($request->improvement);
		for ($i=0; $i < $count3; $i++)
		{ $j=$i+1;
		$IMPNO=$request->NCRNO.'-IMP-'.$j;
		$improvement = new CImprovement;
		$user = Auth::user();
		$improvement->company_id=$user->company_id;
		$improvement->AuditPlanNo=$request->AuditPlanNo;
		$improvement->auditor=$request->auditor;
		$improvement->improvement=$request->improvement[$i];
		$improvement->IMPNO=$IMPNO;
        $improvement->status='1';	
        $improvement->save();
		}
		}
		$AuditNumber=$request->AuditNumber;
		$department=$request->department;
		$user = Auth::user();
		$name=$user->name;
		Log::channel('mailcustom')->info("“Audit Report” completed by $name  for the process/ department $department of Audit No. $AuditNumber ” ");
        Session::flash('success', 'Audit Report Stored Successfully');
        return redirect()->route('audit_report_select');
    }

	public function destroy($id)
	{

	}
}
