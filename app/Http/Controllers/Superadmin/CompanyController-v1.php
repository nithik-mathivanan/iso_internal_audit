<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Package;
use App\Tool;
use App\Invoice;
use DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreCompany;
use Illuminate\Support\Facades\Hash;


class CompanyController extends Controller
{
    	 public function companydata(Request $request){
        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $user=User::where('role',1)->offset($start)->limit($limit)->get();
        $totalrecords=User::where('role',1)->count();
        return DataTables::of($user)
         ->addColumn('action', function ($user) {
                return '
                <p><a href="'.route('editcompany',['id'=>$user->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                      <p><a href="javascript:;" class="btn btn-danger delete btn-circle sa-params"
                      data-toggle="tooltip" data-id="' . $user->id . '"data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a></p>';
            })

         ->editColumn('package',function($user){
               $data=Company::find($user->company_id);
               $package=Package::find($data->package_id);
               return $package->name;
         })

          
         ->rawColumns(['action'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }

   public function index(){
      return view('superadmin.company.index');
   }

   public function create(){
      $data=Package::all();
    return view('superadmin.company.create',['data'=>$data]);
   }

   public function store(StoreCompany $request){
        DB::beginTransaction();
        $data=new User();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->streetaddress=$request->streetaddress;
        $data->zipcode=$request->zipcode;
        $data->password = Hash::make($request->password);
        $data->opensource = $request->password;
        $data->role=1;
       
        $company=new Company();
        $company->company_name=$request->name;
        $company->company_email=$request->email;
        $company->logo=$request->logo;
        $company->company_website=$request->website;
        $company->package_id=$request->package;
        $company->paytype=$request->paytype;
        $company->save();
        $data->company_id=$company->id;
        $data->save();
        $companyid=$data->company_id;

        
        $packageqry=Package::find($company->package_id);
        $explode=explode(",",$packageqry->tools_id);
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
        $invoice->tools=$packageqry->tools_id;
        $invoice->toolsname=implode(",<br>",$toolinfo);
        $invoice->description="";
        $invoice->status=1;
        $invoice->toolsamount=$toolamt;
        $invoice->totalamount=$amount;
        $invoice->uniqueid=0;
        $invoice->save();
        $invoice->uniqueid="INV".str_pad($invoice->id,8,0,STR_PAD_LEFT);
        $invoice->save();

        DB::commit();
        Session::flash('success', 'Company Added Successfully');
        return redirect()->route('company');
   }

   public function edit(Request $request){
   	$data=User::find($request->id);
    $company=Company::find($data->company_id);
    return view('superadmin.company.edit',['post'=>$data,'company'=>$company]);
   }

    public function update(StoreCompany $request){
       DB::beginTransaction();
       $post=User::find($request->id);
        $post->name=$request->name;
        $post->email=$request->email;
        $post->phone=$request->phone;
        $post->streetaddress=$request->streetaddress;
        $post->zipcode=$request->zipcode;
        $post->password = Hash::make($request->password);
        $post->opensource = $request->password;
        $post->save();

        $company=Company::find($post->company_id);
        $company->company_name=$request->name;
        $company->company_email=$request->email;
        $company->logo=$request->logo;
        $company->company_website=$request->website;
        $company->package_id=$request->package;
        $company->paytype=$request->paytype;
        $company->save();
        $companyid=$company->id;

        $invoiceqry=Invoice::where('status',1)->where('company',$companyid)->orderByDesc('id')->first();
        if($invoiceqry && $invoiceqry->package != $request->package){
          $packageqry=Package::find($company->package_id);
          $explode=explode(",",$packageqry->tools_id);
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
          $invoice->tools=$packageqry->tools_id;
          $invoice->toolsname=implode(",<br>",$toolinfo);
          $invoice->description="";
          $invoice->status=1;
          $invoice->toolsamount=$toolamt;
          $invoice->totalamount=$amount;
          $invoice->uniqueid=0;
          $invoice->save();
          $invoice->uniqueid="INV".str_pad($invoice->id,8,0,STR_PAD_LEFT);
          $invoice->save();
        }

        DB::commit();
           Session::flash('success', 'Company Updated Successfully');
            return redirect()->route('company');
   }

    public function destroy(Request $request){
      $data=User::find($request->id);
      $data->delete();
      $company=Company::find($data->company_id);
      $company->delete();
   }

   public function packagelist(Request $request){
      $packqry=Package::where('id',$request->packid)->get();
      $packcontent="";
      foreach($packqry as $key => $data) {

        $explode=explode(",",$data->tools_id);
        $toolinfo=[];
        foreach ($explode as $key => $tooldata) {
           $tools=Tool::find($tooldata);
           if($tools)
              $toolinfo[]=$tools->name." [ Price : ".$tools->price." ]";
        }
        $packcontent.="<tr><td>".implode(",<br>",$toolinfo)."</td><td>".$data->tools_totalamount."</td><td>".$data->description."</td><td>".$data->max_storage_size."</td><td>".$data->max_file_size."</td><td>".$data->annual_price."</td><td>".$data->monthly_price."</td><td>".$data->max_employees."</td></tr>";
      }
      echo $packcontent;
      exit;
  }

}
