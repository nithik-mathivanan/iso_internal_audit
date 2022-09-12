<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreSuperadmin;
use Illuminate\Support\Facades\Hash;

class SuperadminController extends Controller
{
    public function superadmindata(Request $request){
         $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $user=User::where('role',0)->offset($start)->limit($limit);
        $totalrecords=User::where('role',0)->count();
        return DataTables::of($user)
         ->addColumn('action', function ($user) {
                return '
                <p><a href="'.route('editsuperadmin',['id'=>$user->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                      <p><a href="javascript:;" class="btn btn-danger delete btn-circle sa-params"
                      data-toggle="tooltip" data-id="' . $user->id . '"data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a></p>';
            })
          
         ->rawColumns(['action'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }

   public function index(){
   	return view('superadmin.super-admin.index');
   }

   public function create(){
	return view('superadmin.super-admin.create');
   }

   public function store(StoreSuperadmin $request){
   	 DB::beginTransaction();
   	$data=new User();
   	$data->name=$request->name;
   	$data->email=$request->email;
   	$data->phone=$request->phone;
   	$data->password = Hash::make($request->password);
    $data->opensource = $request->password;
    $data->role=0;
    $data->save();
    DB::commit();
    Session::flash('success', 'Super Admin Added Successfully');
    return redirect()->route('superadmin');
   }

    public function edit(Request $request){
   	$data=User::find($request->id);
    return view('superadmin.super-admin.edit',['post'=>$data]);
   }

   public function update(StoreSuperadmin $request){
   	$data=User::find($request->id);
   	$data->name=$request->name;
   	$data->email=$request->email;
   	$data->phone=$request->phone;
   	$data->password = Hash::make($request->password);
    $data->opensource = $request->password;
    $data->role=0;
    $data->save();
    DB::commit();
    Session::flash('success', 'Super Admin Updated Successfully');
    return redirect()->route('superadmin');
   }

   public function destroy(Request $request){
   	 $data=User::find($request->id);
      $data->delete();
   }

}
