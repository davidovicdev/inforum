<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "username" => "required|min:3",
            "email" => "required",
            "password" => "required|min:6",
            "confirmPassword" => "required|same:password",
            "birthDate" => "required"
        ];
    }
    public function messages()
    {
        return [
            "username.required" => "Email is required",
            "username.min" => "Username needs to have at least 3 characters",
            "email.required" => "Email is required",
            "birthDate" => "required",
            "password.required" => "Password is required",
            "password.min" => "Password needs to have at least 6 characterss",
            "confirmPassword.required" => "Confirm password is required",
            "confirmPassword.same" => "Confirm passwords needs to be the same as password"
        ];
    }
}
