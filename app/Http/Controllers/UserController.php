<?php

namespace App\Http\Controllers;

use App\User;
use App\Country;
use App\State;
use App\District;
use App\Company;
use App\Package;
use App\Tool;
use App\Invoice;
use App\CDepartment;
use App\CDesignation;
use App\CStandard;
use App\CScope;
use App\Department;
use App\Designation;
use App\Standard;
use App\Scope;
use DB;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreCompany;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
	 public function userdata(Request $request){
         $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $user=User::where('role',1)->where('status',1)->offset($start)->limit($limit);
        $totalrecords=User::where('role',1)->where('status',1)->count();
        return DataTables::of($user)
         ->addColumn('action', function ($user) {
                return '
                <div class="btn-group dropdown m-r-10">
                <button aria-expanded="false" data-toggle="dropdown" class="btn dropdown-toggle waves-effect waves-light" type="button"><i class="ti-more"></i></button>
                <ul role="menu" class="dropdown-menu pull-right">
                  <li><a href="'.route('edituser',['id'=>$user->id]).'" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </a></li>
                  <li><a href="'.route('viewuser',['id'=>$user->id]).'" title="View"><i class="fa fa-search" aria-hidden="true"></i>View </a></li>
                  <li><a href="Javascript:void(0);"  data-id="' . $user->id . '"  class="sa-params delete"><i class="fa fa-times" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                  </div>';
            })
          
         ->rawColumns(['action'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }

   public function index(){
   	return view('admin.user.index');
   }

   public function show(Request $request){
       $data=User::find($request->id);
       return view('admin.user.show',['data'=>$data]);
   }

   public function edit(Request $request){
       $data=User::find($request->id);
       return view('admin.user.edit',['post'=>$data]);
   }

   public function update(Request $request){
         $validatedData = $request->validate([
            'name' => ['required'],
            'fathername' => ['required'],
            'gender' => ['required'],
            'email' => ['required','email'],
            'phone' => ['required'],
            'dob' => ['required'],
            'streetaddress' => ['required'],
            'city' => ['required'],
            'district' => ['required'],
            'zipcode' => ['required']

        ]);
       $post=User::find($request->id);
        $post->name=$request->name;
        $post->fathername=$request->fathername;
        $post->gender=$request->gender;
        $post->email=$request->email;
        $post->phone=$request->phone;
        $post->dob=$request->dob;
        $post->streetaddress=$request->streetaddress;
        $post->city=$request->city;
        $post->district=$request->district;
       $district=District::find($request->district);
       $post->state=$district->state;
       $state=State::find($district->state);
       $post->country=$state->country;
        $post->zipcode=$request->zipcode;
        $post->save();
           Session::flash('success', 'User Edited Successfully');
            return redirect()->route('users');
   }

   // public function master(){
   // 	   $data=DB::table('mlm_m_city')->get();
   //     foreach ($data as $value) { 
   // 	   $post=new City();
   // 	   $post->name=$value->city_name;
   // 	   $post->district=$value->city_district;
   // 	   $post->state=$value->city_state;
   // 	   $post->country=$value->city_country;
   // 	   $post->save();
   // 	   }
   // }

   public function destroy(){
         $id = $_GET['id'];
      $data=User::find($id);
      $data->status=0;
      $data->save();
   }

   public function registerstore(StoreCompany $request){
    DB::beginTransaction();

        date_default_timezone_set('Asia/Kolkata');

        $data=new User();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->streetaddress=$request->streetaddress;
        $data->zipcode=$request->zipcode;
        $data->password = Hash::make($request->password);
        $data->opensource = $request->password;
        $data->role=1;
       
       $module_in_package=implode(',',$request->module_in_package);

        $company=new Company();
        $company->tools_id=$module_in_package;
        $company->company_name=$request->name;
        $company->company_email=$request->email;
        $company->logo=$request->logo;
        $company->company_website=$request->website;
        $company->package_id=$request->package;
        $company->paytype=$request->paytype;
        $company->tools_totalamount=$request->tools_totalamount;
        $company->save();
        $data->company_id=$company->id;
        $data->save();
        $companyid=$data->company_id;

        
        $packageqry=Package::find($company->package_id);
        $explode=explode(",",$company->tools_id);
        $toolinfo=[];
        $toolamt=0;
        foreach ($explode as $key => $tooldata) {
           $tools=Tool::find($tooldata);
           if($tools){
              $toolinfo[]=$tools->name." [ Price : ".$tools->price." ]";
              $toolamt+=$tools->price;
           }
        }

          $amount=0;
          if($request->paytype==1)
            $amount=$packageqry->annual_price;
          elseif($request->paytype==2)
            $amount=$packageqry->monthly_price;

        $invoice=new Invoice;
        $invoice->company=$companyid;
        $invoice->package=$packageqry->id;
        $invoice->packagename=$packageqry->name;
        $invoice->tools=$company->tools_id;
        $invoice->toolsname=implode(",<br>",$toolinfo);
        $invoice->description="";
        $invoice->status=1;
        $invoice->toolsamount=$toolamt;
        $invoice->totalamount=$amount;
        $invoice->uniqueid=0;
        $invoice->save();
        $invoice->uniqueid="INV".str_pad($invoice->id,8,0,STR_PAD_LEFT);
        $invoice->save();


        $department=Department::where('status',1)->get();
        foreach($department as $key => $d_data){
          $c_department=new CDepartment;
          $c_department->name=$d_data->name;
          $c_department->shortname=$d_data->shortname;
          $c_department->status=$d_data->status;
          $c_department->company=$companyid;
          $c_department->save();
        } 

        $designation=Designation::where('status',1)->get();
        foreach($designation as $key => $des_data){
          $c_designation=new CDesignation;
          $c_designation->name=$des_data->name;
          $c_designation->status=$des_data->status;
          $c_designation->company=$companyid;
          $c_designation->save();
        } 

        $standard=Standard::where('status',1)->get();
        foreach($standard as $key => $std_data){
          $c_standard=new CStandard;
          $c_standard->name=$std_data->name;
          $c_standard->status=$std_data->status;
          $c_standard->company=$companyid;
          $c_standard->save();
        } 

        $scope=Scope::where('status',1)->get();
        foreach($scope as $key => $sc_data){
          $c_scope=new CScope;
          $c_scope->name=$sc_data->name;
          $c_scope->status=$sc_data->status;
          $c_scope->company=$companyid;
          $c_scope->save();
        }

        DB::commit();
        Session::flash('success', 'Company Added Successfully');
        return redirect()->route('login');
   }

}
