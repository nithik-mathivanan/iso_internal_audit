<?php
namespace App\Http\Controllers\company;
use App\Http\Controllers\Controller;
use App\CauditProgram;
use App\User;
use App\CDepartment;
use App\CScope;
use App\CStandard;
use Session;
use Dompdf\Dompdf;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
class AuditController extends Controller
{
//MR Start
    public function index()
    {
		$user = Auth::user();
		$companyid=$user->company_id;

		$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
		$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
       
		return view('company.AuditProgram.auditfrequency',compact('scope1','standard1'));
		
    }


 public function add(Request $request)
    {
		$this->validate($request,[
    			'frequency'  => 'required',
    			'month' => 'required',
    			'scope' => 'required',
    			'standard' => 'required'
    	]);
		$user = Auth::user();

		$companyid=$user->company_id;
		$frequency=$request->frequency;
		$month=$request->month; 
		$month1 = date('M-Y', strtotime($month) );
		$month2 = date('M-Y', strtotime($month . "+1 months") );
		$month3 = date('M-Y', strtotime($month . "+2 months") );
		$month4 = date('M-Y', strtotime($month . "+3 months") );
		$month5 = date('M-Y', strtotime($month . "+4 months") );
		$month6 = date('M-Y', strtotime($month . "+5 months") );
		$month7 = date('M-Y', strtotime($month . "+6 months") );
		$month8 = date('M-Y', strtotime($month . "+7 months") );
		$month9 = date('M-Y', strtotime($month . "+8 months") );
		$month10 = date('M-Y', strtotime($month . "+9 months") );
		$month11 = date('M-Y', strtotime($month . "+10 months") );
		$month12 = date('M-Y', strtotime($month . "+11 months") );

		$montharray=array($month1,$month2,$month3,$month4,$month5,$month6,$month7,$month8,$month9,$month10,$month11,$month12);
		
		$audit_program=CauditProgram::where('company',$companyid)->get();
	
		 if(count($audit_program)==0){
		 	$department1 = DB::select("SELECT * FROM `mc_department` WHERE `company` = '$companyid' order by 'id'");
			       return view('company.AuditProgram.create',compact('department1'))->with('sno',$sno=0)->with('s',$s=1);

		 }
		 else{
			foreach ($audit_program as $audit_program1)
				{
				if($audit_program1->start== $month1 | $audit_program1->start== $month2| $audit_program1->start== $month3| $audit_program1->start== $month4| $audit_program1->start== $month5| $audit_program1->start== $month6| $audit_program1->start== $month7| $audit_program1->start== $month8| $audit_program1->start== $month9| $audit_program1->start== $month10| $audit_program1->start== $month11| $audit_program1->start== $month12 | $audit_program1->end== $month1 | $audit_program1->end== $month2 | $audit_program1->end== $month3| $audit_program1->end== $month4| $audit_program1->end== $month5| $audit_program1->end== $month6| $audit_program1->end== $month7| $audit_program1->end== $month8| $audit_program1->end== $month9| $audit_program1->end== $month10| $audit_program1->end== $month11| $audit_program1->end== $month12 )
				{
					
				Session::flash('error', 'Audit Program already added');
				return redirect()->route('auditstore');	
				}
				else{
					$department1 = DB::select("SELECT * FROM `mc_department` WHERE `company` = '$companyid' order by 'id'");
			       return view('company.AuditProgram.create',compact('department1'))->with('sno',$sno=0)->with('s',$s=1);
			   		}
}
		
		
    }
}

 public function program(Request $request)
    {
	$user = Auth::user();

		$companyid=$user->company_id;
		$program=CauditProgram::select('audit_frequency', 'status','draft','comment','circulate','start','end')->distinct()->where('statusDelete','1')->where('company',$companyid)->get();
		
       $audit_number = DB::select("SELECT DISTINCT `audit_frequency`,`audit_number`,`start`,`end` FROM `audit_program` WHERE `statusDelete` = '1' and `company` = '$companyid' "); 
       $comment = DB::select("SELECT * FROM `comment` where`company_id` = '$companyid' order by 'id' desc");

		return view('company.AuditProgram.auditprogram',compact('program','audit_number','comment'))->with('sno',$sno=1);
		
		
    }
 
