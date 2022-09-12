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
        elseif($role == 3)
            return redirect()->route('client');
		elseif($role == 4)
            return redirect()->route('company');
		elseif($role == 5)
            return redirect()->route('topmanagement');
		elseif($role == 6 || $role == 2){
            $access = Controller::get_access(Auth::user()->id);

            if($access==0){
                 return redirect()->route('audit'); 
            }
            elseif($access==2){
                 print_r('staff but no access');
                 exit;
            }
            else{ 
                if(Auth::user()->role == 6){                  
                    return redirect()->route('audit');  
                }
                else{
                  
                    if($access[0]=='preparator'){
                        return redirect()->route('preparator-document');
                    }
                    elseif($access[0]=='reviewer'){
                        return redirect()->route('reviewer-document');
                    }
                    elseif($access[0]=='approver'){
                        return redirect()->route('approver-document');
                    }
                                       
                }   
            }
        }	
    }
    
}
