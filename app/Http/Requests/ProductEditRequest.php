<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;

class ProductEditRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cat_id' => 'required|numeric',
            'product_name' => 'required|max:128',
            'price' => 'required|min:1|max:999999999',
            'detail' => 'required|max:255',
        ];
    }

    public function validated($data)
    {
        return Validator::make($data, $this->rules(), $this->messages())->validate();
    }

    /**
     * Config validation messages return
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cat_id.required' => 'The Category id required',
            'cat_id.numeric' => 'The Category id must is numeric',
            'product_name.required' => 'The name is  required',
            'product_name.max' => 'The name max 128 charecter',
            'price.min' => 'The price min is 1 ',
            'price.max' => 'The price min is 999999999 ',
            'price.required' => 'The price is required',
            'detail.required' => 'The detail required',
            'detail.max' => 'The detail max 255 charecter',
        ];
    }
}