 public function store(Request $request)
    {
	$this->validate($request,[
    			'styled_radio'  => 'required'
    	]);
	$user = Auth::user();
	$count = count($request->audit_dept);
		
		$companyid=$user->company_id;
for ($i=0; $i < $count; $i++) { 

$department = new CauditProgram;
        $department->company =  $user->company_id;
        $department->audit_frequency = $request->frequency;
        $department->standard =  $request->standardarr;
        $department->scope =  $request->scopearr;
        $department->start =  $request->monthstart;
        $department->end =  $request->monthend;
        $department->plan =  $request->styled_radio[$i];
        $department->actual =  '0';
        $department->audit_number =  $request->audit_num[$i];
        $department->remarks =  $request->remarks[$i];
        $department->status =  'Rev0';
        $department->statusDelete =  '1';
        $department->draft =  'Draft1';
        $department->circulate =  '0';
		$department->department = $request->audit_dept[$i];
      $department->save();
            }
		$monthstart=$request->monthstart;
		$monthend=$request->monthend; 
	//Log::channel('mailcustom')->info("Send mail to Top Management: “Audit Program Rev.0 Draft 1 for the year /period of $monthstart to $monthend received from MR for your review & approval“ from $user->name ");

		
	 $useremail=User::select('email')->where('company_id',$companyid)->where('role','5')->get()->toArray(); //dd($useremail);
	
				 $data = array(
            'name'      =>  $user->name,
            'message'   =>  "Audit Program Rev.0 Draft 1 for the year /period of $monthstart to $monthend received from MR for your review & approval“ "
        );
     Mail::to($useremail)->send(new SendMail($data));
		Session::flash('success', 'Audit Program Added Successfully');
       
		return redirect()->route('auditprogram');
		//return view('company/email')->with('monthstart',$request->monthstart)->with('monthend',$request->monthend);
	


		} 
 public function update(Request $request)
    {
    	
$scope=$request->scope;
$scopearr=implode(",",$scope);

$standard=$request->standard;
$standardarr=implode(",",$standard);

$id=$request->id;
	$count = count($id);
		
		//dd($request);
	
	for ($i=0; $i < $count; $i++) { 
$program=CauditProgram::find($id[$i]);
        $program->plan=$request->styled_radio[$i];
        $program->department=$request->audit_dept[$i];
        $program->scope=$scopearr;
        $program->standard=$standardarr;
        $program->save();
       
      

}
             Session::flash('success', 'Updated Successfully');
        return redirect()->route('auditprogram');
        
    }

