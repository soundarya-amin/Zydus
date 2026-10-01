@extends('layouts.admin_dashboard')

@section('content')

<!-- Page Title & Header -->
<div class="page-header-wrapper mb-4">
    <div class="page-title-box">
        <div class="page-title-icon" style="background: linear-gradient(135deg, #b66dff, #8444e0);">
            <i class="bi bi-people-fill"></i>
        </div>
        <div>
            <h2 class="page-title-text mb-0">New Patients</h2>
        </div>
    </div>
</div>

<!-- Flash Alerts -->
@if(session('success'))
    <div class="alert alert-success d-flex align-items-center gap-2 rounded-4 py-3 px-4 mb-4 border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill fs-5 text-success"></i>
        <div>{{ session('success') }}</div>
    </div>
@endif

<!-- Main Table Card -->
<div class="admin-card">

    <!-- Patients Data Table -->
    <div class="table-responsive">
        <table class="table table-hover align-middle table-custom" id="patientsTable">
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>City</th>
                    <th>State</th>
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
                { data: 'contact_number', name: 'contact_number' },
                { data: 'city', name: 'city' },
                { data: 'state', name: 'state' },
                { data: 'created_at', name: 'created_at' },
                { data: 'status', name: 'status' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush