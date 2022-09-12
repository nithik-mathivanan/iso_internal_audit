<?php


namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;

use App\Caudit_program;
use App\User;
use App\CDepartment;
use App\CScope;
use App\CStandard;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;use App\Mail\SendMail;
class MailController extends Controller
{	public function index()
    {
    	$user = Auth::user();
		$companyid=$user->company_id;
		$program = DB::select("SELECT DISTINCT `audit_frequency`, `status` FROM `audit_program` WHERE `company` = '$companyid' order by 'id'");
       
		return view('company.auditprogram',compact('program'))->with('sno',$sno=1);
		
    }
    	public function send(Request $request)
    {
     $this->validate($request, [
      'period'     =>  'required',
      'mailid'  =>  'required|email',
      'message' =>  'required'
     ]);

        $contact_data = array(
            'mailid'      =>  $request->mailid,
            'message'   =>   $request->message,
            'period'   =>   $request->period
        );

     Mail::to('srikaviya403@gmail.com')->send(new SendMail($contact_data));
     return back()->with('success', 'Thanks for contacting us!');

    }
}




