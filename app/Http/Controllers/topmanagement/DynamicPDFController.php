<?php

namespace App\Http\Controllers\topmanagement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CActivity;
use DB;
use Session;
use PDF;
use App\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\CauditProgram;
use App\CDepartment;
use App\Cauditplan;
use App\CScope;
use App\CStandard;
use Dompdf\Dompdf;

class DynamicPDFController extends Controller
{

		public function index()		
		{
			$frequency=$_GET['frequency'];
			$companyid=$_GET['companyid'];
			$start=$_GET['start'];
			$end=$_GET['end'];
			if($frequency=='annual'){

		$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->get();
					$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
					$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();

					$sno=0;
							$dompdf = new Dompdf();
							$html = view('company.PDF.dynamic_pdf', compact(['auditprogram'],['scope1'],['standard1'],['sno']));
							$dompdf->loadHtml($html,'UTF-8');
							$dompdf->setPaper('A4', 'landscape');
							$dompdf->render();
							$dompdf->stream();
					//return view('company.PDF.dynamic_pdf',compact('auditprogram','scope1','standard1'))->with('sno',$sno=0);
		}
		elseif ($frequency=='halfyearly'){
		
					$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->get();
					$count=CauditProgram::where('statusDelete','1')->where('audit_frequency',$frequency)->get();
					$count1=($count->count())/2;
					$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->limit($count1)->get();
					$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->skip($count1)->limit($count1)->get();
					$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
					$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
					$sno=0;
							$dompdf = new Dompdf();
							$html = view('company.PDF.dynamic_pdf', compact(['auditprogram'],['auditprogram1'],['auditprogram2'],['scope1'],['standard1'],['sno']));
							$dompdf->loadHtml($html,'UTF-8');
							$dompdf->setPaper('A4', 'landscape');
							$dompdf->render();
							$dompdf->stream(); 
							 //   return view('company.PDF.dynamic_pdf',compact('auditprogram','auditprogram1','auditprogram2','scope1','standard1'))->with('sno',$sno=0);
		}
	elseif ($frequency=='quaterly'){
					
					$auditprogram=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->get();
					$count=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->get();
					
					$count1=($count->count())/4;
					$auditprogram1=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->limit($count1)->get();
					
					$auditprogram2=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->skip($count1)->limit($count1)->get();
					$auditprogram3=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->skip($count1*2)->limit($count1)->get();
					$auditprogram4=CauditProgram::where('statusDelete','1')->where('company',$companyid)->where('audit_frequency',$frequency)->where('start',$start)->where('end',$end)->skip($count1*3)->limit($count1)->get();
					
			}
					$scope1=CScope::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
					$standard1=CStandard::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
							$sno=0;
							$dompdf = new Dompdf();
							$html = view('company.PDF.dynamic_pdf', compact(['auditprogram'],['auditprogram1'],['auditprogram2'],['auditprogram3'],['auditprogram4'],['scope1'],['standard1'],['sno']));
							$dompdf->loadHtml($html,'UTF-8');
							$dompdf->setPaper('A4', 'portrait');
							$dompdf->render();
							$dompdf->stream(); 
				 // return view('company.PDF.dynamic_pdf',compact('auditprogram','auditprogram1','auditprogram2','auditprogram3','auditprogram4','scope1','standard1'))->with('sno',$sno=0);


		}
		
		public function AuditPlanPdf()
		{
			$companyid=$_GET['companyid'];
			$audit_number=$_GET['audit_number'];

		$planview=Cauditplan::where('statusDelete','1')->where('company',$companyid)->where('audit_number',$audit_number)->get();
			 $planscope=Cauditplan::select('scope', 'standard')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();
			  $number=Cauditplan::select('audit_number')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();

			$department=CDepartment::where('status','1')->where('company',$companyid)->orderBy('id','desc')->get();
			$auditor=User::where('statusDelete','1')->where('company_id',$companyid)->orderBy('id','desc')->get();
			$auditee=User::where('statusDelete','1')->where('company_id',$companyid)->orderBy('id','desc')->get();
			$program=CauditProgram::select('audit_frequency','audit_number','company','standard','scope','status')->distinct()->where('company',$companyid)->where('statusDelete','1')->where('audit_number',$audit_number)->get();
			$sn1=0;
			$sn=0;
			$sno=0;
			 	$dompdf = new Dompdf();
							$html = view('company.PDF.AuditPlan', compact(['planview'],['planscope'],['number'],['department'],['auditor'],['auditee'],['program'],['sn'],['sn1'],['sno']));
							$dompdf->loadHtml($html,'UTF-8');
							$dompdf->setPaper('A4', 'landscape');
							$dompdf->render();
							$dompdf->stream(); 
			//return view('company.PDF.AuditPlan',compact('planview','planscope','number','department','auditor','auditee','program'))->with('sno',$sno=0)->with('sn',$sn=0)->with('sn1',$sn1=0);
		}
}
