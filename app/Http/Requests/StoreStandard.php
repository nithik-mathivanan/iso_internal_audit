<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStandard extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        $rules = [
            'name' => 'required',
            'status'=>'required',
        ];

         if(in_array($this->method(), ['PUT'])){
            $rules = [
                'name' => 'required',
                'status'=>'required',
            ]; 
        }
        return $rules;
    }

     public function messages(){
        return [
           'name.required' => 'Standard is required',
           'status.required' => 'Status is required',
        ];
    }

}
