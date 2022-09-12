<?php
namespace App\Http\Controllers\company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CActivity;
use App\User;
use DB;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
class ActivityController extends Controller
{
	public function index()
	{
		$user = Auth::user();
		$companyid=$user->company_id;
		$activity=CActivity::where('status',['1','0'])->where('company',$companyid)->orderBy('id','desc')->get();
		return view('company.Activity.view',compact('activity'))->with('sno',$sno=1);

	}

	public function activitydata(Request $request)
	{
		$limit = $request->get('length');
		$start = ($request->start) * $request->length;
		$activity=CActivity::where('status',['1','0'])->offset($start)->limit($limit);
		$totalrecords=CActivity::where('status',['1','0'])->count();
		return DataTables::of($activity)
		->addColumn('action', function ($activity){
		return '
		<a href="'.route('companyactivityupdate',['id'=>$activity->id]).'" class="btn btn-info btn-circle"
		data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
		<a href="'.route('activitydestroy',['id'=>$activity->id]).'"  class="btn btn-danger delete btn-circle sa-params"
		data-toggle="tooltip" data-original-title="Delete"  ><i class="fa fa-times" aria-hidden="true"></i></a>';
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
	$activity = CActivity::all();

	return view('company.Activity.create',compact('activity'));

	}


	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
	return view('company.Activity');

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

	$activity = new CActivity;
	$user = Auth::user();
	$activity->company=$user->company_id;
	$activity->name=$request->name;
	$activity->status=$request->status;
	$activity->save();


	Session::flash('success', 'Activity Added Successfully');

	return redirect()->route('companyactivityview');

	}

	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function update($id)
	{


	//$activity = CActivity::all();
	$user = Auth::user();
	$companyid=$user->company_id;
	$activity=CActivity::where('id',$id)->get();

	return view('company.Activity.update',compact('activity'));

	}

	public function edit(Request $request)
	{

	$this->validate($request,[
	'name'  => 'required',
	'status' => 'required'
	]);
	$activity=CActivity::find($request->id);
	$activity->name=$request->name;
	$activity->status=$request->status;
	$activity->save();

	Session::flash('success', 'Activity Updated Successfully');
	return redirect()->route('companyactivityview');



	//$activity = CActivity::all();

	}



	public function destroy($id)
	{   
	$data=CActivity::find($id);
	$data->status=2;
	$data->save();


	Session::flash('error', 'Activity Deleted Successfully');
	return redirect()->route('companyactivityview');
	}
}
