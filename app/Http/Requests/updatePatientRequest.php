<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updatePatientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $refId = $this->route('ref_id');

        return [
            'full_name' => [
                'required',
                'string',
                'max:255',
            ],

            'patient_code' => [
                'required',
                'string',
                'max:255',
            ],

            'contact_number' => [
                'required',
                'string',
                'max:15',
                Rule::unique('patient_enrollments', 'contact_number')
                    ->ignore($refId, 'ref_id'),
            ],

            'address' => [
                'required',
                'string',
            ],
        ];
    }
}
