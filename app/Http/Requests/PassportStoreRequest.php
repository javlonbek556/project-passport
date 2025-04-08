<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassportStoreRequest extends FormRequest
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
            'passport_number' => 'required|unique:passports|max:255|min:9',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date',
        ];
    }
    public function messages(): array
    {
        return [
            'passport_number.required' => 'Passport number is required',
            'passport_number.unique' => 'Passport number already exists',
            'passport_number.max' => 'Passport number must be at most 255 characters',
            'passport_number.min' => 'Passport number must be at least 9 characters',
            'issue_date.required' => 'Issue date is required',
            'issue_date.date' => 'Issue date must be a valid date',
            'expiry_date.required' => 'Expiry date is required',
            'expiry_date.date' => 'Expiry date must be a valid date',
        ];
    }
}
