<?php

namespace App\Http\Controllers;

use App\Models\PatientEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PatientEnrollment::query()->latest();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('contact_number', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', (int) $request->status);
        }

        $patients = $query->paginate(10)->withQueryString();

        // Stats
        $totalCount = PatientEnrollment::count();
        $pendingCount = PatientEnrollment::where('status', 0)->count();
        $approvedCount = PatientEnrollment::where('status', 1)->count();

        return view('admin.patients.index', compact('patients', 'totalCount', 'pendingCount', 'approvedCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient_enroll_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Handled by PatientEnrollmentController@store
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patient = PatientEnrollment::findOrFail($id);
        return view('admin.patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $patient = PatientEnrollment::findOrFail($id);
        return view('admin.patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $patient = PatientEnrollment::findOrFail($id);

        if ($request->has('status')) {
            $patient->status = (int) $request->status;
            $patient->save();

            return redirect()->back()->with('success', 'Patient status updated successfully.');
        }

        return redirect()->route('admin.patients.list')->with('success', 'Patient updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $patient = PatientEnrollment::findOrFail($id);
        
        // Delete uploaded files if any
        if ($patient->govt_id && Storage::disk('public')->exists($patient->govt_id)) {
            Storage::disk('public')->delete($patient->govt_id);
        }
        if ($patient->prescription && Storage::disk('public')->exists($patient->prescription)) {
            Storage::disk('public')->delete($patient->prescription);
        }

        $patient->delete();

        return redirect()->route('admin.patients.list')->with('success', 'Patient enrollment record deleted successfully.');
    }
}
