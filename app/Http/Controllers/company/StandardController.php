<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CStandard;
use App\User;
use DB;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class StandardController extends Controller
{

    public function index()
    {
		$user = Auth::user();
		$companyid=$user->company_id;
		$standard=CStandard::where('company',$companyid)->where('status',['1','0'])->orderBy('id','desc')->get();
        
        return view('company.Standard.view',compact('standard'))->with('sno',$sno=1);
		
    }
	
	 public function standarddata(Request $request){

        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $standard=CStandard::where('status',['1','0'])->offset($start)->limit($limit);
        $totalrecords=CStandard::where('status',['1','0'])->count();
       
        return DataTables::of($standard)
        ->addColumn('action', function ($standard){
                return '
                 <a href="'.route('companystandardupdate',['id'=>$standard->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <a href="'.route('companystandarddel',['id'=>$standard->id]).'"  class="btn btn-danger delete btn-circle sa-params"
                      data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>';
            })
        ->editColumn('status',
                function ($row) {
                    if($row->status==1)
                      return "<b>Active</b>";
                    else
                      return "Inactive";
                }
            )
          
    
          
         ->rawColumns(['action','status'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }
 public function add()
    {
		$standard = CStandard::all();
		
        return view('company.Standard.create',compact('standard'));
		
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.standard');
 
    }

	

    public function store(Request $request)
    {
//dd($request); 

		$this->validate($request,[
    			'name'  => 'required',
    			'status' => 'required'
    	]);
		
        $standard = new CStandard;
		$user = Auth::user();
		$standard->company=$user->company_id;
		$standard->name=$request->name;
        $standard->status=$request->status;
        $standard->save();
		
		
		Session::flash('success', 'Standard Added Successfully');
        
		return redirect()->route('companystandardview');
		
    }

   
    public function update($id)
    {
		//$standard = CStandard::all();
		$user = Auth::user();
		$companyid=$user->company_id;
		$standard=CStandard::where('id',$id)->get();
        
        return view('company.Standard.update',compact('standard'));
		
    }

	public function edit(Request $request)
    {
		$standard=CStandard::find($request->id);
        $standard->name=$request->name;
        $standard->status=$request->status;
        $standard->save();
       
        Session::flash('success', 'Standard Updated Successfully');
        return redirect()->route('companystandardview');


		
		
    }

  
    
    public function destroy($id)
    {   
		$data=CStandard::find($id);
        $data->status=2;
        $data->save();
 
     
        Session::flash('error', 'Standard Deleted Successfully');
        return redirect()->route('companystandardview');
    }
}
