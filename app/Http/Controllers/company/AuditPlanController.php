<?php
namespace App\Http\Controllers\company;
use App\Http\Controllers\Controller;
use App\CauditProgram;
use App\Caudit_plan;
use App\User;
use App\CDepartment;
use App\CScope;
use App\Cauditplan;
use App\CStandard;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
class AuditPlanController extends Controller
{
	public function program_select()
	{
		$user = Auth::user();
		$companyid=$user->company_id;
		
		$program = DB::select("SELECT DISTINCT `audit_number`,`audit_frequency`,`status`,`draft` FROM `audit_program` where statusDelete='1' and company= '$companyid'  and `draft`  IN ('') and `audit_number` NOT IN   (SELECT audit_number FROM `audit_plan`)  ");
      
		 //$program=CauditProgram::select('audit_number','audit_frequency', 'status','draft')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('draft','')->get();
		return view('company.AuditPlan.program_select',compact('program'))->with('sno',$sno=1);
	}
	public function audit_plan($companyid,$audit_number)
	{
		$user = Auth::user();
		$company=$user->company_id;
		 $program=CauditProgram::select('audit_frequency', 'audit_number','company','standard','scope')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();
		$department=CDepartment::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
		$auditor=User::where('statusDelete','1')->where('company_id',$companyid)->where('auditor','Y')->get();

		$auditee=User::where('statusDelete','1')->where('company_id',$companyid)->where('auditee','Y')->get();

		return view('company.AuditPlan.audit_plan',compact('program','department','auditor','auditee'))->with('sno',$sno=0);
	}
	public function auditorsearch($department){
		$data = DB::select("SELECT  `id`,`name` FROM `users` where  `statusDelete`= '1' and `status`= 'audit' and `auditor`= 'Y' and `department` NOT IN   (SELECT department FROM `users` where `department`='$department' )  ");
		return response()->json($data);
	}
	public function auditeesearch($department){	 
		$data1 = DB::select("SELECT  `id`,`name` FROM `users` where `statusDelete`= '1' and `status`= 'audit' and `auditee`= 'Y' and `department`  IN   (SELECT department FROM `users` where `department`='$department' )  ");
		return response()->json($data1);
	}
public function auditplan_store(Request $request){

	//dd($request);
	$a=$request->department;
	$a1=array_unique($a);
	$count1=count(array_filter($a1));
	$b=$request->checkdepartment;
	$count2=count($b);
	if( $count1== $count2){
	$user = Auth::user();
	$count = count($request->department); 
	$auditorcount = count($request->auditor); 
	$scope=$request->scope;
	$scopearr=implode(",",$scope);
	$standard=$request->standard;
	$standardarr=implode(",",$standard); 
	for ($i=0; $i < $count; $i++) { 
	$value[$i]=$request->auditee[$i];

	$auditeearr=implode(",",$value[$i]);
	// $useremail=User::select('email')->where('id',$auditeearr)->get()->toArray(); //dd($useremail);
	
	// 	$data = array(
 //            'name'      =>  $user->name,
 //            'message'   =>  " “Audit Plan of Audit No. $request->audit_number ” received from MR“ "
 //        );
 //     Mail::to($useremail)->send(new SendMail($data)); 
 //     //$auditor[$i]=$request->auditor[$i];
	// // $useremail=User::select('email')->where('id',$auditor[$i])->get()->toArray(); //dd($useremail);
	
	// // 			 $data = array(
 // //            'name'      =>  $user->name,
 // //            'message'   =>  " “Audit Plan of Audit No. $request->audit_number ” received from MR“"
 // //        );
 //     Mail::to($useremail)->send(new SendMail($data));
	$department = new Cauditplan;
	$department->audit_number =  $request->audit_number;
	$department->company =  $user->company_id;
	$department->objective =  $request->objective;
	$department->standard =  $standardarr;
	$department->scope =  $scopearr;
	$department->activity =  $request->activity[$i];
	$department->department =  $request->department[$i];
	$department->plan_date =  $request->date1[$i];
	$department->start_time =  $request->start_time[$i];
	$department->end_time =  $request->end_time[$i];
	if($request->auditor[$i]==''){
	$department->auditor =  '';
	}
	else{
	$department->auditor =  $request->auditor[$i];
	}

	if($request->auditee[$i]==''){
	$department->auditee =  '';
	}
	else{
	$department->auditee =  $auditeearr;
	}
	$department->document_ref =  $request->document_ref[$i];
	$department->relevant_clause =   $request->relevant[$i];
	$department->remarks = $request->remarks[$i];
	$department->status = 'Rev0';
	$department->circulate = '0';
	$department->save();
	}

	return response()->json("Y"); 
	
	Session::flash('success', 'Stored Successfully');
	return redirect()->route('dashboard');

	}
	else{
		return back()->with('error','Check all the departments are selected....');
	} 	
		
}
	public function auditplan_store1(Request $request){
		$count = count($request->activity); 
		$data12="Success";
		return response()->json($data12,$count);
	}

	public function auditplan_view()
	{
	$user = Auth::user();
	$companyid=$user->company_id;
	
	 $plan=Cauditplan::select('status', 'audit_number','circulate')->distinct()->where('company',$companyid)->where('statusDelete','1')->get();
	return view('company.AuditPlan.auditplan_view',compact('plan'))->with('sno',$sno=1);

	}

