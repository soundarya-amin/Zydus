@extends('layouts.admin_dashboard');

@section('title', 'Enroll New Patient | RxPONT Admin')

@section('content')

<div class="card p-4 shadow-sm rounded-4 border-0" style="background: #F8FBFC;">
    <div class="card-header mb-4 d-flex align-items-center justify-content-between" style="background: #F8FBFC; border-bottom: 1px solid #E0E0E0;">
        <h5 class="card-title fw-bold mb-0" style="color: #0A2233;">
            <i class="bi bi-person-plus text-primary me-2"></i> View Patient Details
        </h5>
        <a href="{{ route('admin.patients.index') }}" class="btn btn-outline-secondary rounded-pill px-4 shadow-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Enrollments
        </a>
    </div>
    <div>
         <div class="row g-3">
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Full Name</span>
                        <strong class="fs-6">{{ $patient->full_name }}</strong>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Email Address</span>
                        <strong>{{ $patient->email }}</strong>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Patient Contact</span>
                        <strong>+91 {{ $patient->contact_number }}</strong>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Caregiver Contact</span>
                        <strong>{{ $patient->caregiver_contact_number ? '+91 ' . $patient->caregiver_contact_number : 'N/A' }}</strong>
                    </div>
                    <div class="col-md-4">
                        <span class="text-muted small d-block">Gender</span>
                        <strong class="text-capitalize">{{ $patient->gender ?? 'N/A' }}</strong>
                    </div>
                    <div class="col-md-4">
                        <span class="text-muted small d-block">Date of Birth</span>
                        <strong>{{ $patient->date_of_birth ? \Carbon\Carbon::parse($patient->date_of_birth)->format('d M, Y') : 'N/A' }}</strong>
                    </div>
                    <div class="col-md-4">
                        <span class="text-muted small d-block">Nationality</span>
                        <strong>{{ $patient->nationality ?? 'Indian' }}</strong>
                    </div>
                    <div class="col-12">
                        <span class="text-muted small d-block">Permanent Address</span>
                        <div class="p-2 bg-light rounded border small">{{ $patient->permanent_address ?? 'N/A' }}</div>
                    </div>
                    <div class="col-12">
                        <span class="text-muted small d-block">Device / Medicine Delivery Address</span>
                        <div class="p-2 bg-light rounded border small">{{ $patient->delivery_address ?? 'Same as permanent address' }}</div>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Government ID Proof</span>
                        @if($patient->govt_id)
                            <a href="{{ asset('storage/' . $patient->govt_id) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-1">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Open Govt ID Document
                            </a>
                        @else
                            <span class="text-muted">Not uploaded</span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Prescription Document</span>
                        @if($patient->prescription)
                            <a href="{{ asset('storage/' . $patient->prescription) }}" target="_blank" class="btn btn-sm btn-outline-info mt-1">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Open Prescription
                            </a>
                        @else
                            <span class="text-muted">Not uploaded</span>
                        @endif
                    </div>
                </div>
    </div>
</div>


@endsection

