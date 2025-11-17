<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveUserRequest extends FormRequest
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
        $emailRule = 'required|email|unique:users,email' . ($this->route('id') ? ',' . $this->route('id') : '');

        return [
            'firstname' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'lastname' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'middlename' => 'nullable|string|max:255|regex:/^[a-zA-Z\s]*$/',
            'email' => $emailRule,
            'birthdate' => 'required|date|after:1949-12-31|before_or_equal:today',
            'age' => 'required|integer|min:1|max:99',
            'gender' => 'required|in:male,female',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'firstname.required' => 'The first name is required.',
            'firstname.string' => 'The first name must be a string.',
            'firstname.max' => 'The first name may not be greater than 255 characters.',
            'firstname.regex' => 'The first name can only contain letters and spaces.',
            'lastname.required' => 'The last name is required.',
            'lastname.string' => 'The last name must be a string.',
            'lastname.max' => 'The last name may not be greater than 255 characters.',
            'lastname.regex' => 'The last name can only contain letters and spaces.',
            'middlename.string' => 'The middle name must be a string.',
            'middlename.max' => 'The middle name may not be greater than 255 characters.',
            'middlename.regex' => 'The middle name can only contain letters and spaces.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'birthdate.required' => 'The birthdate is required.',
            'birthdate.date' => 'The birthdate must be a valid date.',
            'birthdate.after' => 'The birthdate must be after 1949.',
            'birthdate.before_or_equal' => 'The birthdate must not be in the future.',
            'age.required' => 'The age is required.',
            'age.integer' => 'The age must be an integer.',
            'age.min' => 'The age must be at least 1.',
            'age.max' => 'The age must not be greater than 99.',
            'gender.required' => 'The gender is required.',
            'gender.in' => 'The selected gender is invalid.',
        ];
    }
}
