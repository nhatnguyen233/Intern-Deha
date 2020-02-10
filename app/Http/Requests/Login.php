<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Email;

class Login extends FormRequest
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
            'email' => ['required', new Email()],
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required enter',
            'password.required' => 'Password is required enter',
        ];
    }
}
