<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\CDepartment;
use App\CDesignation;
use DB;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
class UserController extends Controller
{

    public function index()
    {
		$user = Auth::user();
		$company_id=$user->company_id;
		$user=User::orderBy('id','asc')->where('company_id',$company_id)->where('status',['1','0'])->get();
        return view('company.User.view',compact('user'))->with('sno',$sno=1);
		
    }

     public function userdata(Request $request){
        $uservalue = Auth::user();
        $company_id=$uservalue->company_id;
        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $statusDelete=[0,1];
        $user=User::where('statusDelete',1)->where('company_id',$company_id)->whereIn('status',['audit','staff','topmanagement','head'])->orderBy('id','desc')->offset($start)->limit($limit);
        $totalrecords=User::where('statusDelete',1)->orderBy('id','desc')->whereIn('status',['audit','staff','topmanagement','head'])->where('company_id',$company_id)->count();
       
        return DataTables::of($user)
        ->addColumn('action', function ($user){
                return '
                <a href="'.route('companyuserupdate',['id'=>$user->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="'.route('userdestroy',['id'=>$user->id]).'"  onclick="return DeleteFunction()"  class="btn btn-danger delete btn-circle sa-params" 
                      data-toggle="tooltip" data-original-title="Delete" ><i class="fa fa-times" aria-hidden="true"></i></a>';
            })
        ->addColumn('department1', function ($user){       
               $department = CDepartment::where('id',$user->department)->pluck('name')->first();
              
               return $department;
               
            })
        ->editColumn('status',
                function ($row) {
                    if($row->status=='head')
                        return "Department Head";
                    elseif($row->status=='topmanagement')
                        return "topmanagement";
                    elseif($row->status=='staff') {
                        $designation = CDesignation::where('id',$row->designation)->pluck('name')->first();
              
               return $designation;
                        return "Staff"; }
                    elseif($row->auditor=='Y'&&$row->auditee=='N')
                        return "Auditor";
                    elseif($row->auditor=='N'&&$row->auditee=='Y')
                        return "Auditee";
                    elseif($row->auditor=='Y'&&$row->auditee=='Y')
                        return "Auditor & Auditee";
                    
                }
            )
          
    
          
         ->rawColumns(['action','status','department1'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }
 public function add()
    {
		$user = User::all();
		
            $user = Auth::user();
            $companyid=$user->company_id;  
            $department=CDepartment::orderBy('id','desc')->get();
        $designation=CDesignation::whereIn('status',['1','3'])->where('company',$companyid)->orderBy('id','desc')->get();
        return view('company.User.create',compact('user','department','designation'));
		
    }

    public function create()
    {
        return view('company.user');
 
    }

	
    public function store(Request $request)
    {
//dd($request); 

		$this->validate($request,[
    			'name'  => 'required',
    			'email' => 'required',
                'password'  => 'required',
                'role'  => 'required',
                'designation'  => 'required'
    	]);
		$role=$request->role;
        $user = new User;
		$userid = Auth::user();
		$user->company_id=$userid->company_id;
		$user->name=$request->name;
        $user->email=$request->email;
        $user->opensource=$request->password;
        $user->password = Hash::make($request->password);
        if($role=='topmanagement'){
            $user->role=5;
            $user->status='topmanagement';
        }
        elseif($role=='staff'){  
         $designation = CDesignation::where('id',$request->designation)->pluck('department')->first(); //dd($designation);
            if($request->auditor==''&$request->auditee==''){  
                $user->role=2;
                $user->status='staff';
                $user->designation=$request->designation;
                $user->department=$designation;
            }
            else{
                if($request->auditor=='Y'&$request->auditee==''){
                    $user->role=6;
                    $user->status='audit';
                    $user->auditor='Y';
                    $user->auditee='N';
                    $user->designation=$request->designation;
                    $user->department=$designation;
                }
                elseif($request->auditor==''&$request->auditee=='Y'){
                    $user->role=6;
                    $user->status='audit';
                    $user->auditor='N';
                    $user->auditee='Y';
                    $user->designation=$request->designation;
                    $user->department=$designation;
                    }
                elseif($request->auditor=='Y'&$request->auditee=='Y'){
                    $user->role=6;
                    $user->status='audit';
                    $user->auditor='Y';
                    $user->auditee='Y';
                    $user->designation=$request->designation;
                    $user->department=$designation;
                }
            }
           
        }

        // Send Email
            $details = [
                'title' => 'Greeting from ISO Audit',
                'body' => 'Welcome to '.$request->name.'!!' ,
                'username'=>$request->name,
                'password'=>$request->password,
            ];
            \Log::info($details['title'].'<br>'.$details['body'].'<br>Your Username:'.$details['username'].'password'.$details['password']);
            
            //Mail::to($request->email)->send(new sendMail($details));
            $user->save();
		
		
		Session::flash('success', 'User Added Successfully');    
		return redirect()->route('companyuserview');
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

		
		//$user = User::all();
		$user = Auth::user();
		$companyid=$user->company_id;
		$user=User::where('id',$id)->get();
        
        return view('company.User.update',compact('user'));
		
    }

	public function edit(Request $request)
    {
//dd($request);
$this->validate($request,[
    			'name'  => 'required',
    			'password' => 'required'
    	]);
		$user=User::find($request->id);
        $user->name=$request->name;
        $user->opensource=$request->password;
        $user->password = Hash::make($request->password);
        $user->save();
       
        Session::flash('success', 'User Updated Successfully');
        return redirect()->route('companyuserview');


		
		//$user = User::all();
		
    }

  
    
    public function destroy($id)
    {   
		$data=User::find($id);
        $data->statusDelete=2;
        $data->save();
 
     
        Session::flash('error', 'User Deleted Successfully');
        return redirect()->route('companyuserview');
    }
}
