<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class CDocumentComment extends Model
{
	//use SoftDeletes;
    protected $table="document_comment";
    protected $fillable = ['id','document_id','comment','user_id','status'];
    // protected $attributes=['status'=>1];
}
