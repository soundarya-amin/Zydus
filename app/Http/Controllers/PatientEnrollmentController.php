<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\storePatientRequest;
use App\Models\PatientEnrollment;

class PatientEnrollmentController extends Controller
{
    public function register()
    {
        return view('patient_enroll_form');
    }

    public function store(storePatientRequest $request)
    {

        // dd($request->all());
        $validatedData = $request->validated();

        // Handle govt_id upload
        if ($request->hasFile('govt_id')) {
            $govtIdFile = $request->file('govt_id');
            $govtIdPath = $govtIdFile->store('patient_documents/govt_ids', 'public');
            $validatedData['govt_id'] = $govtIdPath;
        }

        // Handle prescription upload
        if ($request->hasFile('prescription')) {
            $prescriptionFile = $request->file('prescription');
            $prescriptionPath = $prescriptionFile->store('patient_documents/prescriptions', 'public');
            $validatedData['prescription'] = $prescriptionPath;
        }

        $validatedData['status'] = $validatedData['status'] ?? 0;
        $validatedData['patient_code'] = $this->generatePatientCode();

        // Create the patient enrollment record
        PatientEnrollment::create($validatedData);

        return redirect()->back()->with('success', 'Patient enrollment details have been submitted successfully! Our care coordinator will contact you shortly.');
    }

    private function generatePatientCode(): string
    {
        return 'ZYD-' . str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }



}
