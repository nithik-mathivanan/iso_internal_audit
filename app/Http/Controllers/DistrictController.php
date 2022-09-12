<?php

namespace App\Http\Controllers;

use App\District;
use App\State;
use App\Country;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;

class DistrictController extends Controller
{

       public function districtdata(Request $request)
    {
         $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $district=District::where('status',1)->offset($start)->limit($limit);
        $totalrecords=District::where('status',1)->count();
        return DataTables::of($district)
         ->addColumn('action', function ($user) {
                return '
                <div class="btn-group dropdown m-r-10">
                <button aria-expanded="false" data-toggle="dropdown" class="btn dropdown-toggle waves-effect waves-light" type="button"><i class="ti-more"></i></button>
                <ul role="menu" class="dropdown-menu pull-right">
                  <li><a href="'.route('editdistrict',['id'=>$user->id]).'" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </a></li>
                  <li><a href="Javascript:void(0);"  data-id="' . $user->id . '"  class="sa-params delete"><i class="fa fa-times" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                  </div>';
            })
         ->editColumn('state',
                function ($row) {
                    $data=State::find($row->state);
                    return $data->name;
                }
            )
          ->editColumn('country',
                function ($row) {
                    $data=Country::find($row->country);
                    return $data->name;
                }
            )
         ->rawColumns(['action'])
         ->setTotalRecords($totalrecords)
            ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.district.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $state=State::where('status',1)->get();
        return view('admin.district.create',['state'=>$state]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'name' => ['required'],
            'state' => ['required'],
        ]);

        $data=new District();
        $data->name=$request->name;
        $data->state=$request->state;
        $state=State::find($request->state);
        $data->country=$state->country;
        $data->save();
        Session::flash('success', 'District Created Successfully');
        return redirect()->route('district');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $post=District::find($request->id);
        $state=State::where('status',1)->get();
        return view('admin.district.edit',['post'=>$post,'state'=>$state]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
          $validatedData = $request->validate([
            'name' => ['required'],
            'state' => ['required'],
        ]);
          $post=District::find($request->id);
        $post->name=$request->name;
        $post->state=$request->state;
        $state=State::find($request->state);
        $post->country=$state->country;
        $post->save();
        Session::flash('success', 'District Updated Successfully');
        return redirect()->route('district');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
         $id = $_GET['id'];
      $data=District::find($id);
      $data->status=0;
      $data->save();
    }
}
