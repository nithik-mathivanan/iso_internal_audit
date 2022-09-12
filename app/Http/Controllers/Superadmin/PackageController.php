<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Package;
use App\Tool;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StorePackage;

class PackageController extends Controller
{

     public function packagedata(Request $request){
         $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $user=Package::offset($start)->limit($limit);
        $totalrecords=Package::count();
        return DataTables::of($user)
         ->addColumn('action', function ($user) {
                return '
                 <p><a href="'.route('editpackage',['id'=>$user->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                      <p><a href="javascript:;" class="btn btn-danger delete btn-circle sa-params"
                      data-toggle="tooltip" data-id="' . $user->id . '"data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a></p>';
            })
          
         ->rawColumns(['action'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }
   

    public function index()
    {
       return view('superadmin.packages.index');
    }

   
    public function create()
    {
        $tools=Tool::all()->where('status',1);
        return view('superadmin.packages.create',['tools'=>$tools]);
    }

   
    public function store(StorePackage $request)
    {
       
        $data=new Package();
        $data->name=$request->name;
        $data->max_employees=$request->max_employees;
        $data->max_storage_size=$request->max_storage_size;
        $data->annual_price=$request->annual_price;
        $data->monthly_price=$request->monthly_price;
        $data->description=$request->description;
        
        $data->save();
        Session::flash('success', 'Package Added Successfully');
        return redirect()->route('package');
    }

    
    public function show(Package $package)
    {
        //
    }

   
    public function edit(Package $package,Request $request)
    {
        $post=Package::find($request->id);
        return view('superadmin.packages.edit',['post'=>$post]);
    }

    
    public function update(StorePackage $request, Package $package)
    {

        $post=Package::find($request->id);
        $post->name=$request->name;
        $post->tools_id=$module_in_package;
        $post->max_employees=$request->max_employees;
        $post->max_storage_size=$request->max_storage_size;
        $post->annual_price=$request->annual_price;
        $post->monthly_price=$request->monthly_price;
        $post->description=$request->description;
        
        $post->save();
        Session::flash('success', 'Package updated Successfully');
        return redirect()->route('package');
    }

   
    public function destroy(Request $request)
    {
        $data=Package::find($request->id);
        $data->delete();
    }
}
