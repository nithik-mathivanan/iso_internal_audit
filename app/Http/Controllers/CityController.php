<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use App\State;
use App\Country;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{

      public function citydata(Request $request)
    {
         $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $city=City::where('status',1)->offset($start)->limit($limit);
        $totalrecords=City::where('status',1)->count();
        return DataTables::of($city)
         ->addColumn('action', function ($user) {
                return '
                <div class="btn-group dropdown m-r-10">
                <button aria-expanded="false" data-toggle="dropdown" class="btn dropdown-toggle waves-effect waves-light" type="button"><i class="ti-more"></i></button>
                <ul role="menu" class="dropdown-menu pull-right">
                  <li><a href="'.route('editcity',['id'=>$user->id]).'" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </a></li>
                  <li><a href="Javascript:void(0);"  data-id="' . $user->id . '"  class="sa-params delete"><i class="fa fa-times" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                  </div>';
            })
          ->editColumn('district',
                function ($row) {
                    $data=District::find($row->district);
                    return $data->name;
                }
            )
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
        return view('admin.city.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $district=District::where('status',1)->get();
        return view('admin.city.create',['district'=>$district]);
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
            'district' => ['required'],
        ]);

        $data=new City();
        $data->name=$request->name;
        $data->district=$request->district;
        $district=District::find($request->district);
        $data->state=$district->state;
        $state=State::find($district->state);
        $data->country=$state->country;
        $data->save();
        Session::flash('success', 'City Created Successfully');
        return redirect()->route('city');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
         $post=City::find($request->id);
        $district=District::where('status',1)->get();
        return view('admin.city.edit',['post'=>$post,'district'=>$district]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $validatedData = $request->validate([
            'name' => ['required'],
            'district' => ['required'],
        ]);
        $post=City::find($request->id);
        $post->name=$request->name;
        $post->district=$request->district;
        $district=District::find($request->district);
        $post->state=$district->state;
        $state=State::find($district->state);
        $post->country=$state->country;
        $post->save();
        Session::flash('success', 'City Updated Successfully');
        return redirect()->route('city');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $id = $_GET['id'];
      $data=City::find($id);
      $data->status=0;
      $data->save();
    }
}
