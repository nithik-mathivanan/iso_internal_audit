<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\CDepartment;
use DB;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuditorUserController extends Controller
{

    public function index()
    {
		$user = Auth::user();
		$company_id=$user->company_id;
       
        return view('company.AuditorUser.view',compact('user'))->with('sno',$sno=1);
		
    }

     public function userdata(Request $request){
        $uservalue = Auth::user();
        $company_id=$uservalue->company_id;
        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $statusDelete=[0,1];
        $user=User::where('statusDelete',1)->where('company_id',$company_id)->where('status','audit')->offset($start)->limit($limit);
        $totalrecords=User::where('status','audit')->where('statusDelete',1)->where('company_id',$company_id)->count();
       
        return DataTables::of($user)
        ->addColumn('action', function ($user){
                return '
                <a href="'.route('companyauditoruserupdate',['id'=>$user->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="'.route('auditoruserdestroy',['id'=>$user->id]).'"  class="btn btn-danger delete btn-circle sa-params"
                      data-toggle="tooltip" data-original-title="Delete"  ><i class="fa fa-times" aria-hidden="true"></i></a>';
            })
        ->editColumn('status',
                function ($row) {
                   if($row->auditor=='Y'&&$row->auditee=='N')
                        return "Auditor";
                    elseif($row->auditor=='N'&&$row->auditee=='Y')
                        return "Auditee";
                    elseif($row->auditor=='Y'&&$row->auditee=='Y')
                        return "Auditor & Auditee";
                    
                }
            )
          
    
          
         ->rawColumns(['action','status'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }
 public function add()
    {
		$user = User::all();
		
            $user = Auth::user();
            $company_id=$user->company_id;
        $department=CDepartment::where('status','1')->where('company',$company_id)->orderBy('id','desc')->get();
        $staffuser=User::orderBy('id','asc')->where('company_id',$company_id)->where('status','staff')->get();
        $user=User::orderBy('id','asc')->where('company_id',$company_id)->where('status','audit')->where('auditor','Y')->get();
        return view('company.AuditorUser.create',compact('user','department','staffuser'));
		
    }

    public function create()
    {
        return view('company.AuditorUser');
 
    }

	  public function update($id)
    {

        
        //$user = User::all();
        $user = Auth::user();
        $companyid=$user->company_id;
        $user=User::where('id',$id)->get();
        
        return view('company.AuditorUser.update',compact('user'));
        
    }
   

	public function edit(Request $request)
    {
//dd($request);
$this->validate($request,[
    			'department'  => 'required',
    			'id' => 'required',
    	]);
		$user=User::find($request->id);
        $user->department=$request->department;
        $user->auditor=$request->auditor;
        $user->auditee = $request->auditee;
        $user->role = '6';
        
        $user->status = 'audit';
        $user->save();
       
        Session::flash('success', 'User Updated Successfully');
        return redirect()->route('companyauditoruserview');


		
		//$user = User::all();
		
    }

  
    public function editupdate(Request $request)
    {

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
        return redirect()->route('companyauditoruserview');


        
        //$user = User::all();
        
    }
    public function destroy($id)
    {   
		$data=User::find($id);
       
        $data->statusDelete=2;
        $data->save();
 
     
        Session::flash('error', 'User Deleted Successfully');
        return redirect()->route('companyauditoruserview');
    }
}
