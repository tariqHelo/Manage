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
            'fname' => 'required',
            'sname' => 'required',
            'tname' => 'required',
            'lname' => 'required',
            'number' => 'required',

            'class' => 'required',
            'school' => 'required',
            'status' => 'required',

            'email' => 'required',
            'mobile' => 'required',
            'password' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'fname.required' => 'Please enter a fname for your blog!',
            'sname.required' => 'Please enter a sname for your blog!',
            'tname.required' => 'Please enter a tname for your blog!',
            'lname.required' => 'Please enter a lname for your blog!',
            'number.required' => 'Please enter a summary for your blog!',
            'email' => 'required',
            'mobile' => 'required',
            'password' => 'required',
        ];
    }
}
