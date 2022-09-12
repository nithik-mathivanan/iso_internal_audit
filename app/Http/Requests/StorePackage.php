<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackage extends FormRequest
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
            'max_employees'=>'required',
            'max_storage_size'=>'required',
            'storage_unit'=>'required',
            'annual_price' => 'required',
            'monthly_price'=>'required',
            'description'=>'required',
        ];

         if(in_array($this->method(), ['PUT'])){
        $rules = [
           'name' => 'required',
            'max_employees'=>'required',
            'max_storage_size'=>'required',
            'storage_unit'=>'required',
            'annual_price' => 'required',
            'monthly_price'=>'required',
            'description'=>'required',
             ]; 
        }

        return $rules;
    }

     public function message()
    {
        return [
           'name.required' => 'Package Name is required',
           'max_employees.required' => 'Maximum Employees is required',
           'max_storage_size.required' => 'Maximum Storage Size is required',
           'storage_unit.required' => 'Storage Unit is required',
           'annual_price.required' => 'Annual Price is required',
           'monthly_price.required' => 'Monthly Price is required' ,
           'description.required' => 'Description is required ',
        ];
    }

}
