<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CDocument extends Model{
      protected $table="mc_documenttype";
    protected $fillable = ['id','company','type','hortname','status'];
}
