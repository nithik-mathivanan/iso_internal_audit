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

class DepartmentUserController extends Controller
{

    public function index()
    {
		$user = Auth::user();
		$company_id=$user->company_id;
       
        return view('company.DepartmentUser.view',compact('user'))->with('sno',$sno=1);
		
    }

     public function userdata(Request $request){
        $uservalue = Auth::user();
        $company_id=$uservalue->company_id;
        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $statusDelete=[0,1];
        $user=User::where('statusDelete',1)->where('company_id',$company_id)->where('status','staff')->whereNotNull('department')->whereNotNull('designation')->offset($start)->limit($limit);
        $totalrecords=User::where('status','head')->where('statusDelete',1)->where('company_id',$company_id)->count();
       
        return DataTables::of($user)
        ->addColumn('action', function ($user){
                return '
                <a href="'.route('companydepartmentuserupdate',['id'=>$user->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="'.route('departmentuserdestroy',['id'=>$user->id]).'"  class="btn btn-danger delete btn-circle sa-params"
                      data-toggle="tooltip" data-original-title="Delete"  ><i class="fa fa-times" aria-hidden="true"></i></a>';
            })
        
          
    
          
         ->rawColumns(['action'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }
 public function add()
    {
	$user = User::all();
	$user = Auth::user();
    $company_id=$user->company_id;
    //$department=CDepartment::where('status','1')->where('company',$company_id)->orderBy('id','desc')->whereNotIn('name', function($query) { $query->select('department')->from('users'); })->get();
    $staffuser=User::orderBy('id','asc')->where('company_id',$company_id)->where('status','staff')->where('designation',null)->where('department',null)->get();
       $department  =CDepartment::where('status','1')->where('company',$company_id)->get();
       $designation  =CDesignation::where('status','1')->where('company',$company_id)->get();
      // dd($department);
        return view('company.DepartmentUser.create',compact('user','department','staffuser','designation'));
		
    }

    public function create()
    {
        return view('company.DepartmentUser');
 
    }

	
    public function update($id)
    {

        
        //$user = User::all();
        $user = Auth::user();
        $companyid=$user->company_id;
        $user=User::where('id',$id)->get();
        
        return view('company.DepartmentUser.update',compact('user'));
        
    }
   

	public function edit(Request $request)
    {
//dd($request);
$this->validate($request,[
    			'department'  => 'required',
    			'id' => 'required',
                'designation' => 'required',
    	]);

        $user1 = Auth::user();
        $company_id=$user1->company_id;

		$user=User::find($request->id);
        $user->department=$request->department;
        $user->designation=$request->designation;
        $user->save();
       
        Session::flash('success', 'Department User Updated Successfully');
        return redirect()->route('companydepartmentuserview');
	
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
