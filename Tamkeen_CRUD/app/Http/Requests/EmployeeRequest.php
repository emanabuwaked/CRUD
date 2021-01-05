<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        return [
            'first_name' =>'required |max:50',
            'last_name' =>'required |max:50',
            'phone' =>'required |max:50',
            'email' =>'required |max:50', 
            'gender' =>'required |max:1', 
            'employee_number' =>'required |max:50', 
            'department_id'  =>'required'  ,
            'image'=>'image'
        ];
    }
}