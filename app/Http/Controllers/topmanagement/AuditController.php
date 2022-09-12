<?php

namespace App\Http\Controllers\topmanagement;

use App\Http\Controllers\Controller;
use Session;
use App\CauditProgram;
use App\User;
use App\CDepartment;
use App\CScope;
use App\Cauditplan;
use App\CStandard;
use App\comment;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Log;
class AuditController extends Controller
{

	public function index()
	{
		$user = Auth::user();
		$companyid=$user->company_id;
		$program=CauditProgram::select('audit_frequency', 'status','draft','comment','circulate','start','end')->distinct()->where('statusDelete','1')->where('company',$companyid)->orderBy('id', 'DESC')->get();
		
       $audit_number = DB::select("SELECT DISTINCT `audit_frequency`,`audit_number`,`start`,`end` FROM `audit_program` WHERE `statusDelete` = '1' and `company` = '$companyid'  order by 'id' desc"); 
       $comment = DB::select("SELECT * FROM `comment` where`company_id` = '$companyid' order by 'id' desc");

		return view('topmanagement.Audit.auditprogram',compact('program','audit_number','comment'))->with('sno',$sno=1);
		
	}
  

  public function approvedprogram()
	{
		$user = Auth::user();
		$companyid=$user->company_id;
		//$audit = DB::select("SELECT DISTINCT `audit_frequency`, `company`, `status`, `draft` FROM `audit_program` where  `statusDelete` = '1' and`draft` IN ('') and `circulate`='0'  order by `id` desc");
		$audit=CauditProgram::select('audit_frequency', 'status','draft','company')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('draft','')->where('circulate','0')->get();

		$audit_number=CauditProgram::select('audit_frequency', 'audit_number')->where('company',$companyid)->where('statusDelete','1')->where('draft','')->where('circulate','0')->get();
		  
            $comment = DB::select("SELECT * FROM `comment` where`company_id` = '$companyid' order by 'id' desc");

		return view('topmanagement.Audit.auditprogram',compact('audit','audit_number','comment'))->with('sno',$sno=1);
		
	}

public function audit_view($companyid,$frequency){
	if($frequency=='annual'){

	$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$scope1=CScope::where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('company',$companyid)->orderBy('id','desc')->get();
	   
		return view('topmanagement.Audit.auditview',compact('auditprogram','scope1','standard1'))->with('sno',$sno=0);
	}
	elseif ($frequency=='halfyearly'){
				$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$count1=($count->count())/2;
				$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->limit($count1)->get();
				$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();

$scope1=CScope::where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('company',$companyid)->orderBy('id','desc')->get();
	   
		return view('topmanagement.Audit.auditview',compact('auditprogram','auditprogram1','auditprogram2','scope1','standard1'))->with('sno',$sno=0);	}
elseif ($frequency=='quaterly'){
				
				$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				
				$count1=($count->count())/4;
				$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->limit($count1)->get();
				
				$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();
				$auditprogram3=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1*2)->limit($count1)->get();
				$auditprogram4=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1*3)->limit($count1)->get();
			$scope1=CScope::where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('company',$companyid)->orderBy('id','desc')->get();
	   
		return view('topmanagement.Audit.auditview',compact('auditprogram','auditprogram1','auditprogram2','auditprogram3','auditprogram4','scope1','standard1'))->with('sno',$sno=0);	
	}
				

		}

