<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CDesignation;use App\CDepartment;
use App\User;
use DB;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class DesignationController extends Controller
{

    public function index()
    {
		$user = Auth::user();
		$companyid=$user->company_id;
		$designation=CDesignation::where('company',$companyid)->where('status',['1','0'])->orderBy('id','desc')->get();
        $department=CDepartment::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
        return view('company.Designation.view',compact('designation','department'))->with('sno',$sno=1);
		
    }

     public function designationdata(Request $request){

        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
      
        $designation=CDesignation::whereIn('status',['1','0','3'])->offset($start)->limit($limit);
        $totalrecords=CDesignation::whereIn('status',['1','0','3'])->count();
        return DataTables::of($designation)
        ->addColumn('action', function ($designation){
            if($designation->status=='3')
                return '';
                else
                return '
                <a href="'.route('companydesignationupdate',['id'=>$designation->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="'.route('designationdestroy',['id'=>$designation->id]).'"  class="btn btn-danger delete btn-circle sa-params"
                      data-toggle="tooltip" data-original-title="Delete"  ><i class="fa fa-times" aria-hidden="true"></i></a>';
            })
        ->addColumn('department', function ($designation){       
               $department = CDepartment::where('id',$designation->department)->pluck('name')->first();
              
               return $department;
               
            })
        ->editColumn('status',
                function ($row) {
                    if($row->status==1)
                      return "<b>Active</b>";
                    else if($row->status==0)
                      return "<b>Inactive</b>";
                    
                }
            )
          
    
          
         ->rawColumns(['action','status','department'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }
 public function add()
    {$user = Auth::user();$companyid=$user->company_id;
		$designation = CDesignation::all();
		$department=CDepartment::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
        return view('company.Designation.create',compact('designation','department'));
		
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.designation');
 
    }

	

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//dd($request); 

		$this->validate($request,[
    			'name'  => 'required',
    			'status' => 'required'
    	]);
		
        $designation = new CDesignation;
		$user = Auth::user();
		$designation->company=$user->company_id;
		$designation->department=$request->department;$designation->name=$request->name;
        $designation->status=$request->status;
        $designation->save();
			
		Session::flash('success', 'Designation Added Successfully');
        
		return redirect()->route('companydesignationview');
		
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
		$data=CDesignation::find($id);
        $data->status=2;
        $data->save();
 
     
        Session::flash('error', 'Designation Deleted Successfully');
        return redirect()->route('companydesignationview');
    }
}
