<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartment extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        $rules = [
            'name' => 'required',
            'shortname'=>'required',
            'status'=>'required',
        ];

         if(in_array($this->method(), ['PUT'])){
            $rules = [
                'name' => 'required',
                'shortname'=>'required',
                'status'=>'required',
            ]; 
        }
        return $rules;
    }

     public function messages(){
        return [
           'name.required' => 'Department Name is required',
           'shortname.required' => 'Short Name is required',
           'status.required' => 'Status is required',
        ];
    }

}
