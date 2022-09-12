<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
            'gender'=> 'required',
            'dob'=> 'required',
            'password'=>['required', 'min:8', 'confirmed'],
            'phone' => 'required',
            'streetaddress'=>'required',
            'zipcode'=>'required',
        ];

         if(in_array($this->method(), ['PUT'])){
        $rules = [
            'name' => 'required',
            'email'=>['required','email'],
            'gender'=> 'required',
            'dob'=> 'required',
            'password'=>['required', 'min:8', 'confirmed'],
            'phone' => 'required',
            'streetaddress'=>'required',
            'zipcode'=>'required',
             ]; 
        }

        return $rules;
    }

    public function message()
    {
        return [
           'name.required' => 'Company Name is required',
           'email.required' => 'Email is required',
           'phone.required' => 'Phone is required',
           'streetaddress.required' => 'Street Address is required' ,
           'zipcode.required' => 'Zipcode is required ',
        ];
    }

}
