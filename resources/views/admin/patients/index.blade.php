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
        <a href="{{ route('patient.register.form') }}" class="btn btn-primary rounded-pill px-4 shadow-sm" style="background-color: var(--purple-primary); border-color: var(--purple-primary);">
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
    
    <!-- Filter & Search Bar -->
    <div class="row g-3 align-items-center justify-content-between mb-4 pb-3 border-bottom">
        <div class="col-md-6 col-lg-5">
            <form method="GET" action="{{ route('admin.patients.list') }}" class="d-flex gap-2">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" 
                           name="search" 
                           class="form-control bg-light border-start-0" 
                           placeholder="Search by name, email, or phone..." 
                           value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-secondary">Search</button>
                </div>
            </form>
        </div>

        <div class="col-md-6 col-lg-4 d-flex justify-content-md-end gap-2">
            <form method="GET" action="{{ route('admin.patients.list') }}" id="statusFilterForm" class="d-flex align-items-center gap-2">
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                <label class="text-muted small mb-0 text-nowrap">Filter Status:</label>
                <select name="status" class="form-select form-select-sm w-auto" onchange="document.getElementById('statusFilterForm').submit();">
                    <option value="all" {{ request('status') == 'all' || !request()->has('status') ? 'selected' : '' }}>All Status</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Approved</option>
                    <option value="2" {{ request('status') === '2' ? 'selected' : '' }}>In Review</option>
                </select>
            </form>

            @if(request()->has('search') || (request()->has('status') && request('status') !== 'all'))
                <a href="{{ route('admin.patients.list') }}" class="btn btn-sm btn-outline-danger" title="Clear Filters">
                    <i class="bi bi-x-circle"></i>
                </a>
            @endif
        </div>
    </div>

    <!-- Patients Data Table -->
    <div class="table-responsive">
        <table class="table table-hover align-middle table-custom">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Patient Details</th>
                    <th>Contact Info</th>
                    <th>Gender &amp; DOB</th>
                    <th>Uploaded Documents</th>
                    <th>Verification Status</th>
                    <th>Enrolled Date</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($patients as $patient)
                    <tr>
                        <td class="fw-semibold text-muted">#{{ $patient->id }}</td>
                        
                        <!-- Patient Name & Email -->
                        <td>
                            <div class="patient-avatar-box">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($patient->full_name) }}&background=da8cff&color=fff" 
                                     alt="Avatar" 
                                     class="rounded-circle shadow-sm">
                                <div>
                                    <div class="fw-bold text-dark">{{ $patient->full_name }}</div>
                                    <small class="text-muted">{{ $patient->email }}</small>
                                </div>
                            </div>
                        </td>

                        <!-- Contact & Caregiver -->
                        <td>
                            <div class="small">
                                <div><i class="bi bi-telephone-fill text-muted me-1"></i> {{ $patient->contact_number }}</div>
                                @if($patient->caregiver_contact_number)
                                    <div class="text-muted"><i class="bi bi-person-heart text-secondary me-1"></i> {{ $patient->caregiver_contact_number }}</div>
                                @endif
                            </div>
                        </td>

                        <!-- Gender & DOB -->
                        <td>
                            <span class="text-capitalize badge bg-light text-dark border">{{ $patient->gender ?? 'N/A' }}</span>
                            <div class="small text-muted mt-1">
                                {{ $patient->date_of_birth ? \Carbon\Carbon::parse($patient->date_of_birth)->format('d M, Y') : 'N/A' }}
                            </div>
                        </td>

                        <!-- Documents -->
                        <td>
                            <div class="d-flex flex-column gap-1">
                                @if($patient->govt_id)
                                    <a href="{{ asset('storage/' . $patient->govt_id) }}" target="_blank" class="badge bg-primary-subtle text-primary border text-decoration-none py-1">
                                        <i class="bi bi-file-earmark-person me-1"></i> Govt ID
                                    </a>
                                @else
                                    <span class="badge bg-light text-muted border">No ID</span>
                                @endif

                                @if($patient->prescription)
                                    <a href="{{ asset('storage/' . $patient->prescription) }}" target="_blank" class="badge bg-info-subtle text-info border text-decoration-none py-1">
                                        <i class="bi bi-file-medical me-1"></i> Prescription
                                    </a>
                                @endif
                            </div>
                        </td>

                        <!-- Status Selector -->
                        <td>
                            <form action="{{ route('admin.patients.update', $patient->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit();" style="width: 120px; font-size: 0.82rem; font-weight: 600;">
                                    <option value="0" {{ $patient->status == 0 ? 'selected' : '' }}>⏳ Pending</option>
                                    <option value="1" {{ $patient->status == 1 ? 'selected' : '' }}>✅ Approved</option>
                                    <option value="2" {{ $patient->status == 2 ? 'selected' : '' }}>🔍 In Review</option>
                                </select>
                            </form>
                        </td>

                        <!-- Created At -->
                        <td class="small text-muted">
                            {{ $patient->created_at ? $patient->created_at->format('d M, Y') : 'N/A' }}
                        </td>

                        <!-- Actions -->
                        <td class="text-end">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light border rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                    <li>
                                        <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#viewModal{{ $patient->id }}">
                                            <i class="bi bi-eye text-primary me-2"></i> View Full Details
                                        </button>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <form action="{{ route('admin.patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this patient enrollment record?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bi bi-trash3 me-2"></i> Delete Record
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <!-- Patient Details Modal -->
                    <div class="modal fade" id="viewModal{{ $patient->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $patient->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content rounded-4 border-0 shadow">
                                <div class="modal-header border-bottom py-3" style="background: #F8FBFC;">
                                    <h5 class="modal-title fw-bold" id="modalLabel{{ $patient->id }}" style="color: #0A2233;">
                                        <i class="bi bi-person-badge text-primary me-2"></i> Patient Enrollment Details (#{{ $patient->id }})
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4">
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
                                <div class="modal-footer border-top py-2">
                                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <div class="py-4">
                                <i class="bi bi-inbox fs-1 text-muted d-block mb-3"></i>
                                <h6 class="fw-bold text-dark">No Patient Enrollments Found</h6>
                                <p class="text-muted small mb-3">No patient registrations match the selected criteria.</p>
                                <a href="{{ route('patient.register.form') }}" class="btn btn-sm btn-primary rounded-pill px-3" style="background-color: var(--purple-primary); border-color: var(--purple-primary);">
                                    <i class="bi bi-plus-lg me-1"></i> Enroll Patient Now
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
        <div class="text-muted small">
            Showing {{ $patients->firstItem() ?? 0 }} to {{ $patients->lastItem() ?? 0 }} of {{ $patients->total() }} patients
        </div>
        <div>
            {{ $patients->links('pagination::bootstrap-5') }}
        </div>
    </div>

</div>

@endsection
