<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class CDocumentHistory extends Model
{
	//use SoftDeletes;
    protected $table="document_history";
    protected $fillable = ['id','document_id','document','user_id','status'];
    // protected $attributes=['status'=>1];
}
