<?php

namespace App\Http\Controllers\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CDocument;
use App\CDepartment;
use App\CDocumentUpload;
use App\CDesignation;
use App\CDocumentHistory;
use App\User;
use DB;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PreparatorController extends Controller
{
    public function documentInProcess(){
       $user = Auth::user();
        $user_id=$user->id;
        $companyid=$user->company_id;
        $document=CDocument::where('company',$companyid)->where('status','1')->orderBy('id','desc')->get();
        $department=CDesignation::where('company',$companyid)->where('status','1')->orderBy('id','desc')->get();
        $documentupload=CDocumentUpload::where('user_id',$user_id)->orderBy('id','desc')->get();
        
        return view('preparator.approved-documents-process',compact('document','documentupload','department'))
        ->with('sno',$sno=1);

    }

    public function uploadDocument(){
        $user = Auth::user();
        $companyid=$user->company_id;
        $document=CDocument::where('company',$companyid)->where('status',['1','0'])->orderBy('id','desc')->get();
        $department=CDepartment::where('company',$companyid)->where('status',['1','0'])->orderBy('id','desc')->get();
        $my_dept = CDepartment::where('id',Auth::user()->department)->first();
       
        return view('preparator.upload_document',compact('document','department'))->with('sno',$sno=1)->with('my_dept',$my_dept);
    }

    public function storeDocument(Request $request){ 
         $validated = $request->validate([
            'document' => 'mimes:docx',
            ]);
    // Send email
         $details = [
                'title' => 'Document Approval from ISO Audit',
                'body' => 'Hii Admin!! Mr/Ms/Mrs,'.Auth::user()->name.' is waiting for your document approval, Please verify the document for further process',
            ];
        \Log::info($details['title'].'<br>'.$details['body']);
       

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
        $CDocumentUpload->department=$department;
        $CDocumentUpload->designation=$designation1;
        $CDocumentUpload->document_type=$request->type;
        $CDocumentUpload->document_name=$request->document_name;
        $CDocumentUpload->document=$filename1;
        $CDocumentUpload->document_status='R0-D1';
        $CDocumentUpload->status='2';
        $CDocumentUpload->save();
        
        $last_id=$CDocumentUpload->id;  
        
        $CDocumentHistory = new CDocumentHistory;
        $CDocumentHistory->document_id=$last_id;
        $CDocumentHistory->company_id=$company_id;
        $CDocumentHistory->document=$filename1;
        $CDocumentHistory->user_id=$request->user_id;
        $CDocumentHistory->status=1;
        $CDocumentHistory->save();
        
       
        
        Session::flash('success', 'Stored Successfully');
        return back()->with('success','Sored successfully....');
    }

    public function documentdestroy($id){
    
        $data=CDocumentUpload::find($id);
        $data->status=2;
        $data->save();
        //Session::flash('error', 'Document Deleted Successfully');
        return back()->with('error','Deleted successfully....');
    }

    public function documentedit($id){
    $documentupload=CDocumentUpload::where('id',$id)->orderBy('id','desc')->get();
        
    return view('preparator.document_edit',compact('documentupload'))->with('sno',$sno=1);
   //Session::flash('error', 'Document Deleted Successfully');
    return back()->with('error','Deleted successfully....');
   }

   
    public function update(Request $request){       
        $validated = $request->validate([
            'document' => 'mimes:docx',
        ]);
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
        $data->status='2';
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
}
