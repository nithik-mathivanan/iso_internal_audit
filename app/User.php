<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


      public function isOfType($type)
    {
        $value=Auth::user()->role;
        $status=Auth::user()->status;
        if($value==0)
            $usertype = 'superadmin';
        if($value==1)
             $usertype = 'admin';
        if($value==2)
             $usertype = 'staff';
        if($value==3)
             $usertype = 'client';
		if($value==6&&$status=='head')
		$usertype = 'head'; 
		if($value==4&&$status=='company')
		$usertype = 'company'; 
		if($value==5)
             $usertype = 'topmanagement';
		if($value==6&&$status=='audit')
		$usertype = 'audit';
		
        return $type == $usertype;
    }
}
