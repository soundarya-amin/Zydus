<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updatePatientRequest extends FormRequest
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
        $patientId = $this->route('id');

        return [
            'full_name' => 'required|string|max:255',
            'email' => ['required', 'email',Rule::unique('patient_enrollments', 'email')->ignore($patientId)],
            'contact_number' => ['required', 'string', 'max:15', Rule::unique('patient_enrollments', 'contact_number')->ignore($patientId)],
            'caregiver_contact_number' => 'nullable|string|max:15',
            'permanent_address' => 'required|string',
            'delivery_address' => 'nullable|string',
            'gender' => 'required|string|in:male,female,other',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string|max:100',
            'prescription' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'govt_id' => ['nullable','file','mimes:pdf,jpg,jpeg,png','max:2048',Rule::unique('patient_enrollments', 'govt_id')->ignore($patientId),],
            'status' => 'nullable|integer',  
        ];
    }
}