	public function planview($companyid,$audit_number){

		$planview=Cauditplan::where('statusDelete','1')->where('company',$companyid)->where('audit_number',$audit_number)->get();
		 $planscope=Cauditplan::select('scope', 'standard')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();
		  $number=Cauditplan::select('audit_number')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();

		$department=CDepartment::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
		$auditor=User::where('statusDelete','1')->where('company_id',$companyid)->where('auditor','Y')->get();

		$auditee=User::where('statusDelete','1')->where('company_id',$companyid)->where('auditee','Y')->get();
		$program=CauditProgram::select('audit_frequency','audit_number','company','standard','scope','status')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();
		return view('company.AuditPlan.planview',compact('planview','planscope','number','department','auditor','auditee','program'))->with('sno',$sno=0)->with('sn',$sn=0)->with('sn1',$sn1=0);
	}
	public function auditplan_update(Request $request)
	{
		
		//dd($request->auditor);
		$user = Auth::user();
		$a=$request->department;
		$a1=array_unique($a);
		$count1=count(array_filter($a1));
		$b=$request->checkdepartment;
		$count2=count($b);
		if( $count1== $count2){

		$user = Auth::user();
		$count = count($request->department); 
		$scope=$request->scope;
		$scopearr=implode(",",$scope);
		$standard=$request->standard;
		$standardarr=implode(",",$standard);
		$id=$request->id;
		$count = count($id);
		$auditorcount = count($request->auditor); 
		if($count!=$auditorcount){
			return back()->with('error','Please select  auditor correctly....');
		}
		$status=$request->status;
		$status++;
			for ($i=0; $i < $count; $i++) 
			{ 
				$value=$request->auditee[$i];
					if(is_array($value))
					{
						$auditeearr=implode(",",$value);
						var_dump($auditeearr);
					}
					else
					{
						$auditeearr=$value;
						var_dump($auditeearr);
					}
				$auditor=$request->auditor[$i];
				$res = DB::table('audit_plan')				
				->where('id',$request->id[$i])					
				->update([
					'objective' => $request->objective,
					'scope' => $scopearr,
					'standard' => $standardarr,
					'activity' => $request->activity[$i],
					'department' => $request->department[$i],
					'plan_date' => $request->date1[$i],
					'start_time' => $request->start_time[$i],
					'end_time' => $request->end_time[$i],
					'auditor' => $auditor,
					'auditee' => $auditeearr,
					'circulate' => '0',
					'document_ref' => $request->document_ref[$i],
					'relevant_clause' => $request->relevant[$i],
					'remarks' => $request->remarks[$i],
					'status' => $status
				]);
			}
			for ($i=0; $i < $count; $i++)
			{ 
				$auditor=$request->auditor[$i];
				Log::channel('mailcustom')->info("Send mail to Department Head $auditor : “Audit Plan is created for Audit Number $request->audit_number”-created by MR ”   from $user->name ");
			}

				return back()->with('success','Updated successfully....');
		
		}
		else{
		return back()->with('error','Check all the departments are selected....');
		
	}}



	public function plancirculated(Request $request)
	{ //dd($request);
		$user = Auth::user();
		$companyid=$user->company_id;
		$plan = Cauditplan::select('audit_number','status')->distinct()->where('statusDelete','1')->where('company',$companyid)->update([
									'circulate' => '1','updated_at' => now()
									]);
		if ($plan == true)
		{
			Session::flash('success', 'Audit Plan Circulated Successfully');
			return redirect()->route('auditplan_view');
		}
		else
		{
			Session::flash('error', 'Audit Plan Circulated Not Successfully');
			return redirect()->route('auditplan_view');
		}
	}
 public function circulateplan_view()
					{
						

				$user = Auth::user();
				$companyid=$user->company_id;
				$plan = DB::select("SELECT DISTINCT `audit_number`,`status` FROM `audit_plan` where   company= '$companyid' and circulate IN ('1')  order by `id` desc");
			   
				return view('company.AuditPlan.circulateplan_view',compact('plan'))->with('sno',$sno=1);

					}
	public function circulateauditplanview($companyid,$audit_number){
	
		$user = Auth::user();
		$companyid=$user->company_id;
				$planview=Cauditplan::where('statusDelete','1')->where('company',$companyid)->where('audit_number',$audit_number)->get();
		 $planscope=Cauditplan::select('scope', 'standard')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();
		  $number=Cauditplan::select('audit_number')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();

		$department=CDepartment::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
		$auditor=User::where('statusDelete','1')->where('company_id',$companyid)->where('auditor','Y')->orderBy('id','desc')->get();
		$auditee=User::where('statusDelete','1')->where('company_id',$companyid)->where('auditee','Y')->orderBy('id','desc')->get();
		$program=CauditProgram::select('audit_frequency','audit_number','company','standard','scope','status')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();
		$scope1=CScope::where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('company',$companyid)->orderBy('id','desc')->get();
		return view('company.AuditPlan.circulateauditplanview',compact('planview','planscope','number','department','auditor','auditee','program','standard1','scope1'))->with('sno',$sno=0)->with('sn',$sn=0)->with('sn1',$sn1=0);
	}
	public function destroy($companyid,$audit_number){

		$plan = Cauditplan::where('audit_number',$audit_number)->where('company',$companyid)->delete();
		Session::flash('error', 'Audit Plan Deleted Successfully');
		return redirect()->route('program_select');
	}

}
