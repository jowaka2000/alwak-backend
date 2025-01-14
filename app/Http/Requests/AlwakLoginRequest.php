<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlwakLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.exists' => 'The username does not exist in our database. Try creating an account with link below or use valid username.',
            'username.required' => 'Please enter your username you used when creating an account.',
            'password.required' => 'Please enter your password',
        ];
    }
}
