<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Package;
use App\Tool;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreTool;
use PDF;
class ToolController extends Controller
{

     public function modulesdata(Request $request){

        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $tool=Tool::offset($start)->limit($limit);
        $totalrecords=Tool::count();
       
        return DataTables::of($tool)->addColumn('action', function ($tool){
                return '
                 <p><a href="'.route('editmodules',['id'=>$tool->id]).'" class="btn btn-info btn-circle"
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
       return view('superadmin.tool.index');
    }

   
    public function create()
    {
        $tools=Tool::all();
        return view('superadmin.tool.create',['tools'=>$tools]);
    }

   
    public function store(StoreTool $request){
        $data=new Tool();
        $data->name=$request->name;
        $data->price=$request->price;
        $data->status=$request->status;
        $data->save();
        Session::flash('success', 'Modules Added Successfully');
        return redirect()->route('modules');
    }

    
    public function show(Package $package)
    {
        //
    }

   
    public function edit(Package $package,Request $request){
        $tools=Tool::find($request->id);
        return view('superadmin.tool.edit',['tools'=>$tools]);
    }

    
    public function update(StoreTool $request,Tool $tool){
        $tools=Tool::find($request->id);
        $tools->name=$request->name;
        $tools->price=$request->price;
        $tools->status=$request->status;
        $tools->save();
        Session::flash('success', 'Modules updated Successfully');
        return redirect()->route('modules');
    }

   
    public function destroy(Request $request){
        $data=Tool::find($request->id);
        $data->delete();
    }

     public function downloadPDF(Request $request){
        $pdf = PDF::loadView('superadmin.tool.pdf');
        //return $pdf->download('superadmin.tool.pdf');
        return $pdf->stream();
    }
}
