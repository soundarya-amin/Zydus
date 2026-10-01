<?php

namespace App\Http\Controllers;

use App\Models\PatientEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\storePatientRequest;
use App\Http\Requests\updatePatientRequest;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        // Patients count statistics
        $totalCount = PatientEnrollment::count();
        $pendingCount = PatientEnrollment::where('status', 0)->count();
        $approvedCount = PatientEnrollment::where('status', 1)->count();

       if ($request->ajax()) {
        $patients = PatientEnrollment::query()->latest()->get();
        
        return DataTables::of($patients)

            ->addIndexColumn()

            ->editcolumn('zydus_rep_name', function ($patient) {
                return $patient->zydus_rep_name;
            })

            ->editColumn('patient_type', function ($patient) {
                return $patient->patient_type;
            })

            ->editColumn('full_name', function ($patient) {
                return $patient->full_name;
            })

            ->editColumn('email', function ($patient) {
                return $patient->email;
            })

            ->editColumn('contact_number', function ($patient) {
                return $patient->contact_number;
            })

            ->editColumn('caregiver_contact_number', function ($patient) {
                return $patient->caregiver_contact_number;
            })

            ->editColumn('doctor_name', function ($patient) {
                return $patient->doctor_name;
            })

            ->editColumn('address', function ($patient) {
                return $patient->address;
            })

            ->editColumn('state', function ($patient) {
                return $patient->state;
            })      

            ->editColumn('prescription', function ($patient) {
                if ($patient->prescription) {
                    return '<a href="' . asset('storage/' . $patient->prescription) . '" target="_blank"> <img src="' . asset('storage/' . $patient->prescription) . '" alt="Prescription" class="img-fluid" style="max-height: 100px;"></a>';
                }
                return 'N/A';
            })

            ->editColumn('govt_id', function ($patient) {
                if ($patient->govt_id) {
                    return '<a href="' . asset('storage/' . $patient->govt_id) . '" target="_blank"> <img src="' . asset('storage/' . $patient->govt_id) . '" alt="Govt ID" class="img-fluid" style="max-height: 100px;"></a>';
                }
                return 'N/A';
            })

            ->editColumn('status', function ($patient) {
                if ($patient->status == 1) {
                    return '<span class="badge bg-success">Approved</span>';
                }

                return '<span class="badge bg-warning">Pending</span>';
            })

            ->editColumn('created_at', function ($patient) {
                return $patient->created_at
                    ? $patient->created_at->format('d-m-Y H:i')
                    : '-';
            })

             ->addColumn('actions', function ($patient) {
                return '
                <div class="d-flex justify-content-end align-items-end">
                    <div class="btn btn-sm btn-light border rounded-circle" title="View Details">
                        <a href="' . route('admin.patients.show', $patient->id) . '">
                            <i class="bi bi-eye text-primary"></i>
                        </a>
                    </div>
                </div>
                ';
            })
            ->rawColumns(['prescription', 'govt_id', 'status', 'actions'])
            ->make(true);
        }

        return view('admin.patients.index',compact('totalCount','pendingCount','approvedCount'));
    }

    public function create()
    {
        // return view('admin.patients.create');
    }

    public function store(storePatientRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('govt_id')) {
            $govtIdFile = $request->file('govt_id');
            $govtIdPath = $govtIdFile->store('patient_documents/govt_ids', 'public');
            $validatedData['govt_id'] = $govtIdPath;
        }

        if ($request->hasFile('prescription')) {
            $prescriptionFile = $request->file('prescription');
            $prescriptionPath = $prescriptionFile->store('patient_documents/prescriptions', 'public');
            $validatedData['prescription'] = $prescriptionPath;
        }

        $validatedData['status'] = $validatedData['status'] ?? 0;
        $validatedData['consent'] = $request->boolean('consent');

        PatientEnrollment::create($validatedData);

        return redirect()->back()->with('success', 'Patient enrollment details have been submitted successfully! Our care coordinator will contact you shortly.');
    }

    public function show($id)
    {
        $patient = PatientEnrollment::findOrFail($id);
        return view('admin.patients.show', compact('patient'));
    }

    public function edit($id)
    {
        $patient = PatientEnrollment::findOrFail($id);
        return view('admin.patients.edit', compact('patient'));
    }

   public function update(UpdatePatientRequest $request, $id)
{
    $patient = PatientEnrollment::findOrFail($id);

    $patient->update([
        'full_name' => $request->full_name,
        'email' => $request->email,
        'contact_number' => $request->contact_number,
        'caregiver_contact_number' => $request->caregiver_contact_number,
        'address' => $request->address,
        'status'  => $request->status,
    ]);

    if ($request->hasFile('prescription')) {
        $file = $request->file('prescription');

        $filename = uniqid() . '_prescription.' .
            $file->getClientOriginalExtension();

        $file->move(
            public_path('storage/patient_documents/prescriptions'),
            $filename
        );

        $patient->prescription = 'patient_documents/prescriptions/' . $filename;
    }

    if ($request->hasFile('govt_id')) {
        $file = $request->file('govt_id');

        $filename = uniqid() . '_govt_id.' .
            $file->getClientOriginalExtension();

        $file->move(
            public_path('storage/patient_documents/govt_ids'),
            $filename
        );

        $patient->govt_id = 'patient_documents/govt_ids/' . $filename;
    }

    $patient->save();

    return redirect()
        ->route('admin.patients.index')
        ->with('success', 'Patient updated successfully.');
}


    public function destroy($id)
    {
        $patient = PatientEnrollment::findOrFail($id);

        $patient->delete();

        return redirect()->route('admin.patients.index')->with('success', 'Patient enrollment record deleted successfully.');
    }

    public function updateStatus(Request $request, Patient $patient)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);

        $patient->status = $request->status;
        $patient->save();

        return back()->with('success', 'Patient status updated successfully.');
    }

}
