@extends('layouts.admin_dashboard')

@section('title', 'Patient Enrollments | RxPONT Admin')

@section('content')

<!-- Page Title & Header -->
<div class="page-header-wrapper mb-4">
    <div class="page-title-box">
        <div class="page-title-icon" style="background: linear-gradient(135deg, #b66dff, #8444e0);">
            <i class="bi bi-people-fill"></i>
        </div>
        <div>
            <h2 class="page-title-text mb-0">Patient Enrollments</h2>
            <span class="text-muted small">Manage and review patient applications for Diasens CGM therapy</span>
        </div>
    </div>

    <div>
        <a href="{{ route('admin.patients.create') }}" class="btn btn-success rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Enroll New Patient
        </a>
    </div>
</div>

<!-- Flash Alerts -->
@if(session('success'))
    <div class="alert alert-success d-flex align-items-center gap-2 rounded-4 py-3 px-4 mb-4 border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill fs-5 text-success"></i>
        <div>{{ session('success') }}</div>
    </div>
@endif

<!-- Quick Metrics Overview -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="p-3 bg-white rounded-3 border d-flex align-items-center justify-content-between shadow-sm">
            <div>
                <span class="text-muted small d-block">Total Registered</span>
                <h4 class="mb-0 fw-bold" style="color: #0A2233;">{{ number_format($totalCount) }}</h4>
            </div>
            <div class="p-3 rounded-circle" style="background: rgba(182, 109, 255, 0.12); color: #b66dff;">
                <i class="bi bi-people fs-4"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="p-3 bg-white rounded-3 border d-flex align-items-center justify-content-between shadow-sm">
            <div>
                <span class="text-muted small d-block">Pending Verifications</span>
                <h4 class="mb-0 fw-bold text-warning">{{ number_format($pendingCount) }}</h4>
            </div>
            <div class="p-3 rounded-circle bg-warning-subtle text-warning">
                <i class="bi bi-hourglass-split fs-4"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="p-3 bg-white rounded-3 border d-flex align-items-center justify-content-between shadow-sm">
            <div>
                <span class="text-muted small d-block">Approved &amp; Active</span>
                <h4 class="mb-0 fw-bold text-success">{{ number_format($approvedCount) }}</h4>
            </div>
            <div class="p-3 rounded-circle bg-success-subtle text-success">
                <i class="bi bi-check-circle fs-4"></i>
            </div>
        </div>
    </div>
</div>

<!-- Main Table Card -->
<div class="admin-card">

    <!-- Patients Data Table -->
    <div class="table-responsive">
        <table class="table table-hover align-middle table-custom" id="patientsTable">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Patient Name</th>
                    <th>Email ID</th>
                    <th>Contact Number</th>
                    <th>Caregiver Contact</th>
                    <th>Permanent Address</th>
                    <th>Delivery Address</th>
                    <th>Govt ID Photo</th>
                    <th>Prescription</th>
                    <th>Enrolled Date</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#patientsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.patients.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'full_name', name: 'full_name' },
                { data: 'email', name: 'email' },
                { data: 'contact_number', name: 'contact_number' },
                { data: 'caregiver_contact_number', name: 'caregiver_contact_number' },
                { data: 'permanent_address', name: 'permanent_address' },
                { data: 'delivery_address', name: 'delivery_address' },
                { data: 'govt_id', name: 'govt_id', orderable: false, searchable: false },
                { data: 'prescription', name: 'prescription', orderable: false, searchable: false },
                { data: 'created_at', name: 'created_at' },
                { data: 'status', name: 'status' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush