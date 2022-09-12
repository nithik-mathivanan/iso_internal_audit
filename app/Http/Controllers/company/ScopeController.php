<?php

namespace App\Http\Controllers\company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CScope;
use App\User;
use DB;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class ScopeController extends Controller
{

    public function index()
    {
		$user = Auth::user();
		$companyid=$user->company_id;
		$scope=CScope::where('company',$companyid)->where('status',['1','0'])->orderBy('id','desc')->get();
        
        return view('company.Scope.view',compact('scope'))->with('sno',$sno=1);
		
    }
	
	 public function scopedata(Request $request){

        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $scope=CScope::where('status',['1','0'])->offset($start)->limit($limit);
        $totalrecords=CScope::where('status',['1','0'])->count();
       
        return DataTables::of($scope)
        ->addColumn('action', function ($scope){
                return '
                 <a href="'.route('companyscopeupdate',['id'=>$scope->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <a href="'.route('companyscopedel',['id'=>$scope->id]).'"  class="btn btn-danger delete btn-circle sa-params"
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
		$scope = CScope::all();
		
        return view('company.Scope.create',compact('scope'));
		
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.scope');
 
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
		
        $scope = new CScope;
		$user = Auth::user();
		$scope->company=$user->company_id;
		$scope->name=$request->name;
        $scope->status=$request->status;
        $scope->save();
		
		
		Session::flash('success', 'Scope Added Successfully');
        
		return redirect()->route('companyscopeview');
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
		//$scope = CScope::all();
		$user = Auth::user();
		$companyid=$user->company_id;
		$scope=CScope::where('id',$id)->get();
        
        return view('company.Scope.update',compact('scope'));
		
    }

	public function edit(Request $request)
    {
		$scope=CScope::find($request->id);
        $scope->name=$request->name;
        $scope->status=$request->status;
        $scope->save();
       
        Session::flash('success', 'Scope Updated Successfully');
        return redirect()->route('companyscopeview');


		
		//$scope = CScope::all();
		
    }

  
    
    public function destroy($id)
    {   
		$data=CScope::find($id);
        $data->status=2;
        $data->save();
 
     
        Session::flash('error', 'Scope Deleted Successfully');
        return redirect()->route('companyscopeview');
    }
}
