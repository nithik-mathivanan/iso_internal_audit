<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\User;
use Auth;
use App\Access;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function get_access($user_id){
        $user = User::where('id',$user_id)->first();
        $prep = Access::where('preparator',$user->designation)->where('company',$user->company_id)->first();
        $rev = Access::where('reviewer',$user->designation)->where('company',$user->company_id)->first();
        $apr = Access::where('approver',$user->designation)->where('company',$user->company_id)->first();
        $access=[];

        if($prep){
            array_push($access,'preparator');
        }
        if($rev){
            array_push($access,'reviewer');
        }
        if($apr){
            array_push($access,'approver');
        }

        if(empty($access)){
            if(Auth::user()->role == 6){
                $access = 0;
            }
            elseif (Auth::user()->role == 2) {
                $access=2;
            }
            
        }
        
        return $access;
    }
    
}
