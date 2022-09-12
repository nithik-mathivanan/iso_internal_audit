<?php

namespace App\Http\Controllers;

use App\State;
use App\Country;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;


class StateController extends Controller
{
      public function statedata(Request $request)
    {
         $limit = $request->get('length');
        $start = ($request->start) * $request->length;
        $state=State::where('status',1)->offset($start)->limit($limit);
        $totalrecords=State::where('status',1)->count();
        return DataTables::of($state)
         ->addColumn('action', function ($user) {
                return '
                <div class="btn-group dropdown m-r-10">
                <button aria-expanded="false" data-toggle="dropdown" class="btn dropdown-toggle waves-effect waves-light" type="button"><i class="ti-more"></i></button>
                <ul role="menu" class="dropdown-menu pull-right">
                  <li><a href="'.route('editstate',['id'=>$user->id]).'" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </a></li>
                  <li><a href="Javascript:void(0);"  data-id="' . $user->id . '"  class="sa-params delete"><i class="fa fa-times" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                  </div>';
            })
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
        return view('admin.state.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country=Country::where('status',1)->get();
        return view('admin.state.create',['country'=>$country]);
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
            'country' => ['required'],
        ]);

        $data=new State();
        $data->name=$request->name;
        $data->country=$request->country;
        $data->save();
        Session::flash('success', 'State Created Successfully');
        return redirect()->route('state');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $post=State::find($request->id);
        $country=Country::where('status',1)->get();
         return view('admin.state.edit',['post'=>$post,'country'=>$country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'country' => ['required'],
        ]);
         $post=State::find($request->id);
        $post->name=$request->name;
        $post->country=$request->country;
        $post->save();
        Session::flash('success', 'State Updated Successfully');
        return redirect()->route('state');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
         $id = $_GET['id'];
      $data=State::find($id);
      $data->status=0;
      $data->save();
    }
}
