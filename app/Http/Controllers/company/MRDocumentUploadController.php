<?php

namespace App\Http\Controllers\company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CDocument;
use App\CDepartment;
use App\CDocumentUpload;
use App\CDocumentHistory;
use App\CDocumentComment;
use App\Access;
use App\User;
use DB;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
class MRDocumentUploadController extends Controller
{

    public function index()
    {
		$user = Auth::user();
		$companyid=$user->company_id;
		$document=CDocument::where('company',$companyid)->where('status',['1','0'])->orderBy('id','desc')->get();
		$department=CDepartment::where('company',$companyid)->where('status',['1','0'])->orderBy('id','desc')->get();
        
        return view('company.DocumentUpload.create',compact('document','department'))->with('sno',$sno=1);
		
    }


	
	public function store(Request $request)
		{
		
		
		$user = Auth::user();
		$company_id=$user->company_id;
		$id=$request->id;
		$user_id = $request->user_id;
		$department = $request->department;
		$document_type = $request->type;
		$status=$request->status;
		$status++;
		$department1=CDepartment::where('id',$department)->select('shortname')->where('status','1')->first();
		$shortname=$department1->shortname;
		
		$document1=CDocument::where('id',$document_type)->select('shortname')->where('status','1')->first();
		$shortname1=$document1->shortname;
		
		$document = $request->document;
		
		$filename1 = 'PORT-'.$shortname.'-'.$shortname1.'-'.$id.'-'.$status.'.'.$document->getClientOriginalExtension();
		
		$document->move(public_path().'/document',$filename1);

		$data=CDocumentUpload::find($id);
		$data->document=$filename1;
		$data->document_status=$status;;
		$data->status='1';
		$data->save();
		
		$CDocumentHistory = new CDocumentHistory;
		$CDocumentHistory->document_id=$request->id;
		$CDocumentHistory->company_id=$company_id;
		$CDocumentHistory->document=$filename1;
		$CDocumentHistory->user_id=$request->user_id;
		$CDocumentHistory->status='1';
		$CDocumentHistory->save();
		
	Session::flash('success', 'Stored Successfully');
	return back()->with('success','Stored successfully....');

	 
	}
	


	 public function view()
	{
		$user = Auth::user();
		$user_id=$user->id;
		$companyid=$user->company_id;
		$user=User::where('company_id',$companyid)->orderBy('id','desc')->get();
		
		$document=CDocument::where('company',$companyid)->where('status',['1','0'])->orderBy('id','desc')->get();
		$department=CDepartment::where('company',$companyid)->where('status',['1','0'])->orderBy('id','desc')->get();
		
		$documentupload=CDocumentUpload::orderBy('id','desc')->get();
		
		return view('company.DocumentUpload.mrview',compact('document','documentupload','department','user'))->with('sno',$sno=1);

	}
	


	 public function approvedview()
	{
		$user = Auth::user();
		$user_id=$user->id;
		$companyid=$user->company_id;
		$user=User::where('company_id',$companyid)->orderBy('id','desc')->get();
		
		$document=CDocument::where('company',$companyid)->where('status',['1','0'])->orderBy('id','desc')->get();
		$department=CDepartment::where('company',$companyid)->where('status',['1','0'])->orderBy('id','desc')->get();
	
		$documentupload=CDocumentUpload::where('company_id',$companyid)->orderBy('id','desc')->get();
		//dd($documentupload);
		return view('company.DocumentUpload.mrapprovedview',compact('document','documentupload','department','user'))->with('sno',$sno=1);

	}

	public function documentaccept($id){
	// Send email
		$department = CDocumentUpload::where('id',$id)->first();
		$getaccess = Access::where('dept',$department->department)->first();
		$designation = User::where('designation',$getaccess->reviewer)->first();
		
         $details = [
                'title' => 'Document Review Remainder -ISO Audit',
                'body' => 'Hii '.$designation->name.' Your document Review is  pending!! Please review it for further process.',
            ];
    		\Log::info($details['title'].'<br>'.$details['body']);  
		
   $data=CDocumentUpload::find($id);
   $data->status=2;
   $data->save();
   //Session::flash('error', 'Document Deleted Successfully');
	return back()->with('Success','Document Accepted successfully....');
   }
   
    public function documenthistory($id)
	{
		
		$documenthistory=CDocumentHistory::where('document_id',$id)->get();
		return view('company.DocumentUpload.documenthistory',compact('documenthistory'))->with('sno',$sno=1);
	}


	public function documentcomment($id)
   {   	
   		$user = Auth::user();
		$user_id=$user->id;
		$companyid=$user->company_id; 

		$documentupload=CDocumentUpload::where('id',$id)->orderBy('id','desc')->get();
		$documentcomment=CDocumentComment::where('document_id',$id)->where('status','1')->orderBy('id','desc')->get();
			$user=User::where('company_id',$companyid)->orderBy('id','desc')->get();
		$document_name	= CDocumentUpload::where('id',$id)->orderBy('id','desc')->first()->document_name;
		return view('company.DocumentUpload.comment_create',compact('documentupload','documentcomment','user','document_name'))->with('sno',$sno=1);
   }
public function documentacceptmr($id)
   {   
   
	$documentupload=CDocumentUpload::where('id',$id)->first();
	
	//dd($documentupload->document);
	
   $data=CDocumentUpload::find($id);
   $data->status=6;
   $data->save();
   $client = new Client();
        $res = $client->request('POST', 'http://13.233.245.102:5000/api/convertpdf', [
		 'multipart' => [
        [
            'name'     => 'file',
            'contents' => fopen('C:/xampp/htdocs/audit/public/document/'.$documentupload->document, 'r'),
        ]
        ]
		
          
        ]);
         $res->getStatusCode();
	
			// return $result;
			$data = json_decode($res->getBody());
			
		$File='http://13.233.245.102:5000/'.$data->File;
			
		$user = Auth::user();
		$company_id=$user->company_id;
		$data=CDocumentUpload::find($id);
		
		$data->document=$File;
		$data->document_status='R0';;
		$data->status='6';
		$data->save();
		
		$CDocumentHistory = new CDocumentHistory;
		$CDocumentHistory->document_id=$id;
		$CDocumentHistory->company_id=$company_id;
		$CDocumentHistory->document=$File;
		$CDocumentHistory->user_id=$user->id;
		$CDocumentHistory->status='1';
		$CDocumentHistory->save();
						 
   //Session::flash('error', 'Document Deleted Successfully');
	return back()->with('Success','Document Accepted successfully....');
	
   }
   
	public function comment_create(Request $request)
		{
		$user = Auth::user();
		$company_id=$user->company_id;
		$id=$request->id;
		$user_id = $request->user_id;
		$data=CDocumentUpload::find($id);
		$data->comment=$request->comment;
		$data->save();
		
		$CDocumentComment = new CDocumentComment;
		$CDocumentComment->document_id=$id;
		$CDocumentComment->company_id=$company_id;
		$CDocumentComment->comment=$request->comment;
		$CDocumentComment->user_id=$request->user_id;
		$CDocumentComment->status='1';
		$CDocumentComment->save();
		
		Session::flash('success', 'Comment added Successfully');
				
		return back()->with('success','Stored successfully....');

	 
	}

	

}
