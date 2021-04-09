<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            
            'name' => 'required',
            'numberId' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'class' => 'required',
            'school' => 'required',
            'school' => 'required',


        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter a name for your app!',
            'numberId.required' => 'Please enter a numberId for your app!',
   
        ];
    }
}