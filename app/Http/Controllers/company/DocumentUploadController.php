<?php

namespace App\Http\Controllers\company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CDocument;
use App\CDepartment;
use App\CDesignation;
use App\CDocumentUpload;
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
class DocumentUploadController extends Controller
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
		$doc_id=CDocumentUpload::orderBy('id','desc')->first();
		$user = Auth::user();
		$company_id=$user->company_id;
		$department=$user->department;
		$designation1=$user->designation;
		
		if($doc_id==null){
		$doc_id=1;
		}
		else{
		$doc_id=$doc_id->id;			
		}
		$last_inserted_id=$doc_id+1;
		$user_id = $request->user_id;
		//$department = $request->department;
		$document_type = $request->type;
		$document_name = $request->document_name;
		
		$department1=CDepartment::where('id',$department)->select('shortname')->where('status','1')->first();
		$shortname=$department1->shortname;
		
		$document1=CDocument::where('id',$document_type)->select('shortname')->where('status','1')->first();
		$shortname1=$document1->shortname;
		
		$document = $request->document;
		
		$designation=CDesignation::where('department',$department)->select('id')->where('status','1')->first(); 
		$filename1 = 'PORT-'.$shortname.'-'.$shortname1.'-'.$last_inserted_id.'-R0-D1.'.$document->getClientOriginalExtension();
		//dd($filename1);
		$document->move(public_path().'/document',$filename1);
		$CDocumentUpload = new CDocumentUpload;
		$CDocumentUpload->user_id=$request->user_id;
		$CDocumentUpload->company_id=$company_id;
		$CDocumentUpload->designation=$designation1;
		$CDocumentUpload->document_type=$request->type;
		$CDocumentUpload->document_name=$request->document_name;
		$CDocumentUpload->document=$filename1;
		$CDocumentUpload->document_status='R0-D1';
		$CDocumentUpload->status='1';
		$CDocumentUpload->save();
		
		$last_id=$CDocumentUpload->id;	
		
		$CDocumentHistory = new CDocumentHistory;
		$CDocumentHistory->document_id=$last_id;
		$CDocumentHistory->company_id=$company_id;
		$CDocumentHistory->document=$filename1;
		$CDocumentHistory->user_id=$request->user_id;
		$CDocumentHistory->status=$request->status;
		$CDocumentHistory->save();
		
	Session::flash('success', 'Stored Successfully');
	return back()->with('success','Stored successfully....');

	 
	}
	
	 public function view()
	{
		$user = Auth::user();
		$user_id=$user->id;
		$companyid=$user->company_id;
		$document=CDocument::where('company',$companyid)->where('status','1')->orderBy('id','desc')->get();
		$department=CDesignation::where('company',$companyid)->where('status','1')->orderBy('id','desc')->get();
		
		$documentupload=CDocumentUpload::where('user_id',$user_id)->orderBy('id','desc')->get();
		
		return view('company.DocumentUpload.view',compact('document','documentupload','department'))->with('sno',$sno=1);

	}
	
	public function documentdestroy($id)
   {   
   $data=CDocumentUpload::find($id);
   $data->status=0;
   $data->save();
   //Session::flash('error', 'Document Deleted Successfully');
	return back()->with('error','Deleted successfully....');
   }
	
    public function documenthistory($id)
	{
		$documenthistory=CDocumentHistory::where('document_id',$id)->get();
		return view('company.DocumentUpload.documenthistory',compact('documenthistory'))->with('sno',$sno=1);
	}

    public function reviewer_document()
	{
		$user = Auth::user();
		$user_id=$user->id;
		$companyid=$user->company_id;
		$designation=$user->designation;
		$document=CDocument::where('company',$companyid)->where('status','1')->orderBy('id','desc')->get();
		
		$designation=Access::where('company',$companyid)->where('reviewer',$designation)->orderBy('id','desc')->get(); 
		foreach($designation as $des){
		$preparator=$des->preparator;

		$department=CDepartment::where('company',$companyid)->where('status','1')->orderBy('id','desc')->get();

		$documentupload=CDocumentUpload::where('designation',$preparator)->orderBy('id','desc')->get();
		}
		return view('company.DocumentUpload.reviewer_document',compact('document','documentupload','department'))->with('sno',$sno=1);
	}


	public function approvedaccept($id)
   {   
   $data=CDocumentUpload::find($id);
   $data->status=3;
   $data->save();
   //Session::flash('error', 'Document Deleted Successfully');
	return back()->with('Success','Document Accepted successfully....');
   }


   public function documentedit($id)
   {   
	$documentupload=CDocumentUpload::where('id',$id)->orderBy('id','desc')->get();
		
	return view('company.DocumentUpload.documentedit',compact('documentupload'))->with('sno',$sno=1);
   //Session::flash('error', 'Document Deleted Successfully');
	return back()->with('error','Deleted successfully....');
   }


	public function update(Request $request)
		{		

		$user = Auth::user();
		$company_id=$user->company_id;
		$id=$request->id;	
		$user_id = $request->user_id;
		$department = $user->department;
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
	

    public function approver_document()
	{
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
		return view('company.DocumentUpload.approver_document',compact('document','documentupload','department'))->with('sno',$sno=1);
	}


	public function approved_document(Request $request,$id,$approve){		
		//dd($approve);
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
