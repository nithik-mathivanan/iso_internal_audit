<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreDepartment;
use PDF;
class DepartmentController extends Controller
{

     public function departmentdata(Request $request){

        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $department=Department::offset($start)->limit($limit);
        $totalrecords=Department::count();
       
        return DataTables::of($department)->addColumn('action', function ($department){
                return '
                 <p><a href="'.route('editdepartment',['id'=>$department->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                      ';/*<p><a href="javascript:;" class="btn btn-danger delete btn-circle sa-params"
                      data-toggle="tooltip" data-id="' . $tool->id . '"data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a></p>*/
            })->editColumn('status',
                function ($row) {
                    if($row->status==1)
                      return "Active";
                    else
                      return "Inactive";
                }
            )
          
         ->rawColumns(['action'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }
   

    public function index()
    {
       return view('superadmin.department.index');
    }

   
    public function create()
    {
        $department=Department::all();
        return view('superadmin.department.create',['department'=>$department]);
    }

   
    public function store(StoreDepartment $request){
        $data=new Department();
        $data->name=$request->name;
        $data->shortname=$request->shortname;
        $data->status=$request->status;
        $data->save();
        Session::flash('success', 'Department Added Successfully');
        return redirect()->route('department');
    }

    
    public function show(Department $department)
    {
        //
    }

   
    public function edit(Department $department,Request $request){
        $department=Department::find($request->id);
        return view('superadmin.department.edit',['department'=>$department]);
    }

    
    public function update(StoreDepartment $request,Department $department){
        $department=Department::find($request->id);
        $department->name=$request->name;
        $department->shortname=$request->shortname;
        $department->status=$request->status;
        $department->save();
        Session::flash('success', 'Department updated Successfully');
        return redirect()->route('department');
    }

   
    public function destroy(Request $request){
        $data=Department::find($request->id);
        $data->delete();
    }
}
