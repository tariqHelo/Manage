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
            // 'name' => 'required',
            // 'email' => 'required',
            // 'mobile' => 'required',
            // 'numberId' => 'required',
            // 'class' => 'required',
            // 'school' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter a fname for your blog!',
            'numberId.required' => 'Please enter a summary for your blog!',
            'email' => 'required',
            'mobile' => 'required',
            'password' => 'required',
        ];
    }
}
