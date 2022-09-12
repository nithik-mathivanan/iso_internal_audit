<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function countrydata(Request $request)
    {
         $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $country=Country::where('status',1)->offset($start)->limit($limit);
        $totalrecords=Country::where('status',1)->count();
        return DataTables::of($country)
         ->addColumn('action', function ($user) {
                return '
                <div class="btn-group dropdown m-r-10">
                <button aria-expanded="false" data-toggle="dropdown" class="btn dropdown-toggle waves-effect waves-light" type="button"><i class="ti-more"></i></button>
                <ul role="menu" class="dropdown-menu pull-right">
                  <li><a href="'.route('editcountry',['id'=>$user->id]).'" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </a></li>
                  <li><a href="Javascript:void(0);"  data-id="' . $user->id . '"  class="sa-params delete"><i class="fa fa-times" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                  </div>';
            })
          
         ->rawColumns(['action'])
         ->setTotalRecords($totalrecords)
            ->make(true);
    }

    public function index()
    {
        return view('admin.country.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.country.create');
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
            'code' => ['required'],
        ]);

        $data=new Country();
        $data->name=$request->name;
        $data->code=$request->code;
        $data->save();
        Session::flash('success', 'Country Created Successfully');
        return redirect()->route('country');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
         $post=Country::find($request->id);
         return view('admin.country.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'code' => ['required'],
        ]);
        $post=Country::find($request->id);
        $post->name=$request->name;
        $post->code=$request->code;
        $post->save();
        Session::flash('success', 'Country Updated Successfully');
        return redirect()->route('country');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $id = $_GET['id'];
      $data=Country::find($id);
      $data->status=0;
      $data->save();
    }
}
