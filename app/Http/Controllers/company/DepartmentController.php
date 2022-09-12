<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CDepartment;
use App\CDesignation;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{

    public function index()
    {
			$user = Auth::user();
			$companyid=$user->company_id;
			$department=CDepartment::where('status',['1','0'])->where('company',$companyid)->orderBy('id','desc')->get();
			
			return view('company.Department.view',compact('department'))->with('sno',$sno=1);
		
    }
	 public function departmentdata(Request $request){

        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $department=CDepartment::where('status',['1','0'])->offset($start)->limit($limit);
        $totalrecords=CDepartment::where('status',['1','0'])->count();
       
        return DataTables::of($department)
        ->addColumn('action', function ($department){
                return '
                <a href="'.route('companydepartmentupdate',['id'=>$department->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <a href="'.route('companydepartmentdel',['id'=>$department->id]).'"  class="btn btn-danger delete btn-circle sa-params"
                      data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>';
            })
        ->editColumn('status',
                function ($row) {
                    if($row->status==1)
                      return "<b>Active</b>";
                    else
                      return "Inactive";
                }
            )
          
    
          
         ->rawColumns(['action','status'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }
 public function add()
    {
		$department = CDepartment::all();
		
        return view('company.Department.create',compact('department'));
		
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.department');
 
    }
    public function store(Request $request)
    {
	$this->validate($request,[
    			'name'  => 'required',
    			'shortname' => 'required',
				'status' => 'required'
				
    	]);
        $department = new CDepartment;
		$headname='4';

		$user = Auth::user();
		$department->company=$user->company_id;
		$department->name=$request->name;
        $department->shortname=$request->shortname;
        $department->status=$request->status;
        $department->save();
		$insertedId = $department->id;
		$designation = new CDesignation;
        $user = Auth::user();
        $designation->company=$user->company_id;
        $designation->department=$insertedId; $designation->name='head';
        $designation->status='3';
        $designation->save();
        Session::flash('success', 'Department Updated Successfully');
        return redirect()->route('companydepartmentview');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
		//$department = CDepartment::all();
		$user = Auth::user();
		$companyid=$user->company_id;
		$department=CDepartment::where('id',$id)->get();
        
        return view('company.Department.update',compact('department'));
		
    }

	public function edit(Request $request)
    {
		$department=CDepartment::find($request->id);
        $department->name=$request->name;
        $department->shortname=$request->shortname;
        $department->status=$request->status;
        $department->save();
       
        Session::flash('success', 'Department Updated Successfully');
        return redirect()->route('companydepartmentview');


		
		//$department = CDepartment::all();
		
    }

  
    
    public function destroy($id)
    {   
		$data=CDepartment::find($id);
        $data->status=2;
        $data->save();
 
     
        Session::flash('error', 'Department Deleted Successfully');
        return redirect()->route('companydepartmentview');
    }
}
