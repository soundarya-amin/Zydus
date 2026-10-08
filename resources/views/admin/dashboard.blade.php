@extends('layouts.admin_dashboard')

@section('content')

<div class="page-header-wrapper">
    <div class="page-title-box">
        <div class="page-title-icon">
            <i class="bi bi-house-door-fill"></i>
        </div>
        <h2 class="page-title-text">Dashboard</h2>
    </div>
</div>

<!-- Flash Alerts -->
@if(session('success'))
    <div class="alert alert-success d-flex align-items-center gap-2 rounded-4 py-3 px-4 mb-4 border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill fs-5 text-success"></i>
        <div>{{ session('success') }}</div>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger d-flex align-items-center gap-2 rounded-4 py-3 px-4 mb-4 border-0 shadow-sm" role="alert">
        <i class="bi bi-exclamation-triangle-fill fs-5 text-danger"></i>
        <div>{{ session('error') }}</div>
    </div>
@endif

<!-- Dashboard Cards -->
<div class="row g-4 mb-4">
    <!-- Card 1: Total Registrations -->
    <div class="col-md-4">
        <div class="card-stat-gradient card-stat-pink">
            <div class="card-circle-bg"></div>
            <div class="card-stat-header">
                <h4 class="card-stat-title">Total Registered</h4>
                <i class="fa-solid fa-notes-medical float-end"></i>
            </div>
            <div class="card-stat-number">{{ $totalPatients }}</div>
        </div>
    </div>

    <!-- Card 2: Catered Patients -->
    <div class="col-md-4">
        <div class="card-stat-gradient card-stat-blue">
            <div class="card-circle-bg"></div>
            <div class="card-stat-header">
                <h4 class="card-stat-title">Catered Patients</h4>
                <i class="fa-solid fa-check float-end"></i>
            </div>
            <div class="card-stat-number">{{ $approvedPatients }}</div>
        </div>
    </div>

    <!-- Card 3: Pending -->
    <div class="col-md-4">
        <div class="card-stat-gradient card-stat-teal">
            <div class="card-circle-bg"></div>
            <div class="card-stat-header">
                <h4 class="card-stat-title">Pending</h4>
                <i class="fa-regular fa-hourglass-half float-end"></i>
            </div>
            <div class="card-stat-number">{{ $pendingPatients }}</div>
        </div>
    </div>
</div>

<!-- Recent Patient Registrations -->
<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="card-header-flex">
                <div>
                    <h4 class="card-box-title">Recent Patient - Pending</h4>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th>Patient ID</th>
                            <th>Patient Name</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentPatients as $patient)
                            <tr>
                                <td>{{ $patient->patient_code ?? 'N/A' }}</td>
                                <td>{{ $patient->full_name ?? 'N/A' }}</td>
                                <td>{{ $patient->state ?? 'N/A' }}</td>
                                <td>{{ $patient->city ?? 'N/A' }}</td>      
                                <td>
                                    @if($patient->status == 0)
                                        <span class="status-badge status-pending">Pending</span>
                                    @elseif($patient->status == 1)
                                        <span class="status-badge status-pending">Assigned to Nurse</span>
                                    @elseif($patient->status == 2)
                                        <span class="status-badge status-approved">Completed</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No recent patients found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
