<?php

namespace App\Http\Requests\Students;
use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'title' => 'required',
            'summary' => 'required',
            'details' => 'required',
            'imageFile' => 'image',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter a title for your blog!',
            'summary.required' => 'Please enter a summary for your blog!',
            'category_id' => 'required',
            'user_id' => 'required',
            'details' => 'required',
            'summary' => 'required',
            'imageFile' => 'image',
        ];
    }
}
