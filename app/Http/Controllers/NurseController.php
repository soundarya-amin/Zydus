<?php

namespace App\Http\Controllers;

use App\Models\NurseAssigned;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($request->ajax()) {
        $patients = NurseAssigned::query()->latest()->get();
        
        return DataTables::of($patients)

            ->addIndexColumn()

            ->editColumn('patient_code', function ($patient) {
                return $patient->patient_code;
            })

            ->editColumn('zydus_rep_name', function ($patient) {
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
                if ($patient->status == 0) {
                    return '<span class="badge bg-warning">Pending</span>';
                } elseif ($patient->status == 1) {
                    return '<span class="badge bg-success">Completed</span>';
                } elseif ($patient->status == 2) {
                    return '<span class="badge bg-primary">Assigned to Nurse</span>';
                }

                return '<span class="badge bg-secondary">Unknown</span>';
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NurseAssigned $nurseAssigned)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NurseAssigned $nurseAssigned)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NurseAssigned $nurseAssigned)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NurseAssigned $nurseAssigned)
    {
        //
    }
}
