<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;

use App\Caudit_program;
use App\Caudit_plan;
use App\User;
use App\CDepartment;
use App\CScope;
use App\Cauditplan;
use App\CStandard;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuditorController extends Controller
{
public function auditor_auditplan()
					{
						
		$user = Auth::user();
		$id=$user->id;

				$plan = DB::select("SELECT DISTINCT `audit_number`,`status`,`company`,`circulate` FROM `audit_plan` where   auditor='$id' order by `id` desc");
			   
				return view('company.Auditor.auditplan',compact('plan'))->with('sno',$sno=1);

					}
					public function auditee_auditplan()
					{
						
		$user = Auth::user();
		$id=$user->id;

				$plan = DB::select("SELECT DISTINCT `audit_number`,`status`,`company`,`circulate` FROM `audit_plan` where   auditee='$id' order by `id` desc");
			   
				return view('company.Auditor.auditplan',compact('plan'))->with('sno',$sno=1);

					}

		public function auditor_planview($companyid,$audit_number){

		$planview=Cauditplan::where('company',$companyid)->where('audit_number',$audit_number)->get();
		$planscope = DB::select("SELECT DISTINCT `scope`,`standard` FROM `audit_plan` WHERE `company` = '$companyid' and `audit_number`='$audit_number'");
		$number = DB::select("SELECT DISTINCT `audit_number` FROM `audit_plan` WHERE `company` = '$companyid' and `audit_number`='$audit_number'");
		$department=CDepartment::where('company',$companyid)->orderBy('id','desc')->get();
		$auditor=User::where('statusDelete','1')->where('company_id',$companyid)->orderBy('id','desc')->get();
		$auditee=User::where('statusDelete','1')->where('company_id',$companyid)->orderBy('id','desc')->get();
		$program = DB::select("SELECT DISTINCT `audit_frequency`,`audit_number`, `company`, `audit_number`, `standard`, `scope`, `status` FROM `audit_program` where  `company`= '$companyid' and `audit_number` ='$audit_number' ");
	
		return view('company.Auditor.planview',compact('planview','planscope','number','department','auditor','auditee','program'))->with('sno',$sno=0)->with('sn',$sn=0)->with('sn1',$sn1=0);

		}
	
		 public function auditor_circulateplan_view()
					{
						
		
		$user = Auth::user();
		$id=$user->id;
				$plan = DB::select("SELECT DISTINCT `audit_number`,`status`,`company` FROM `audit_plan` where   circulate IN ('1')  and auditor='$id'  order by `id` desc");
			   
				return view('company.Auditor.circulateplan_view',compact('plan'))->with('sno',$sno=1);

					}
		public function auditor_circulateauditplanview($companyid,$audit_number){

		$planview=Cauditplan::where('company',$companyid)->where('audit_number',$audit_number)->get();
		$planscope = DB::select("SELECT DISTINCT `scope`,`standard` FROM `audit_plan` WHERE `company` = '$companyid' and `audit_number`='$audit_number'");
		$number = DB::select("SELECT DISTINCT `audit_number` FROM `audit_plan` WHERE `company` = '$companyid' and `audit_number`='$audit_number'");
		$department=CDepartment::where('company',$companyid)->orderBy('id','desc')->get();
		$auditor=User::where('statusDelete','1')->where('company_id',$companyid)->orderBy('id','desc')->get();
		$auditee=User::where('statusDelete','1')->where('company_id',$companyid)->orderBy('id','desc')->get();
		$program = DB::select("SELECT DISTINCT `audit_frequency`,`audit_number`, `company`, `audit_number`, `standard`, `scope`, `status` FROM `audit_program` where  `company`= '$companyid' and `audit_number` ='$audit_number' ");
	
		return view('company.Auditor.circulateauditplanview',compact('planview','planscope','number','department','auditor','auditee','program'))->with('sno',$sno=0)->with('sn',$sn=0)->with('sn1',$sn1=0);

		}
		
		public function destroy($id)
			{
				//
			}





}
