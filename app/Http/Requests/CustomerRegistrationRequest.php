<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegistrationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:customers',
            'name' => 'required|string',
            'phone'=> 'required|regex:/(01)[0-9]{9}/|unique:customers',
            'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email Address is required!',
            'name.required' => 'Name is required!',
            'phone.required' => 'Phone Number is required!',
            'password.required' => 'Password is required!'
        ];
    }
}
