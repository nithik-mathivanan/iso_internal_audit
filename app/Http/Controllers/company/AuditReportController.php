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
use DB;use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
class AuditReportController extends Controller
{
	public function audit_report_select()
	{
		$user = Auth::user();
        $now=date('Y-m-d');
		$companyid=$user->company_id;
		$user1= User::where('statusDelete','1')->get();
		$departmentview=CDepartment::where('company',$companyid)->get();
    $program=Cauditplan::where('plan_date','<=', $now)->where('company',$companyid)->whereNotIn('id', function($query) { $query->select('AuditPlanNo')->from('auditreport'); })->get();
		return view('company.AuditReport.audit_report_select',compact('program','user1','departmentview'))->with('sno',$sno=1);
	}
	public function view()
	{
		$user = Auth::user();
		$companyid=$user->company_id;
		$id=$user->id;		
        $report=Cauditreport::where('company_id',$companyid)->where('auditor',$id)->get();

		return view('company.AuditReport.view',compact('report'))->with('sno',$sno=1);
	}
	public function ncdata(Request $request){
        $uservalue = Auth::user();
        $company_id=$uservalue->company_id;
        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $id=$uservalue->id;
        $report = Cauditreport::select('AuditPlanNo','company_id','plan_date','status')->distinct()->where('company_id',$company_id)->where('auditor',$id)->offset($start)->limit($limit);
        
        $totalrecords= Cauditreport::select('AuditPlanNo','company_id','plan_date')->distinct()->where('company_id',$company_id)->where('auditor',$id)->count();
      
        
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
                <a href="'.route('ncview',['AuditPlanNo'=>$report->AuditPlanNo]).'"  class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
            })
        ->addColumn('OBS', function ($report){         
                $AuditPlanNo=CObservation::select('AuditPlanNo','company_id')->where('AuditPlanNo',$report->AuditPlanNo)->distinct()->count();
               return $AuditPlanNo.' <a href="'.route('OBSview',['AuditPlanNo'=>$report->AuditPlanNo]).'"  class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
            })
        ->addColumn('IMP', function ($report){         
                $AuditPlanNo=CImprovement::select('AuditPlanNo','company_id')->where('AuditPlanNo',$report->AuditPlanNo)->distinct()->count();
               return $AuditPlanNo.' <a href="'.route('IMPview',['AuditPlanNo'=>$report->AuditPlanNo]).'"  class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
            })
        ->editColumn('status', function ($report) {
        	
                    if($report->status=="1")
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
	public function audit_report_complete($companyid,$audit_number,$department,$AuditPlanNo)
	{
		$user = Auth::user();
		$companyid=$user->company_id;
		$plan = Cauditplan::where('department',$department)->where('audit_number',$audit_number)->where('company',$companyid)->where('id',$AuditPlanNo)->get();
		$department=CDepartment::where('company',$companyid)->get();
		$user1= User::where('statusDelete','1')->get();
		
		return view('company.AuditReport.audit_report_complete',compact('plan','user','department','user1'))->with('sno',$sno=0)->with('sn',$sn=0)->with('sn1',$sn1=0);
	}

	 public function add(Request $request)
    {    
//dd($request->file);

if (isset($_FILES['image']['tmp_name'])){
  //create a handler for curl function 
$curl = curl_init(); //initialzie cURL session

//The CURLFile class 
$cfile = new CURLFile($_FILES['image']['tmp_name'], $_FILES['image']['type'], $_FILES['image']['name']);

//use array to post data to different server or within localhost 
$data = array ("file"=>$cfile,"template"=>'test.xlsx');

//this url can be directed to any server location
//for the sake of this demo, we are using localhost directory to upload images in the upload folder

//Sets an option on the given cURL session handle
curl_setopt($curl, CURLOPT_URL, "http://13.233.245.102:5000/api/compare"); 
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data); 
  //assign  execute curl to a response varible
  $result = curl_exec($curl);
  //check if the response varible is true 
  if($result == true){
  
    echo "Your image has been uploaded successfully";
  }

else {
  // curl error returns a string comprising of error for the current session
  echo "Error!" . curl_error($curl);
}
}exit;
/*$res=Http::post('http://13.233.245.102:5000/api/compare',[
'multipart' => 
[

'name'     => 'file',
'filename' => $request->file

]
]);*/
/*try{
		$client = new \GuzzleHttp\Client();
			$res = $client->request('POST','http://13.233.245.102:5000/api/compare',[
				'multipart' => [
   				[
   					'name'     => 'FileContents',
   					'contents' => "https://economictimes.indiatimes.com/thumb/msid-68721417,width-1200,height-900,resizemode-4,imgsize-1016106/nature1_gettyimages.jpg?from=mdr"
   			  ],[
   					'name'     => 'template',
   					'contents' => "test.xlsx"
   			  ]
   			],
			]);
			dd($res);
	}catch(Exception $e){
		dd($e);
	}*/

$file               = request('file');
$file_path          = $file->getPathname();
$file_mime          = $file->getMimeType('image');
$file_uploaded_name = $file->getClientOriginalName();
$uploadFileUrl = 'http://13.233.245.102:5000/api/compare';


$filepath="C:/Users/elcot/Downloads/server/test.xlsx";

if (function_exists('curl_file_create')) { 
  $cFile = curl_file_create($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name']);
} else { // 
  $cFile = '@' . realpath($filepath);
}

 	$headers = array("Content-Type:multipart/form-data;"); 
  $postfields = array("file" =>$cFile,"template" => 'test.xlsx');
  //dd($postfields);
  $ch = curl_init();
  $options = array(
      CURLOPT_URL => $uploadFileUrl,
      CURLOPT_HEADER => true,
      CURLOPT_POST => 1,
      CURLOPT_HTTPHEADER => $headers,
      CURLOPT_POSTFIELDS => $postfields,
       CURLOPT_INFILESIZE => "455454",
      CURLOPT_RETURNTRANSFER => true
  ); // cURL options
  curl_setopt_array($ch, $options);
  $res=curl_exec($ch);
  if(!curl_errno($ch))
  {

      $info = curl_getinfo($ch);
      if ($info['http_code'] == 200)
          $errmsg = "File uploaded successfully";
  }
  else
  {
      $errmsg = curl_error($ch);
  }
  curl_close($ch);

dd( $res );


/** Start Guzzle Client */
$client = new \GuzzleHttp\Client();

try {
    /** Guzzle CURL POST request */
    $response = $client->request("POST", $uploadFileUrl, [
        'multipart' => [
            [
                'name' => 'template',               
                'contents' => 'test.xlsx'
                
            ],
            [
                
                'name'      => 'file',
                'filename' => $file_uploaded_name,
                'contents' => fopen($file_path, 'r'),
            ],
           
        ],
    ]);
}catch (Exception $e) {
	dd($e);
}



/** Check the response status code */
$code   = $response->getStatusCode();

/** Get the response body return by API */
$response   = $response->getBody();

/** 2nd parameter is true because I want in array format */
$responseData = json_decode($response, true);

/** Most of the time it will be JSON data so better decode the JSON to Array as follows  */
echo '<pre>';
print_r($responseData);
echo '</pre>';
exit;











		$clientdatas = json_decode($res, true);
    	dd($clientdatas);
    	//dd($request->all());
    		$auditeearr = implode(',', $request->auditee);
    	
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
		$auditeearr = implode(', ', $request->auditee);
		
		$auditreport = new CAuditReport;
		$user = Auth::user();
		$auditreport->company_id=$user->company_id;
		$auditreport->AuditPlanNo=$request->AuditPlanNo;
        $auditreport->auditor=$request->auditor;
        $auditreport->auditee=$auditeearr;
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
		{ 
	$j=$i+1;
		$CNO=$request->NCRNO.'-CR-'.$j;
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
    $nonconformance->status='0';	
    $nonconformance->save();
		$useremail=User::select('email')->where('id',$request->auditee)->get()->toArray();
		$auditor=User::select('name')->where('id',$request->auditor)->get(); //dd($useremail);
	
				 $data = array(
            'name'      =>  $auditor,
            'message'   =>  " “waiting for auditee correction & corrective action” against  NCR no.$NCRNO raised by auditor“ "
        ); Mail::to($useremail)->send(new SendMail($data));
		 
		}
		}
		if($request->observation[0]==''){ }else{
		$count2 = count($request->observation);

		for ($i=0; $i < $count2; $i++)
		{ 
	$j=$i+1;
		$OBSNO=$request->NCRNO.'-OBR-'.$j;
		$observation = new CObservation;
		$user = Auth::user();
		$observation->company_id=$user->company_id;
		$observation->AuditPlanNo=$request->AuditPlanNo;
		$observation->auditor=$request->auditor;
		$observation->observation=$request->observation[$i];
		$observation->OBSNO=$OBSNO;
       
        $observation->status='0';	
        $observation->save();
		}
		}
		if($request->improvement[0]==''){ }else{
		$count3 = count($request->improvement);
		for ($i=0; $i < $count3; $i++)
		{ 
	$j=$i+1;
		$IMPNO=$request->NCRNO.'-IMPR-'.$j;
	
		$improvement = new CImprovement;
		$user = Auth::user();
		$improvement->company_id=$user->company_id;
		$improvement->AuditPlanNo=$request->AuditPlanNo;
		$improvement->auditor=$request->auditor;
		$improvement->improvement=$request->improvement[$i];
		$improvement->IMPNO=$IMPNO;
       
        $improvement->status='0';	
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
