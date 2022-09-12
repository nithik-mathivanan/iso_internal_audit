<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class CDocumentUpload extends Model
{
	//use SoftDeletes;
    protected $table="document_upload";
     protected $fillable = ['id','document_type','document_name','document','document_status','status'];
    // protected $attributes=['status'=>1];
}