public function approvedaudit_view($companyid,$frequency){
		if($frequency=='annual'){

	$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();	$scope1=CScope::where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('company',$companyid)->orderBy('id','desc')->get();
	   
		return view('topmanagement.Audit.approvedauditview',compact('auditprogram','scope1','standard1'))->with('sno',$sno=0);
				
	}
	elseif ($frequency=='halfyearly'){
				$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$count1=($count->count())/2;
				$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->limit($count1)->get();
				$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();
	$scope1=CScope::where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('company',$companyid)->orderBy('id','desc')->get();
	   
		return view('topmanagement.Audit.approvedauditview',compact('auditprogram','auditprogram1','auditprogram2','scope1','standard1'))->with('sno',$sno=0);
	}
elseif ($frequency=='quaterly'){
				
				$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				
				$count1=($count->count())/4;
				$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->limit($count1)->get();
				
				$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();
				$auditprogram3=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1*2)->limit($count1)->get();
				$auditprogram4=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1*3)->limit($count1)->get();
					$scope1=CScope::where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('company',$companyid)->orderBy('id','desc')->get();
	   
		return view('topmanagement.Audit.approvedauditview',compact('auditprogram','auditprogram1','auditprogram2','auditprogram3','auditprogram4','scope1','standard1'))->with('sno',$sno=0);
	}
			

		}
 public function auditupdate(Request $request)
	{
		$user = Auth::user();
		$companyid=$user->company_id;
$scope=$request->scope;
//dd($scope);
$scopearr=implode(",",$scope);

$standard=$request->standard;
$standardarr=implode(",",$standard);
$status=$request->status;
$draft=$request->draft;

$monthstart=$request->monthstart;
$monthend=$request->monthend;
$id=$request->id;
	$count = count($id);
		
		//dd($request);
	
	for ($i=0; $i < $count; $i++) { 

$program=CauditProgram::where('statusDelete','1')->find($id[$i]);
		$program->plan=$request->styled_radio[$i];
		$program->department=$request->audit_dept[$i];
		$program->scope=$scopearr;
		$program->standard=$standardarr;
		$program->updated_at=now();		
		$program->status=$status;
		$program->draft='';
		$program->remarks='';
		$program->save();


	}
			if ($program == true) {

	 $useremail=User::select('email')->where('id',$companyid)->get()->toArray(); //dd($useremail);
	
				 $data = array(
            'name'      =>  $user->name,
            'message'   =>  "Corrected and Approved by Top Management. “Audit Program $status $draft for the year /period $monthstart to $monthend “ "
        );
     Mail::to($useremail)->send(new SendMail($data));

	//Log::channel('mailcustom')->info("Send mail to MR: “Corrected and Approved by Top Mgt. “Audit Program $status $draft for the year /period $monthstart to $monthend ”  ");
					
			 Session::flash('success', 'Updated Successfully');
		return redirect()->route('viewauditprogram');
					
						
			}else{
			   
			 Session::flash('success', 'Updated Successfully');
		return redirect()->route('viewauditprogram');
			}
		
	}
	public function approve(Request $request){
			$companyid=$request->companyid;
			$monthstart=$request->monthstart;
			$monthend=$request->monthend;
			$status=$request->status1;
			
			$draft=$request->draft;
$user = Auth::user();

			$data=CauditProgram::where('statusDelete','1')->where('audit_frequency',$request->frequency)->where('company',$request->companyid)->update([
									'comment' => null,'status'=>$status,'draft'=>'','remarks'=>''
										]);

						if ($data == true) {
							$useremail=User::select('email')->where('id',$companyid)->get()->toArray(); //dd($useremail);
	
				 $data = array(
            'name'      =>  $user->name,
            'message'   =>  "“Approved by Top Mgt. “Audit Program $status $draft for the year /period $monthstart to $monthend ”  "
        );
     Mail::to($useremail)->send(new SendMail($data));
						//Log::channel('mailcustom')->info("Send mail to MR: “Approved by Top Mgt. “Audit Program $status $draft for the year /period $monthstart to $monthend ”  ");

							 Session::flash('success', 'Approve Successfully');
							return redirect()->route('viewauditprogram');
							
						}else{
							 Session::flash('error', 'Error');
							return redirect()->route('viewauditprogram');
						}


			}


public function comment(Request $request){
$companyid=$request->companyid;
$audit_number=$request->audit_number;
$audit_frequency=$request->frequency;
$status = $request->status;
$draft = $request->draft;
$monthstart = $request->monthstart;
$monthend = $request->monthend;
$draft++;
$user = Auth::user();
$data=CauditProgram::where('statusDelete','1')->where('audit_frequency',$request->frequency)->where('company',$request->companyid)->update([
'comment' => $request->comment,'draft'=>$draft
]);

$comment=new comment;

$comment->company_id = $request->companyid;
$comment->comment = $request->comment;
$comment->audit_number = $request->audit_number;
$comment->audit_frequency = $request->frequency;
$comment->created_at = now();
$comment->save();

//Log::channel('mailcustom')->info("Send mail to MR: “Comment received from Top Mgt. for “Audit Program  $monthstart to $monthend ”  ");
$useremail=User::select('email')->where('id',$companyid)->get()->toArray(); //dd($useremail);

$data = array(
'name'      =>  $user->name,
'message'   =>  " “Comment received from Top Mgt. for “Audit Program  $monthstart to $monthend Audit Program $status $draft. Comment: $request->comment ”   "
);
Mail::to($useremail)->send(new SendMail($data));
Session::flash('success', 'Commented Successfully');
return redirect()->route('viewauditprogram');

}



