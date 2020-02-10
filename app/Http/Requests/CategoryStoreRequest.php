<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'cat_name' => 'required|max:128',
        ];
    }

    /**
     * Config validation messages return
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cat_name.required' => 'The categories name id required',
            'cat_name.max' => 'The categories name max is 128 ',
        ];
    }
}
