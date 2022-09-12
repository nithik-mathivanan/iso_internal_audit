<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Employee;
use DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreEmployee;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{

	public function employeedata(Request $request){
        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $user=User::where('role',2)->offset($start)->limit($limit);
        $totalrecords=User::where('role',2)->count();
        return DataTables::of($user)
         ->addColumn('action', function ($user) {
                return '
                <p><a href="'.route('admin.employees.edit',['id'=>$user->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                      <p><a href="javascript:;" class="btn btn-danger delete btn-circle sa-params"
                      data-toggle="tooltip" data-id="' . $user->id . '"data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a></p>';
            })

          
         ->rawColumns(['action'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }


    public function index(Request $request){
        return view('admin.employee.index');
    }

    public function create(){
    	return view('admin.employee.create');
    }

    public function store(StoreEmployee $request){
    	  DB::beginTransaction();
    	 $user = \Auth::user();
        $data=new User();
        $data->name=$request->name;
        $data->fathername=$request->father_name;
        $data->gender=$request->gender;
        $data->dob=$request->dob;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->streetaddress=$request->streetaddress;
        $data->zipcode=$request->zipcode;
        $data->password = Hash::make($request->password);
        $data->opensource = $request->password;
        $data->role=2;
        $data->company_id=$user->company_id;
        $data->save();
        $employee=new Employee();
        $employee->user_id=$data->id;
        $employee->company_id=$user->company_id;
        $employee->name=$request->name;
        $employee->save();
         DB::commit();
        Session::flash('success', 'Employee Added Successfully');
        return redirect()->route('admin.employees.index');
    }

    public function edit(Request $request){
        $post=User::find($request->id);
         return view('admin.employee.edit',['post'=>$post]);
    }

    public function update(StoreEmployee $request){
        DB::beginTransaction();
        $data=User::find($request->id);
        $data->name=$request->name;
        $data->fathername=$request->father_name;
        $data->gender=$request->gender;
        $data->dob=$request->dob;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->streetaddress=$request->streetaddress;
        $data->zipcode=$request->zipcode;
        $data->password = Hash::make($request->password);
        $data->opensource = $request->password;
        $data->save();
        $employee=Employee::where('user_id',$request->id)->first();
        $employee->name=$request->name;
        $employee->save();
         DB::commit();
        Session::flash('success', 'Employee Updated Successfully');
        return redirect()->route('admin.employees.index');
    }

    public function destroy(Request $request){
        $data=User::find($request->id);
        $data->delete();
        $employee=Employee::where('user_id',$request->id)->first();
        $employee->delete();
    }

}
