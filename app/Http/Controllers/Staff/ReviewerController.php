<?php

namespace App\Http\Controllers\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CDocument;
use App\CDepartment;
use App\CDocumentUpload;
use App\CDocumentHistory;
use App\User;
use DB;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Access;

class ReviewerController extends Controller
{
     public function approved_document(){
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
        return view('reviewer.document',compact('document','documentupload','department'))->with('sno',$sno=1);
    }

    public function approvedaccept($id){  
    // Send Email
      $department = CDocumentUpload::where('id',$id)->first();
      $getaccess = Access::where('dept',$department->department)->first();
      $designation = User::where('designation',$getaccess->approver)->first();
    
         $details = [
                'title' => 'Document Approval Remainder -ISO Audit',
                'body' => 'Hii '.$designation->name.' Your document approval is  pending!! Please approve it for further process.',
            ];
        \Log::info($details['title'].'<br>'.$details['body']); 
     
      $data=CDocumentUpload::find($id);
      $data->status=3;
      $data->save();
      return back()->with('Success','Document Accepted successfully....');
      }
    
}
