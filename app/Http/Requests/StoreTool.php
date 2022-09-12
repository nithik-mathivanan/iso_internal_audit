<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTool extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        $rules = [
            'name' => 'required',
            'price'=>'required',
            'status'=>'required',
        ];

         if(in_array($this->method(), ['PUT'])){
            $rules = [
                'name' => 'required',
                'price'=>'required',
                'status'=>'required',
            ]; 
        }
        return $rules;
    }

     public function messages(){
        return [
           'name.required' => 'Modules Name is required',
           'price.required' => 'Price is required',
           'status.required' => 'Status is required',
        ];
    }

}
