<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HospitalRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:20',
            'address' => 'required|string|max:1000',
            'specialties' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'hospital_name.required' => 'The hospital name field is required.',
            'email.required' => 'The email field is required.',
            'contact_number.required' => 'The contact number field is required.',
            'address.required' => 'The address field is required.',
            'specialties.required' => 'The specialties field is required.',
            'website.url' => 'The website field must be a valid URL.',
        ];
    }
}
