<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model{

      protected $table="mc_access";

      public function department(){
        return $this->hasOne('App\CDepartment','id','dept');
      }

      public function prepare(){
        return $this->hasOne('App\CDesignation','id','preparator');
      }

      public function review(){
        return $this->hasOne('App\CDesignation','id','reviewer');
      }

      public function approve(){
        return $this->hasOne('App\CDesignation','id','approver');
      }
}