	public function view($companyid,$frequency,$start,$end){
	if($frequency=='annual'){

	$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->get();
				$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
       
        return view('company.AuditProgram.view',compact('auditprogram','scope1','standard1'))->with('sno',$sno=0);
	}
	elseif ($frequency=='halfyearly'){
	
				$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->get();
				$count=CauditProgram::where('statusDelete','1')->where('audit_frequency',$frequency)->get();
				$count1=($count->count())/2;
				$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->limit($count1)->get();
				$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();
				$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
       
        return view('company.AuditProgram.view',compact('auditprogram','auditprogram1','auditprogram2','scope1','standard1'))->with('sno',$sno=0);
	}
elseif ($frequency=='quaterly'){
				
				$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->get();
				$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->get();
				
				$count1=($count->count())/4;
				$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->limit($count1)->get();
				
				$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->skip($count1)->limit($count1)->get();
				$auditprogram3=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->skip($count1*2)->limit($count1)->get();
				$auditprogram4=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->skip($count1*3)->limit($count1)->get();
				
	}
				$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
       
        return view('company.AuditProgram.view',compact('auditprogram','auditprogram1','auditprogram2','auditprogram3','auditprogram4','scope1','standard1'))->with('sno',$sno=0);

		}

	  
	public function auditprogrampdf($companyid,$frequency,$start,$end){ $dompdf = new Dompdf();
$dompdf->loadHtml(view('auditprogram'));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
	if($frequency=='annual'){

	$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->get();
				$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
       
        return view('company.AuditProgram.view',compact('auditprogram','scope1','standard1'))->with('sno',$sno=0);
	}
	elseif ($frequency=='halfyearly'){
	
				$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->get();
				$count=CauditProgram::where('statusDelete','1')->where('audit_frequency',$frequency)->get();
				$count1=($count->count())/2;
				$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->limit($count1)->get();
				$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();
$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
       
        return view('company.AuditProgram.view',compact('auditprogram','auditprogram1','auditprogram2','scope1','standard1'))->with('sno',$sno=0);
	}
elseif ($frequency=='quaterly'){
				
				$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->get();
				$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->get();
				
				$count1=($count->count())/4;
				$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->limit($count1)->get();
				
				$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->skip($count1)->limit($count1)->get();
				$auditprogram3=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->skip($count1*2)->limit($count1)->get();
				$auditprogram4=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->skip($count1*3)->limit($count1)->get();
				
	}
				$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
       
        return view('company.AuditProgram.view',compact('auditprogram','auditprogram1','auditprogram2','auditprogram3','auditprogram4','scope1','standard1'))->with('sno',$sno=0);

		}
  public function approvedprogram()
    {
		$user = Auth::user();
		//dd($user->company_id);
		$companyid=$user->company_id;
		$program = DB::select("SELECT DISTINCT `audit_frequency`,`status`,`draft` FROM `audit_program` where `statusDelete`='1' and `circulate` = '0' and  company= '$companyid'  and `draft`  IN ('')  order by `id` desc");
        $comment = DB::select("SELECT * FROM `comment` where`company_id` = '$companyid' order by 'id' desc");
       $audit_number = DB::select("SELECT `audit_frequency`,`audit_number` FROM `audit_program` WHERE `statusDelete` = '1' and `company` = '$companyid' and `draft` IN ('') and `circulate`=0 order by 'id' desc"); 
      

		return view('company.AuditProgram.approvedauditprogram',compact('program','comment','audit_number'))->with('sno',$sno=1);
		
    }
 

	public function approvedauditview ($companyid,$frequency){
if($frequency=='annual'){

	$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
					$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
			
        return view('company.AuditProgram.approvedauditview',compact('auditprogram','scope1','standard1'))->with('sno',$sno=0);
	}
	elseif ($frequency=='halfyearly'){
				$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$count1=($count->count())/2;
				$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->limit($count1)->get();
				$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();
	$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
			
        return view('company.AuditProgram.approvedauditview',compact('auditprogram','auditprogram1','auditprogram2','scope1','standard1'))->with('sno',$sno=0);
	}
elseif ($frequency=='quaterly'){
				
				$auditprogram=CauditProgram::where('statusDelete','1')->where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				
				$count1=($count->count())/4;
				$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->limit($count1)->get();
				
				$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();
				$auditprogram3=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1*2)->limit($count1)->get();
				$auditprogram4=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1*3)->limit($count1)->get();
					$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
			
