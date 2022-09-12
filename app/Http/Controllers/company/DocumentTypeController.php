<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CDocument;
use App\User;
use DB;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class DocumentTypeController extends Controller
{

    public function index()
    {
		$user = Auth::user();
		$companyid=$user->company_id;
		$document=CDocument::where('company',$companyid)->where('status',['1','0'])->orderBy('id','desc')->get();
        
        return view('company.Document.view',compact('document'))->with('sno',$sno=1);
		
    }
	
	  public function documentdata(Request $request){

        $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $document=CDocument::where('status',['1','0'])->offset($start)->limit($limit);
        $totalrecords=CDocument::where('status',['1','0'])->count();
       
        return DataTables::of($document)
        ->addColumn('action', function ($document){
                return '
                 <a href="'.route('companydocumentupdate',['id'=>$document->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <a href="'.route('companydocumentdel',['id'=>$document->id]).'"  class="btn btn-danger delete btn-circle sa-params"
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
		$document = CDocument::all();
        return view('company.Document.create',compact('document'));
		
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.document');
 
    }

	

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
		
        $this->validate($request,[
    			'name'  => 'required',
    			'shortname' => 'required',
				'status' => 'required',
                'document_template' => 'mimes:docx',
    	]);

        $filename =  date('his').$request->file('document_template')->getClientOriginalName();
        $document_file = $request->document_template; 
		$document_file->move(public_path().'/document_type',$filename);
        
        $document = new CDocument;
		$user = Auth::user();
		$document->company=$user->company_id;
		$document->type=$request->name;
		$document->shortname=$request->shortname;
        $document->status=$request->status;
        $document->template = $filename;
        $document->save();

		Session::flash('success', 'Document Added Successfully');
		return redirect()->route('companydocumentview');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id){
		$user = Auth::user();
		$companyid=$user->company_id;
		$document=CDocument::where('id',$id)->get();        
        return view('company.Document.update',compact('document'));
	}

	public function edit(Request $request){
        $document=CDocument::find($request->id);
        if($request->hasFile('document_template')) {
            $filename =  date('his').$request->file('document_template')->getClientOriginalName();
            $document_file = $request->document_template; 
            $document_file->move(public_path().'/document_type',$filename);
            $document->template = $filename;
        }
        $document->type=$request->name;
        $document->shortname=$request->shortname;
        $document->status=$request->status;
        
        $document->save();
       
        Session::flash('success', 'Document Updated Successfully');
        return redirect()->route('companydocumentview');
    }

  
    
    public function destroy($id)
    {   
		$data=CDocument::find($id);
        $data->status=2;
        $data->save();
 
     
        Session::flash('error', 'Document Deleted Successfully');
        return redirect()->route('companydocumentview');
    }
}
