<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientEnrollmentController extends Controller
{
     public function register(){
        return view('patient_enroll_form');
    }

    public function store(storePatientDetails $request){
       
        dd($request->all());

        // Create the patient enrollment
        PatientEnrollment::create($request->validated());
    }
}
