<?php
namespace App\Http\Controllers\company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CActivity;
use App\User;
use App\CDepartment;
use App\Access;
use App\CDesignation;
use DB;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
class AccessController extends Controller
{
	public function index()
	{

		$user = Auth::user();
		$companyid=$user->company_id;
		$department=CDepartment::where('status',1)->where('company',$companyid)->orderBy('id','desc')->get();
		$access = Access::with('department','prepare','review','approve')->where('company',$companyid)->get();
		
		return view('company.Access.create')->with(['sno'=>$sno=1,'department'=>$department,'access'=>$access]);
	}

	public function getDesignation($id){
		$designation = CDesignation::where('department',$id)->get();
		return $designation; 
	}

	public function storeAccess(Request $request){
		$department_chk = Access::where('dept',$request->department)->first();
		if($department_chk){
			return back()->with('error','Designation for the department are already created!!....');
		}else{

			$user = Auth::user();
			$companyid=$user->company_id;

			$store = new Access();
			$store->dept = $request->department;
			$store->preparator  = $request->prepared;
			$store->reviewer = $request->review;
			$store->approver = $request->approve;
			$store->company = $companyid;
			$store->save();

			return back()->with('success','Created Successfully!!');
		}
	}

	public function editAccess($id){
		$user = Auth::user();
		$companyid=$user->company_id;
		$get_access = Access::where('id',$id)->first();
		$department=CDepartment::where('status',1)->where('company',$companyid)->orderBy('id','desc')->get();
		$designation = CDesignation::where('department',$get_access->dept)->get();
		
		return view('company.Access.edit')->with(['access'=>$get_access,'department'=>$department,'designation'=>$designation]);
	}

	public function deleteAccess($id){
		$delete = Access::with('department','prepare','review','approve')->where('id',$id)->delete();
		return back()->with('success','Deleted Successfully!!');
	}

	public function updateAccess(Request $request){
		
			$store = Access::where('id',$request->access_id)->first();
			$store->dept = $request->department;
			$store->preparator  = $request->prepared;
			$store->reviewer = $request->review;
			$store->approver = $request->approve;
			$store->update();

			return redirect('document/')->with('success','Update Successfully!!');
	}


}
