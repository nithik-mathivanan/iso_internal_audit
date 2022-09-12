<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Designation;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreDesignation;
use PDF;
class DesignationController extends Controller
{

     public function designationdata(Request $request){

        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $designation=Designation::offset($start)->limit($limit);
        $totalrecords=Designation::count();
       
        return DataTables::of($designation)->addColumn('action', function ($designation){
                return '
                 <p><a href="'.route('editdesignation',['id'=>$designation->id]).'" class="btn btn-info btn-circle"
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
       return view('superadmin.designation.index');
    }

   
    public function create()
    {
        $designation=Designation::all();
        return view('superadmin.designation.create',['designation'=>$designation]);
    }

   
    public function store(StoreDesignation $request){
        $data=new Designation();
        $data->name=$request->name;
        $data->status=$request->status;
        $data->save();
        Session::flash('success', 'Designation Added Successfully');
        return redirect()->route('designation');
    }

    
    public function show(Designation $designation)
    {
        //
    }

   
    public function edit(Designation $designation,Request $request){
         $designation=Designation::find($request->id);
        return view('superadmin.designation.edit',['designation'=>$designation]);
    }

    
    public function update(StoreDesignation $request,Designation $designation){
        $designation=Designation::find($request->id);
        $designation->name=$request->name;
        $designation->status=$request->status;
        $designation->save();
        Session::flash('success', 'Designation updated Successfully');
        return redirect()->route('designation');
    }

   
    public function destroy(Request $request){
        $data=Designation::find($request->id);
        $data->delete();
    }
}
