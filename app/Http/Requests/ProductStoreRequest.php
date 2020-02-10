<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
        'cat_id' => 'required|numeric|exists:categories,id',
        'product_name' => 'required|max:128',
        'price' => ['required', 'int', 'min:1', 'max:99999999'],
        'detail' => 'required|max:255',
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
        'cat_id.required' => 'The Category id required',
        'cat_id.numeric' => 'The Category id must is numeric',
        'cat_id.exists' => 'The Category do not exists',
        'product_name.required' => 'The name is  required',
        'product_name.max' => 'The name max 128 charecter',
        'price.min' => 'The price min is 1 ',
        'price.max' => 'The price max is 99,999,999 ',
        'price.int' => 'The price is integer',
        'price.required' => 'The price is required',
        'detail.required' => 'The detail required',
        'detail.max' => 'The detail max 255 charecter',
    ];
}
}
