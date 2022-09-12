<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Tool;
use App\Invoice;
use App\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreTool;
use PDF;

class InvoiceController extends Controller{


	 public function invoicedata(Request $request){
		$limit = $request->get('length');
		$start = ($request->start) * $request->length;
		$invoice=Invoice::where('status',1)->offset($start)->limit($limit);
		$totalrecords=Invoice::where('status',1)->count();

		return DataTables::of($invoice)
		 ->addColumn('action', function ($invoice) {
				return '
					<p><a href="'.route('downloadPDF',['id'=>$invoice->id]).'" class="btn btn-info btn-circle"
					  data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-download" aria-hidden="true"></i></a></p>';
					  /* <p><a href="javascript:;" class="btn btn-danger delete btn-circle sa-params"
					  data-toggle="tooltip" data-id="' . $invoice->id . '"data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a></p>*/
			})

			->editColumn('status',
                function ($row) {
                    if($row->status==1)
                      return "Active";
                    else
                      return "Inactive";
                }
           )
		->editColumn('toolsname',function($row){
				   return nl2br($row->toolsname);
			 })
		->editColumn('company',function($row){
			$data=Company::find($row->company);
			if($data)
				   return $data->company_name;
			 })

		  
		 ->rawColumns(['action','toolsname'])
		 ->setTotalRecords($totalrecords)
		 ->make(true);
	}

	public function index()
	{
	   return view('superadmin.invoice.index');
	}
   
	/*public function store(StoreTool $request){
		$data=new Tool();
		$data->name=$request->name;
		$data->price=$request->price;
		$data->status=$request->status;
		$data->save();
		Session::flash('success', 'Modules Added Successfully');
		return redirect()->route('modules');
	}*/

	/*
	public function show(Package $package)
	{
		//
	}*/

	public function destroy(Request $request){
		$data=Tool::find($request->id);
		$data->delete();
	}

	 public function downloadPDF(Request $request){
		$pdf = PDF::loadView('superadmin.invoice.pdf',compact('request'));
		return $pdf->download('superadmin.invoice.pdf');
		//return $pdf->stream();
	}
}
