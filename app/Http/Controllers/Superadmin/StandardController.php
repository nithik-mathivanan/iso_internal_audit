<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Standard;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreStandard;
use PDF;
class StandardController extends Controller
{

     public function standarddata(Request $request){

        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $standard=Standard::offset($start)->limit($limit);
        $totalrecords=Standard::count();
       
        return DataTables::of($standard)->addColumn('action', function ($standard){
                return '
                 <p><a href="'.route('editstandard',['id'=>$standard->id]).'" class="btn btn-info btn-circle"
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
       return view('superadmin.standard.index');
    }

   
    public function create()
    {
        $standard=Standard::all();
        return view('superadmin.standard.create',['standard'=>$standard]);
    }

   
    public function store(StoreStandard $request){
        $data=new Standard();
        $data->name=$request->name;
        $data->status=$request->status;
        $data->save();
        Session::flash('success', 'Standard Added Successfully');
        return redirect()->route('standard');
    }

    
    public function show(Standard $standard)
    {
        //
    }

   
    public function edit(Standard $standard,Request $request){
         $standard=Standard::find($request->id);
        return view('superadmin.standard.edit',['standard'=>$standard]);
    }

    
    public function update(StoreStandard $request,Standard $standard){
        $standard=Standard::find($request->id);
        $standard->name=$request->name;
        $standard->status=$request->status;
        $standard->save();
        Session::flash('success', 'Standard updated Successfully');
        return redirect()->route('standard');
    }

   
    public function destroy(Request $request){
        $data=Standard::find($request->id);
        $data->delete();
    }
}
