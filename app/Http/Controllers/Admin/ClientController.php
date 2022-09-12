<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Employee;
use App\Client;
use DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreEmployee;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
	public function clientdata(Request $request){
    	$limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $login = \Auth::user();
        $user=User::where('company_id',$login->company_id)->where('role',3)->offset($start)->limit($limit);
        $totalrecords=User::where('company_id',$login->company_id)->where('role',3)->count();

        return DataTables::of($user)
         ->addColumn('action', function ($user) {
                return '
                <p><a href="'.route('admin.client.edit',['id'=>$user->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                      <p><a href="javascript:;" class="btn btn-danger delete btn-circle sa-params"
                      data-toggle="tooltip" data-id="' . $user->id . '"data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a></p>';
            })

          
         ->rawColumns(['action'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }

    public function index(){
       return view('admin.client.index');
    }

    public function create(){
       return view('admin.client.create');
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
        $data->role=3;
        $data->company_id=$user->company_id;
        $data->save();
        $client=new Client();
        $client->user_id=$data->id;
        $client->company_id=$user->company_id;
        $client->name=$request->name;
        $client->phone=$request->phone;
        $client->save();
         DB::commit();
        Session::flash('success', 'Client Added Successfully');
        return redirect()->route('admin.client.index');
    }

     public function edit(Request $request){
        $post=User::find($request->id);
         return view('admin.client.edit',['post'=>$post]);
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
        $client=Client::where('user_id',$request->id)->first();
        $client->name=$request->name;
        $client->phone=$request->phone;
        $client->save();
         DB::commit();
        Session::flash('success', 'Client Updated Successfully');
        return redirect()->route('admin.client.index');
    }

    public function destroy(Request $request){
        $data=User::find($request->id);
        $data->delete();
        $client=Client::where('user_id',$request->id)->first();
        $client->delete();
    }
}
