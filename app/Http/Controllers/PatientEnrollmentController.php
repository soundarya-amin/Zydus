<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\storePatientRequest;
use App\Models\PatientEnrollment;
use App\Models\States;

class PatientEnrollmentController extends Controller
{
    public function register()
    {
        try{
            $states = States::pluck('state');
            return view('patient_enroll_form', compact('states'));
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function store(storePatientRequest $request)
    {
        try{
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

            // Create the patient enrollment record
            PatientEnrollment::create($validatedData);

            return redirect()->back()->with('success', 'Patient enrollment details have been submitted successfully! Our care coordinator will contact you shortly.');

        }
        catch (\Exception $e) {
            // Handle the exception, log it, or return an error response
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
