@extends('layouts.admin_dashboard')

@section('content')

<!-- Page Title & Breadcrumb -->
<div class="page-header-wrapper">
    <div class="page-title-box">
        <div class="page-title-icon">
            <i class="bi bi-house-door-fill"></i>
        </div>
        <h2 class="page-title-text">Dashboard</h2>
    </div>
</div>

<!-- =====================================================
     TOP 3 GRADIENT KPI CARDS
====================================================== -->
<div class="row g-4 mb-4">
    <!-- Card 1: Pink/Coral Gradient -->
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

    <!-- Card 2: Blue Gradient -->
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

    <!-- Card 3: Teal Gradient -->
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

<!-- =====================================================
     RECENT PATIENT REGISTRATIONS TABLE
====================================================== -->
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
                                <td>{{ $patient->id ?? 'N/A' }}</td>
                                <td>{{ $patient->full_name ?? 'N/A' }}</td>
                                <td>{{ $patient->state ?? 'N/A' }}</td>
                                <td>{{ $patient->city ?? 'N/A' }}</td>      
                                <td>
                                    @if($patient->status == 1)
                                        <span class="status-badge status-approved">Approved</span>
                                    @elseif($patient->status == 0)
                                        <span class="status-badge status-pending">Pending</span>
                                    @else
                                        <span class="status-badge status-review">In Review</span>
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
