<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientEnrollment;
use Yajra\DataTables\Facades\DataTables;    

class CompletedPatientController extends Controller
{
   public function index(Request $request)
    {
        if ($request->ajax()) {
            $patients = PatientEnrollment::where('status', 2)->latest()->get();

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
                ->editColumn('updated_at', function ($patient) {
                    return $patient->nurseAssigned->updated_at
                        ? $patient->nurseAssigned->updated_at->format('d-m-Y')
                        : '-';
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
                                <a href="' . route('admin.completed.show', $patient->ref_id) . '">
                                    <i class="bi bi-eye text-primary"></i>
                                </a>
                            </div>
                        </div>
                    ';
                })  
              ->rawColumns(['status', 'actions'])
              ->make(true);     
        } 
        return view('admin.completed.index');  
    } 
    
    public function show($ref_id)
    {
       $patient = PatientEnrollment::with('nurseAssigned')->where('ref_id', $ref_id)->firstOrFail();
        return view('admin.completed.show', compact('patient'));
    }

}

