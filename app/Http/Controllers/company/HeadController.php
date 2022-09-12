<?php
namespace App\Http\Controllers\company;
use App\Http\Controllers\Controller;
use App\CauditProgram;
use App\User;
use App\CDepartment;
use App\CScope;
use App\CStandard;
use App\Cauditplan;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class HeadController extends Controller
{
public function index()
{
$user = Auth::user();
$companyid=$user->company_id;
$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
return view('company.dashboard',compact('scope1','standard1'));
}
public function headaudit(Request $request)
{
$user = Auth::user();
$companyid=$user->company_id;
 $program=CauditProgram::select('audit_frequency', 'status')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('circulate','1')->get();
return view('Head.auditprogram',compact('program'))->with('sno',$sno=1);
}
public function headview($companyid,$frequency){
		if($frequency=='annual'){
			$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
		}
		elseif ($frequency=='halfyearly'){
			$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
			$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
			$count1=($count->count())/2;
			$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->limit($count1)->get();
			$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();
		}
		elseif ($frequency=='quaterly'){
			$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
			$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
			$count1=($count->count())/4;
			$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->limit($count1)->get();
			$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();
			$auditprogram3=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1*2)->limit($count1)->get();
			$auditprogram4=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1*3)->limit($count1)->get();
		}
		$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
		$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
		return view('Head.view',compact('auditprogram','auditprogram1','auditprogram2','auditprogram3','auditprogram4','scope1','standard1'))->with('sno',$sno=0);
}



public function circulateprogram(Request $request)
{
	$user = Auth::user();
	$companyid=$user->company_id;
	
 	$program=CauditProgram::select('audit_frequency', 'status','comment')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('circulate','1')->get();
	return view('Head.circulateprogram',compact('program'))->with('sno',$sno=1);
}
public function headapprovedcirculateview($companyid,$frequency)
{
if($frequency=='annual'){
	$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
}
elseif ($frequency=='halfyearly'){
$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
$count1=($count->count())/2;
$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->limit($count1)->get();
$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();

}
elseif ($frequency=='quaterly'){

$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();

$count1=($count->count())/4;
$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->limit($count1)->get();

$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();
$auditprogram3=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1*2)->limit($count1)->get();
$auditprogram4=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1*3)->limit($count1)->get();

}
$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
return view('Head.approvedcirculateview',compact('auditprogram','auditprogram1','auditprogram2','auditprogram3','auditprogram4','scope1','standard1'))->with('sno',$sno=0);
}


public function headapprovedcirculateprogram(Request $request)
{
$user = Auth::user();
$companyid=$user->company_id;
 $program=CauditProgram::select('audit_frequency', 'status','comment')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('draft','')->get();
return view('Head.approvedcirculateprogram',compact('program'))->with('sno',$sno=1);


}
//audit_plan
public function head_auditplan()
{
$user = Auth::user();
$companyid=$user->company_id;
$plan=Cauditplan::select('audit_number', 'status')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('circulate','0')->get();

return view('Head.auditplan',compact('plan'))->with('sno',$sno=1);
}
public function head_planview($companyid,$audit_number){
		$planview=Cauditplan::where('statusDelete','1')->where('company',$companyid)->where('audit_number',$audit_number)->get();
		 $planscope=Cauditplan::select('scope', 'standard')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();
		  $number=Cauditplan::select('audit_number')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();

		$department=CDepartment::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
		$auditor=User::where('statusDelete','1')->where('company_id',$companyid)->where('auditor','Y')->orderBy('id','desc')->get();
		$auditee=User::where('statusDelete','1')->where('company_id',$companyid)->where('auditee','Y')->orderBy('id','desc')->get();
		$program=CauditProgram::select('audit_frequency','audit_number','company','standard','scope','status')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();

return view('Head.planview',compact('planview','planscope','number','department','auditor','auditee','program'))->with('sno',$sno=0)->with('sn',$sn=0)->with('sn1',$sn1=0);

}

public function head_circulateplan_view()
{


$user = Auth::user();
$companyid=$user->company_id;
 $plan=Cauditplan::select('audit_number', 'status')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('circulate','1')->get();
		
return view('Head.circulateplan_view',compact('plan'))->with('sno',$sno=1);

}
public function head_circulateauditplanview($companyid,$audit_number){


	$planview=Cauditplan::where('statusDelete','1')->where('company',$companyid)->where('audit_number',$audit_number)->get();
		 $planscope=Cauditplan::select('scope', 'standard')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();
		  $number=Cauditplan::select('audit_number')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();

		$department=CDepartment::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
		$auditor=User::where('statusDelete','1')->where('company_id',$companyid)->where('auditor','Y')->orderBy('id','desc')->get();
		$auditee=User::where('statusDelete','1')->where('company_id',$companyid)->where('auditee','Y')->orderBy('id','desc')->get();
		$program=CauditProgram::select('audit_frequency','audit_number','company','standard','scope','status')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();

return view('Head.circulateauditplanview',compact('planview','planscope','number','department','auditor','auditee','program'))->with('sno',$sno=0)->with('sn',$sn=0)->with('sn1',$sn1=0);
}
public function destroy($id)
{
}
}
