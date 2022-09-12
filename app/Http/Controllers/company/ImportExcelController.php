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
use App\AuditChecklist;
use Yajra\DataTables\Facades\DataTables;
use DB;
use App\Imports\Import;
use Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class ImportExcelController extends Controller
{
   public function index()
    {
     $data = DB::table('auditchecklist')->orderBy('id', 'DESC')->get();
     return view('company.AuditReport.import_excel', compact('data'));
    }

   public function import(Request $request)
    {
      ini_set('memory_limit', -1);
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);
     Excel::import(new AuditChecklist(), request()->file('select_file'));
   
  
     return back()->with('success', 'Excel Data Imported successfully.');
    }

      public function importdata(Request $request)
   {
      $limit = $request->get('length');
      $start = ($request->start) * $request->length;
      $auditchecklist=AuditChecklist::where('status',['1','0'])->offset($start)->limit($limit);
      $totalrecords=AuditChecklist::where('status',['1','0'])->count();
      return DataTables::of($auditchecklist)
      ->addColumn('action', function ($auditchecklist){
      return '
      <a href="'.route('importupdate',['id'=>$auditchecklist->id]).'" class="btn btn-info btn-circle"
      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
      <a href="'.route('importdestroy',['id'=>$auditchecklist->id]).'"  class="btn btn-danger delete btn-circle sa-params"
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
public function destroy($id)
   {   
   $data=AuditChecklist::find($id);
   $data->status=2;
   $data->save();


   Session::flash('error', 'Activity Deleted Successfully');
   return redirect()->route('companyactivityview');
   }

}