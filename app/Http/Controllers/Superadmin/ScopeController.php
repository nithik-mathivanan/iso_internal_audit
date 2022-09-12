<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Scope;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreScope;
use PDF;
class ScopeController extends Controller
{

     public function scopedata(Request $request){

        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $scope=Scope::offset($start)->limit($limit);
        $totalrecords=Scope::count();
       
        return DataTables::of($scope)->addColumn('action', function ($scope){
                return '
                 <p><a href="'.route('editscope',['id'=>$scope->id]).'" class="btn btn-info btn-circle"
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
       return view('superadmin.scope.index');
    }

   
    public function create()
    {
        $scope=Scope::all();
        return view('superadmin.scope.create',['scope'=>$scope]);
    }

   
    public function store(StoreScope $request){
        $data=new Scope();
        $data->name=$request->name;
        $data->status=$request->status;
        $data->save();
        Session::flash('success', 'Scope Added Successfully');
        return redirect()->route('scope');
    }

    
    public function show(Scope $scope)
    {
        //
    }

   
    public function edit(Scope $scope,Request $request){
         $scope=Scope::find($request->id);
        return view('superadmin.scope.edit',['scope'=>$scope]);
    }

    
    public function update(StoreScope $request,Scope $scope){
        $scope=Scope::find($request->id);
        $scope->name=$request->name;
        $scope->status=$request->status;
        $scope->save();
        Session::flash('success', 'Scope updated Successfully');
        return redirect()->route('scope');
    }

   
    public function destroy(Request $request){
        $data=Scope::find($request->id);
        $data->delete();
    }
}
