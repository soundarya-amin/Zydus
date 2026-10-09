<?php

namespace App\Http\Controllers;

use App\Models\PatientEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\storePatientRequest;
use App\Http\Requests\updatePatientRequest;
use App\Models\NurseAssigned;

class PatientController extends Controller
{
    public function index(Request $request)
    {
       try{
            if ($request->ajax()) {
            $patients = PatientEnrollment::where('status', 0)->latest()->get();

            return DataTables::of($patients)

                ->addIndexColumn()

                ->editColumn('patient_code', function ($patient) {
                    return $patient->patient_code;
                })

                ->editColumn('full_name', function ($patient) {
                    return $patient->full_name;
                })

                ->editColumn('contact_number', function ($patient) {
                    return $patient->contact_number;
                })

                ->editColumn('city', function ($patient) {
                    return $patient->city;
                })

                ->editColumn('state', function ($patient) {
                    return $patient->state;
                })    

                ->editColumn('patient_type', function ($patient) {
                    return $patient->patient_type ? 'New Registration' : 'Old Registration';
                })

                ->editColumn('created_at', function ($patient) {
                    return $patient->created_at
                        ? $patient->created_at->format('d-m-Y H:i')
                        : '-';
                })

                ->editColumn('status', function ($patient) {
                    if ($patient->status == 0) {
                        return '<span class="status-badge status-pending">Pending</span>';
                    } elseif ($patient->status == 1) {
                        return '<span class="badge bg-success">Assigned to Nurse</span>';
                    } elseif ($patient->status == 2) {
                        return '<span class="status-badge status-approved">Completed</span>';
                    }

                    return '<span class="badge bg-secondary">Unknown</span>';
                })

                ->addColumn('actions', function ($patient) {
                    return '
                    <div class="d-flex justify-content-end align-items-end">
                        <div class="btn btn-sm btn-light border rounded-circle" title="View Details">
                            <a href="' . route('admin.patients.show', $patient->ref_id) . '">
                                <i class="bi bi-eye text-primary"></i>
                            </a>
                        </div>
                    </div>
                    ';
                })
                ->rawColumns(['status', 'actions'])
                ->make(true);
            }

        return view('admin.patients.index');

       } catch (\Exception $e){
           return redirect()->back()->with('error', "Something went wrong!");
       }
    }

    // public function create()
    // {
    //     // return view('admin.patients.create');
    // }

    // public function store(storePatientRequest $request)
    // {
    //     $validatedData = $request->validated();

    //     if ($request->hasFile('govt_id')) {
    //         $govtIdFile = $request->file('govt_id');
    //         $govtIdPath = $govtIdFile->store('patient_documents/govt_ids', 'public');
    //         $validatedData['govt_id'] = $govtIdPath;
    //     }

    //     if ($request->hasFile('prescription')) {
    //         $prescriptionFile = $request->file('prescription');
    //         $prescriptionPath = $prescriptionFile->store('patient_documents/prescriptions', 'public');
    //         $validatedData['prescription'] = $prescriptionPath;
    //     }

    //     $validatedData['status'] = $validatedData['status'] ?? 0;
    //     $validatedData['consent'] = $request->boolean('consent');

    //     PatientEnrollment::create($validatedData);

    //     return redirect()->back()->with('success', 'Patient enrollment details have been submitted successfully! Our care coordinator will contact you shortly.');
    // }

    public function show($ref_id)
    {
        try{
            $patient = PatientEnrollment::where('ref_id', $ref_id)->firstOrFail();
            return view('admin.patients.show', compact('patient'));
        } catch (\Exception $e){
            return redirect()->back()->with('error', "Patient not found.");
        }
    }

    public function edit($ref_id)
    {
        try {
            $patient = PatientEnrollment::where('ref_id', $ref_id)->firstOrFail();
            return view('admin.patients.edit', compact('patient'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Patient not found.');
        }
    }

    public function update(updatePatientRequest $request, $ref_id)
    {
        try{
            $patient = PatientEnrollment::where('ref_id', $ref_id)->firstOrFail();
            $patient->update([
                'full_name' => $request->full_name,
                'patient_code' => $request->patient_code,
                'contact_number' => $request->contact_number,
                'address' => $request->address,
            ]);

            return redirect()
                ->route('admin.patients.show', $patient->ref_id)
                ->with('success', 'Patient Data updated successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while updating the patient Data.');
        }

    }


    // public function destroy($ref_id)
    // {
    //     $patient = PatientEnrollment::where('ref_id', $ref_id)->firstOrFail();

    //     $patient->delete();

    //     return redirect()->route('admin.patients.index')->with('success', 'Patient enrollment record deleted successfully.');
    // }


// Update the status of a patient and assign a nurse if the status is "Assigned to Nurse".
    public function updateStatus(Request $request, $ref_id)
    {
        try{
            $request->validate([
                'status' => 'required|in:0,1,2',
                'date_assigned' => 'required|date',
            ]);

            $patient = PatientEnrollment::where('ref_id', $ref_id)->firstOrFail();

            // UPDATE existing patient
            $patient->update([
                'status' => $request->status,
            ]);

            // If status = 1, create nurse assignment
            if ($request->status == 1 || $request->status == 2) {
                NurseAssigned::create([
                    'patient_id' => $patient->id,
                    'date_assigned' => $request->date_assigned,
                    'updated_by' => auth()->user()?->name,
                    'status' => $request->status,
                ]);
            }
            return redirect()->route('admin.patients.index')->with('success', 'Patient assigned to the Nurse successfully and status updated.');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Something went wrong!');
        }
        
    }

    public function updateDocuments(Request $request, $ref_id)
    {
        try {
            $patient = PatientEnrollment::where('ref_id', $ref_id)->firstOrFail();

            $data = [];

            if ($request->hasFile('govt_id')) {

                // Delete old file
                if ($patient->govt_id) {
                    Storage::disk('public')->delete($patient->govt_id);
                }

                // Store new file
                $data['govt_id'] = $request->file('govt_id')
                    ->store('patient_documents/govt_ids', 'public');
            }

            if ($request->hasFile('prescription')) {

                // Delete old file
                if ($patient->prescription) {
                    Storage::disk('public')->delete($patient->prescription);
                }

                // Store new file
                $data['prescription'] = $request->file('prescription')
                    ->store('patient_documents/prescriptions', 'public');
            }

            // Update only the fields that were uploaded
            if (!empty($data)) {
                $patient->update($data);
            }

            return redirect()
                ->route('admin.patients.show', $patient->ref_id)
                ->with('success', 'Patient documents updated successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

}
