<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Document;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;

class DocumentController extends Controller
{

	public function getdata(Request $request){
    	 $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $user=Document::offset($start)->limit($limit);
        $totalrecords=Document::count();
        return DataTables::of($user)
         ->addColumn('action', function ($user) {
                return '
                 <p><a href="'.route('document.edit',['id'=>$user->id]).'" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                      <p><a href="javascript:;" class="btn btn-danger delete btn-circle sa-params"
                      data-toggle="tooltip" data-id="' . $user->id . '"data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a></p>';
            })
          
         ->rawColumns(['action'])
         ->setTotalRecords($totalrecords)
         ->make(true);
    }

     public function index(Request $request){
        return view('superadmin.document.index');
    }

    public function create(){
    	return view('superadmin.document.create');
    }

     public function store(Request $request){
     	 $validatedData = $request->validate([
            'name' => 'required',
        ]);
    	$data=new Document();
    	$data->name=$request->name;
    	$data->save();
    	 Session::flash('success', 'Document Name Created Successfully');
        return redirect()->route('document.index');
    }

     public function edit(Request $request){
    	$post=Document::find($request->id);
    	return view('superadmin.document.edit',['post'=>$post]);
    }

    public function update(Request $request){
    	 $validatedData = $request->validate([
            'name' => 'required',
        ]);
    	$post=Document::find($request->id);
    	$post->name=$request->name;
    	$post->save();
    	 Session::flash('success', 'Document Name Updated Successfully');
        return redirect()->route('document.index');
    }

      public function destroy(Request $request)
    {
        $data=Document::find($request->id);
        $data->delete();
    }


}
