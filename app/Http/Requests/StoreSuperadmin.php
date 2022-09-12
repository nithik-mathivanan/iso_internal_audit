<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuperadmin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       $rules = [
            'name' => 'required',
            'email'=>['required','email'],
            'password'=>['required', 'min:8', 'confirmed'],
            'phone'=>'required'
        ];

         if(in_array($this->method(), ['PUT'])){
        $rules = [
         'name' => 'required',
            'email'=>['required','email'],
            'password'=>['required', 'min:8', 'confirmed'],
            'phone'=>'required'
             ]; 
        }

        return $rules;
    }
}