public function topcirculateprogram(Request $request)
	{
	
		$user = Auth::user();
		$companyid=$user->company_id;
		$program=CauditProgram::select('audit_frequency', 'status','draft','comment','company')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('draft','')->where('circulate','1')->get();
		 
		$audit_number=CauditProgram::select('audit_frequency', 'audit_number')->where('company',$companyid)->where('statusDelete','1')->where('draft','')->where('circulate','1')->get();
		  
            $comment = DB::select("SELECT * FROM `comment` where`company_id` = '$companyid' order by 'id' desc");

		return view('topmanagement.Audit.topcirculateprogram',compact('program','audit_number','comment'))->with('sno',$sno=1);
		
		
	}


 public function topcirculateview($companyid,$frequency)
	{
	if($frequency=='annual'){

	$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$scope1=CScope::where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('company',$companyid)->orderBy('id','desc')->get();
		return view('topmanagement.Audit.topcirculateview',compact('auditprogram','scope1','standard1'))->with('sno',$sno=0);
	}
	elseif ($frequency=='halfyearly'){
				$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$count1=($count->count())/2;
				$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->limit($count1)->get();
				$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();
$scope1=CScope::where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('company',$companyid)->orderBy('id','desc')->get();
		return view('topmanagement.Audit.topcirculateview',compact('auditprogram','auditprogram1','auditprogram2','scope1','standard1'))->with('sno',$sno=0);
	}
elseif ($frequency=='quaterly'){
				
				$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				
				$count1=($count->count())/4;
				$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->limit($count1)->get();
				
				$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();
				$auditprogram3=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1*2)->limit($count1)->get();
				$auditprogram4=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1*3)->limit($count1)->get();
				$scope1=CScope::where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('company',$companyid)->orderBy('id','desc')->get();
		return view('topmanagement.Audit.topcirculateview',compact('auditprogram','auditprogram1','auditprogram2','auditprogram3','auditprogram4','scope1','standard1'))->with('sno',$sno=0);
	}
				

		
	}
//Audit_paln


				public function top_auditplan()
					{
						
$user = Auth::user();
		$companyid=$user->company_id;
		
				//$plan = DB::select("SELECT DISTINCT `audit_number`,`status`,`company` FROM `audit_plan` where `statusDelete` = '1' and  circulate IN ('0')  order by `id` desc");
				$plan=Cauditplan::select('audit_number', 'status','company','circulate')->distinct()->where('company',$companyid)->where('statusDelete','1')->get();
				return view('topmanagement.top_auditplan',compact('plan'))->with('sno',$sno=1);

					}

		public function top_planview($companyid,$audit_number){

		$planview=Cauditplan::where('statusDelete','1')->where('company',$companyid)->where('audit_number',$audit_number)->get();
		 $planscope=Cauditplan::select('scope', 'standard')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();
		  $number=Cauditplan::select('audit_number')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();

		$department=CDepartment::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
		$auditor=User::where('statusDelete','1')->where('company_id',$companyid)->where('auditor','Y')->orderBy('id','desc')->get();
		$auditee=User::where('statusDelete','1')->where('company_id',$companyid)->where('auditee','Y')->orderBy('id','desc')->get();
		$program=CauditProgram::select('audit_frequency','audit_number','company','standard','scope','status')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();

		return view('topmanagement.top_planview',compact('planview','planscope','number','department','auditor','auditee','program'))->with('sno',$sno=0)->with('sn',$sn=0)->with('sn1',$sn1=0);

		}
	
		 public function top_circulateplan_view()
					{
						

				$plan=Cauditplan::select('audit_number','status','company')->distinct()->where('circulate','1')->where('statusDelete','1')->get();


				return view('topmanagement.top_circulateplan_view',compact('plan'))->with('sno',$sno=1);

					}
		public function top_circulateauditplanview($companyid,$audit_number){

		$planview=Cauditplan::where('statusDelete','1')->where('company',$companyid)->where('audit_number',$audit_number)->get();
		 $planscope=Cauditplan::select('scope', 'standard')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();

		 $number=Cauditplan::select('audit_number')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();

		$department=CDepartment::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
		$auditor=User::where('statusDelete','1')->where('company_id',$companyid)->where('auditor','Y')->orderBy('id','desc')->get();
		$auditee=User::where('statusDelete','1')->where('company_id',$companyid)->where('auditee','Y')->orderBy('id','desc')->get();
		$program=CauditProgram::select('audit_frequency','company','audit_number','standard','scope','status')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();

		return view('topmanagement.top_circulateauditplanview',compact('planview','planscope','number','department','auditor','auditee','program'))->with('sno',$sno=0)->with('sn',$sn=0)->with('sn1',$sn1=0);

		}
 }
