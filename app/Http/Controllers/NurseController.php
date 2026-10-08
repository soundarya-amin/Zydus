<?php

namespace App\Http\Controllers;

use App\Models\NurseAssigned;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NurseController extends Controller
{
    public function index(Request $request)
    {
        try{
               if ($request->ajax()) {
                $patients = NurseAssigned::where('status', 1)->latest()->get();

                return DataTables::of($patients)

                    ->addIndexColumn()

                    ->addColumn('patient_code', function ($patient) {
                        return $patient->patientEnrollment?->patient_code ?? 'N/A';
                    })

                    ->addColumn('full_name', function ($patient) {
                        return $patient->patientEnrollment?->full_name ?? 'N/A';
                    })

                    ->addColumn('contact_number', function ($patient) {
                        return $patient->patientEnrollment?->contact_number ?? 'N/A';
                    })

                    ->addColumn('city', function ($patient) {
                        return $patient->patientEnrollment?->city ?? 'N/A';
                    })

                    ->addColumn('state', function ($patient) {
                        return $patient->patientEnrollment?->state ?? 'N/A';
                    })

                    ->editColumn('date_assigned', function ($patient) {
                        return $patient->date_assigned
                            ? $patient->date_assigned
                            : 'N/A';
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

        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Something went wrong!');
        }
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
        try{
            $nurseAssigned = NurseAssigned::findOrFail($id);

            $status = $request->input('status');

            // Update nurse assignment
            $nurseAssigned->update([
                'status' => $status,
                'updated_by' => auth()->user()?->name,
            ]);

            // Update patient enrollment
            $nurseAssigned->patientEnrollment->update([
                'status' => $status
            ]);

            return redirect()->route('admin.nurses.index')->with('success', 'Process completed successfully and status updated.');
            
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Something went wrong!');
        }
       
    }
}
