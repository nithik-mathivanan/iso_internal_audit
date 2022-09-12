<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Document;
use App\DocumentTemplate;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;

class DocumentTemplateController extends Controller
{

	public function getdata(Request $request){
    	 $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $user=DocumentTemplate::offset($start)->limit($limit);
        $totalrecords=DocumentTemplate::count();
        return DataTables::of($user)
         ->addColumn('action', function ($user) {
                return '
                <p><a href="'.route('document-template.view',['id'=>$user->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-eye" aria-hidden="true"></i></a></p>
                 <p><a href="'.route('document-template.edit',['id'=>$user->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                      <p><a href="javascript:;" class="btn btn-danger delete btn-circle sa-params"
                      data-toggle="tooltip" data-id="' . $user->id . '"data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a></p>';
            })

         ->editColumn('name',
                function ($row) {
                   $document=Document::find($row->document_id);
                    return $document->name;
                }
            )
          
         ->rawColumns(['action'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }

    public function index(){
    	 return view('superadmin.document-template.index');
    }

    public function create(){
    	$data=Document::all();
    	return view('superadmin.document-template.create',['document'=>$data]);
    }

    public function store(Request $request){
 $validatedData = $request->validate([
            'name' => 'required',
            'content'=>'required',
        ]);
    	$data=new DocumentTemplate();
    	$data->document_id=$request->name;
    	$data->content=$request->content;
    	$data->save();
    	Session::flash('success', 'Template Created Successfully');
        return redirect()->route('document-template.index');
    }

    public function edit(Request $request){
		$data=Document::all();
		$post=DocumentTemplate::find($request->id);
    	return view('superadmin.document-template.edit',['document'=>$data,'post'=>$post]);
    }

     public function update(Request $request){
     	$validatedData = $request->validate([
            'name' => 'required',
            'content'=>'required',
        ]);
	$post=DocumentTemplate::find($request->id);
	$post->document_id=$request->name;
    	$post->content=$request->content;
    	$post->save();
    	Session::flash('success', 'Template Updated Successfully');
        return redirect()->route('document-template.index');
	}

	public function show(Request $request){
		$post=DocumentTemplate::find($request->id);
		$data=Document::find($post->document_id);
    	return view('superadmin.document-template.show',['document'=>$data,'post'=>$post]);
    }

	 public function destroy(Request $request)
    {
        $data=DocumentTemplate::find($request->id);
        $data->delete();
    }
}