        return view('company.AuditProgram.approvedauditview',compact('auditprogram','auditprogram1','auditprogram2','auditprogram3','auditprogram4','scope1','standard1'))->with('sno',$sno=0);
	}
			



		
			}
	  
    public function mrcirculateprogram(Request $request)
    {
	$user = Auth::user();
		$companyid=$user->company_id;
		$program = DB::select("SELECT DISTINCT `audit_frequency`, `status`,`draft`,`comment` FROM `audit_program` WHERE `company` = '$companyid' and `statusDelete`='1' and `circulate` = '1' order by 'id'");
       
       $audit_number = DB::select("SELECT `audit_frequency`,`audit_number` FROM `audit_program` WHERE `company` = '$companyid' and `statusDelete`='1' and `circulate` = '1' order by 'id'"); $comment = DB::select("SELECT * FROM `comment` where`company_id` = '$companyid' order by 'id' desc");

		return redirect()->route('auditprogram');
		
		
    }

 public function mrcirculateview($companyid,$frequency)
    { $standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
if($frequency=='annual'){

	$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
		$scope1=CScope::where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('company',$companyid)->orderBy('id','desc')->get();
		return view('company.AuditProgram.mrcirculateview',compact('auditprogram','scope1','standard1'))->with('sno',$sno=0);		
	}
	elseif ($frequency=='halfyearly'){
				$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->get();
				$count1=($count->count())/2;
				$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->limit($count1)->get();
				$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();
$scope1=CScope::where('company',$companyid)->orderBy('id','desc')->get();
				$standard1=CStandard::where('company',$companyid)->orderBy('id','desc')->get();
		return view('company.AuditProgram.mrcirculateview',compact('auditprogram','auditprogram1','auditprogram2','scope1','standard1'))->with('sno',$sno=0);
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
		return view('company.AuditProgram.mrcirculateview',compact('auditprogram','auditprogram1','auditprogram2','auditprogram3','auditprogram4','scope1','standard1'))->with('sno',$sno=0);
	}
				
 
		
    }


 public function approvedcirculateprogram()
    {
		$user = Auth::user();
		//dd($user->company_id);
		$companyid=$user->company_id;
		$program = DB::select("SELECT DISTINCT `audit_frequency`,`status` FROM `audit_program` where `status`='Rev1' and `statusDelete`='1' and company= '$companyid' order by `id` desc");
       
		return view('company.AuditProgram.approvedcirculateprogram',compact('program'))->with('sno',$sno=1);
		
    }
	
 
 public function approvedcirculateview($companyid,$frequency)
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
				$count=CauditProgram::where('company',$companyid)->where('audit_frequency',$frequency)->get();
				
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

public function auditcirculated(Request $request)
{
		$id=$request->id;
		$user = Auth::user();
		$companyid=$user->company_id;
		$monthstart=$request->monthstart;
		$monthend=$request->monthend;
		$status=$request->status1;
		$draft=$request->draft;
		$count1 = count($id);$created=now();
		for ($i=0; $i < $count1; $i++) 
			{  
		$program = CauditProgram::where('id',$id[$i])->update([
		'circulate' => '1','circulate_created'=>$created,'updated_at' => now()
		]);

		} 
		if ($program == true) {
		//Log::channel('mailcustom')->info("Send mail to Top Management: “Approved Audit Program $status $draft for the year /period of $monthstart to $monthend ”-circulated by MR ”   from $user->name ");
		$useremail=User::select('email')->where('company_id',$companyid)->where('role','5')->get()->toArray(); //dd($useremail);

		$data = array(
		'name'      =>  $user->name,
		'message'   =>  " “Approved Audit Program $status $draft for the year /period of $monthstart to $monthend ”-circulated by MR ”   from $user->name“ "
		);
		Mail::to($useremail)->send(new SendMail($data));
		$head=User::where('company_id',$companyid)->where('status','head')->get();

		// $count=count($head); 
		// for ($i=0; $i < $count; $i++) { 
		// 	$name=$head[$i]->name;
		// 	Log::channel('mailcustom')->info("Send mail to Department Head $name : “Approved Audit Program $status $draft for the year /period of $monthstart to $monthend ”-circulated by MR ”   from $user->name ");
		// }
		Session::flash('success', 'Circulated Successfully');
		return redirect()->route('mrcirculateprogram');
		}

		else{
		Session::flash('error', 'Circulated Error');
		return redirect()->route('mrcirculateprogram');
		}

}

 public function circulateupdate(Request $request)
    {
				$remarks=$request->remarks;
				//dd($scope);
				$id=$request->id;
					$count = count($id);
					$status=$request->status1;
				$status++;
				$draft='Draft1';	
		
	
			for ($i=0; $i < $count; $i++) { 

				$res = DB::table('audit_program')
							->where('id',$id[$i])					
							->update([
									'remarks' => $request->remarks[$i],'status'=>$status,'draft'=>$draft,'circulate'=>'0','updated_at' => now()
									]);
}
            if ($res == true) {
                		
        return redirect()->route('auditprogram');
						
            }else{
                return back()->with('error','Category name not updated....'); 
            }
        
    }


	public function destroy($companyid,$frequency){
		  $data=CauditProgram::where('company',$companyid)->where('audit_frequency',$frequency)->update(['statusDelete'=>'2']);
     
        Session::flash('error', 'Deleted Successfully');
        return redirect()->route('auditprogram');


			
		}
}
