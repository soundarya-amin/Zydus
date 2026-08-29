<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePatientDetails extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             // Validate the form data
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:patient_enrollments,email',
            'contact_number' => 'required|string|max:15|unique:patient_enrollments,contact_number',
            'caregiver_contact_number' => 'nullable|string|max:15',
            'permanent_address' => 'required|string',
            'delivery_address' => 'nullable|string',
            'gender' => 'required|string|in:male,female,other',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string|max:100',
            'prescription' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'govt_id' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048|unique:patient_enrollments,govt_id',
            'consent' => 'required|boolean',
            'status' => 'nullable|integer',     
        ];
    }
}
