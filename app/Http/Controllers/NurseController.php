<?php

namespace App\Http\Controllers;

use App\Models\NurseAssigned;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $patients = NurseAssigned::where('status', 1)->latest()->get();
            
            return DataTables::of($patients)

                ->addIndexColumn()

                ->editColumn('patient_code', function ($patient) {
                    return $patient->patientEnrollment->patient_code;
                })

                ->editColumn('full_name', function ($patient) {
                    return $patient->patientEnrollment->full_name;
                })

                ->editColumn('contact_number', function ($patient) {
                    return $patient->patientEnrollment->contact_number;
                })

                ->editColumn('city', function ($patient) {
                    return $patient->patientEnrollment->city;
                })

                ->editColumn('state', function ($patient) {
                    return $patient->patientEnrollment->state;
                })

                ->editColumn('status', function ($patient) {
                    if ($patient->status == 0) {
                        return '<span class="badge bg-warning">Pending</span>';
                    } elseif ($patient->status == 1) {
                        return '<span class="badge bg-warning">Assigned to Nurse</span>';
                    } elseif ($patient->status == 2) {
                        return '<span class="badge bg-success">Completed</span>';
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
                            <a href="' . route('admin.nurses.show', $patient->id) . '">
                                <i class="bi bi-eye text-primary"></i>
                            </a>
                        </div>
                    </div>
                    ';
                })
                ->rawColumns(['status', 'actions'])
                ->make(true);
            }


        return view('admin.nurses.index');
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
    public function show($id)
    {
        $patient = NurseAssigned::with('patientEnrollment')->findOrFail($id);
        return view('admin.nurses.show', compact('patient'));
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

   public function updateStatus(Request $request, $id)
{
    $nurseAssigned = NurseAssigned::findOrFail($id);

    $status = $request->input('status');

    // Update nurse assignment
    $nurseAssigned->update([
        'status' => $status
    ]);

    // Update patient enrollment
    $nurseAssigned->patientEnrollment->update([
        'status' => $status
    ]);

    return redirect()->route('admin.nurses.index')->with('success', 'Patient Process completed successfully and status updated.');
}
}
