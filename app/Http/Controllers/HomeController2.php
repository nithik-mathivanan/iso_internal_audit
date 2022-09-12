<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
	
        $role=Auth::user()->role;
        $status=Auth::user()->status;
       if($role == 0 )
        return redirect()->route('superadmin.login');
       elseif($role == 1)
        return redirect()->route('admin');    
       elseif($role == 2)
        return redirect()->route('employee');
       elseif($role == 3)
        return redirect()->route('client');
		elseif($role == 4)
        return redirect()->route('company');
		elseif($role == 5)
        return redirect()->route('topmanagement');
		elseif($role == 6)
		if($status=='head')
        return redirect()->route('head');
    
		elseif($status=='audit')		
        return redirect()->route('audit');

    
	
}
