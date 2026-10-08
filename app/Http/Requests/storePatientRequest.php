<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePatientRequest extends FormRequest
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
            'zydus_rep_name' => 'required|string|max:255',
            'patient_type' => 'nullable|boolean',
            'full_name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'contact_number' => 'required|string|max:15|unique:patient_enrollments,contact_number',
            'caregiver_contact_number' => 'nullable|string|max:15',
            'doctor_name' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'state' => 'required|string|max:100',
            'city'  => 'required|string|max:100',
            'pincode' => 'required|string|max:6',
            'prescription' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'govt_id' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'status' => 'nullable|integer',     
        ];
    }
}
