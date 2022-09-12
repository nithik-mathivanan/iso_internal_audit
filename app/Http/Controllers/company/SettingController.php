<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CSetting;

use App\User;
use DB;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{

    public function index()
    {
		$user = Auth::user();
		$companyid=$user->company_id;
		$mr_setting=Csetting::where('companyid',$companyid)->where('status',['1','0'])->orderBy('id','desc')->get();
		//dd($mr_setting);
        return view('company.DocumentUpload.settingview',compact('mr_setting'));
		
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.DocumentUpload.settingview');
 
    }

	

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		$user = Auth::user();
		//Check Count
		$companyid=$user->company_id;
$mr_setting=Csetting::where('companyid',$companyid)->whereIn('status',[1,0])->orderBy('id','desc')->get();
		$count=count($mr_setting);
		//dd($count);
if($count==0){
		$this->validate($request,[
    			'logo'  => 'required',
    			'document_name' => 'required',
    			'company_name' => 'required',
    			'prepared' => 'required',
    			'reviewed' => 'required',
    			'approved' => 'required'
    			
    	]);
		
        $mr_setting = new CSetting;
		$user = Auth::user();
		$mr_setting->companyid=$user->company_id;
		$mr_setting->logo=$request->logo;
		$mr_setting->document_name=$request->document_name;
		$mr_setting->company_name=$request->company_name;
		$mr_setting->prepared=$request->prepared;
		$mr_setting->reviewed=$request->reviewed;
		$mr_setting->approved=$request->approved;
        $mr_setting->status=1;
        $mr_setting->save();
}
else if  ($count==1){
	$this->validate($request,[
    			'logo'  => 'required',
    			'document_name' => 'required',
    			'company_name' => 'required',
    			'prepared' => 'required',
    			'reviewed' => 'required',
    			'approved' => 'required'
				]);
			$mr_setting = CSetting::where('companyid',$companyid)->first();
			
			$mr_setting->companyid=$user->company_id;
			$mr_setting->logo=$request->logo;
			$mr_setting->document_name=$request->document_name;
			$mr_setting->company_name=$request->company_name;
			$mr_setting->prepared=$request->prepared;
			$mr_setting->reviewed=$request->reviewed;
			$mr_setting->approved=$request->approved;
			$mr_setting->status=1;
			
			$mr_setting->update();
}
		Session::flash('success', 'Setting Added Successfully');
        
		return redirect()->route('settingview');
		
    }
 public function view()
	{
		$user = Auth::user();
		
		
		return view('company.DocumentUpload.settingview',compact('user'));

	}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

		
		//$designation = CDesignation::all();
		$user = Auth::user();
		$companyid=$user->company_id;
		$designation=CDesignation::where('id',$id)->get();
        
        return view('company.Designation.update',compact('designation'));
		
    }

	public function edit(Request $request)
    {

$this->validate($request,[
    			'name'  => 'required',
    			'status' => 'required'
    	]);
		$designation=CDesignation::find($request->id);
        $designation->name=$request->name;
        $designation->status=$request->status;
        $designation->save();
       
        Session::flash('success', 'Designation Updated Successfully');
        return redirect()->route('companydesignationview');


		
		//$designation = CDesignation::all();
		
    }

  
    
    public function destroy($id)
    {   
		$data=CSetting::find($id);
        $data->status=0;
        $data->save();
 
     
        Session::flash('error', 'Setting Deleted Successfully');
        return redirect()->route('settingview');
    }
}
