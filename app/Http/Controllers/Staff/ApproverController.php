<?php

namespace App\Http\Controllers\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CDocument;
use App\CDepartment;
use App\CDocumentUpload;
use App\CDesignation;
use App\CDocumentHistory;
use App\Access;
use App\User;
use DB;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ApproverController extends Controller
{

public function approver_document(){
     $user = Auth::user();
		$user_id=$user->id;
		$companyid=$user->company_id;
		$designation=$user->designation;
		$document=CDocument::where('company',$companyid)->where('status','1')->orderBy('id','desc')->get();
		
		$designation=Access::where('company',$companyid)->where('approver',$designation)->orderBy('id','desc')->get(); 

		foreach($designation as $des){
		$preparator=$des->preparator;

		$department=CDepartment::where('company',$companyid)->where('status','1')->orderBy('id','desc')->get();

		$documentupload=CDocumentUpload::where('designation',$preparator)->orderBy('id','desc')->get();
		}
		// echo "<pre>";
		// print_r($documentuploads);
		// exit;
		return view('approver.approver-document',compact('document','documentupload','department'))->with('sno',$sno=1);    
}


	public function approved(Request $request,$id,$approve){		
		 // Send Email
	      $department = CDocumentUpload::where('id',$id)->first();
	      $getaccess = Access::where('dept',$department->department)->first();
	      $designation = User::where('designation',$getaccess->approver)->first();
	    
	         $details = [
	                'title' => 'Final Document Approval Remainder -ISO Audit',
	                'body' => 'Hii Admin Your Final document approval process is  pending!! Please approve it for further process.',
	            ];
	        \Log::info($details['title'].'<br>'.$details['body']); 
	    
		$documentupload=CDocumentUpload::where('id',$id)->first();
		$document=$documentupload->document;
		$doc=explode('.', $document);
		$type=$documentupload->document_type;

		$document1=CDocument::where('id',$type)->select('shortname')->where('status','1')->first();
		$shortname1=$document1->shortname;
		$user = Auth::user();
		$company_id=$user->company_id;
		$user_id = $user->id;
		$department = $user->department;

		$department1=CDepartment::where('id',$department)->select('shortname')->where('status','1')->first(); 
		$shortname=$department1->shortname;
		$filename1 = 'PORT-'.$shortname.'-'.$shortname1.'-'.$id.'-R0.'.$doc[1];
		
		// Storage::copy('D:/xampp/htdocs/laravel/iso-superadmin/iso/public/document/PORT-qlty-doc-10-R0-D4.pdf', 'D:/xampp/htdocs/laravel/iso-superadmin/iso/public/document/PORT-qlty-doc-10-R0.pdf');
		// //$document->move(public_path().'/document',$filename1);
		
		\File::copy(public_path().'/document/'.$documentupload->document, public_path().'/document/'.$filename1.'');
		
		$data=CDocumentUpload::find($id);
		$data->document=$filename1;
		$data->document_status='R0';
		$data->status=$approve;
		$data->save();
		
		$CDocumentHistory = new CDocumentHistory;
		$CDocumentHistory->document_id=$request->id;
		$CDocumentHistory->company_id=$company_id;
		$CDocumentHistory->document=$filename1;
		$CDocumentHistory->user_id=$user_id;
		$CDocumentHistory->status='1';
		$CDocumentHistory->save();
		
	Session::flash('success', 'Stored Successfully');
	return back()->with('success','Stored successfully....');

	 
	}

}
