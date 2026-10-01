@extends('layouts.admin_dashboard')

@section('title', 'Patient Profile | RxPONT Admin')

@section('content')

<div class="container-fluid">

    {{-- Page Header --}}
    <div class="d-flex align-items-center gap-2 mb-4">
        <i class="mdi mdi-home fs-5 text-muted"></i>
        <h4 class="mb-0 fw-semibold">View Patient Profile</h4>
    </div>

    {{-- Patient Information --}}
    <div class="card shadow-sm rounded-4 border-0 mb-4">

        <div class="card-header bg-white border-0 p-4">
            <h5 class="mb-0 fw-semibold">
                <i class="bi bi-person-lines-fill text-primary me-2"></i>
                Patient Profile
            </h5>
        </div>

        <div class="card-body p-4 border-top">
            <div class="row g-4">

                {{-- Patient Name --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-muted">
                        Patient Name
                    </label>
                    <div class="form-control bg-light border-0">
                        {{ $patient->full_name ?? 'N/A' }}
                    </div>
                </div>

                {{-- Patient ID --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-muted">
                        Patient ID
                    </label>
                    <div class="form-control bg-light border-0">
                        {{ $patient->id ?? 'N/A' }}
                    </div>
                </div>

                {{-- Contact Number --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-muted">
                        Patient Contact Number
                    </label>
                    <div class="form-control bg-light border-0">
                        {{ $patient->contact_number ?? 'N/A' }}
                    </div>
                </div>

                {{-- Registered On --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-muted">
                        Registered On
                    </label>
                    <div class="form-control bg-light border-0">
                        {{ $patient->created_at
                            ? \Carbon\Carbon::parse($patient->created_at)->format('d M Y')
                            : 'N/A'
                        }}
                    </div>
                </div>

                {{-- Submitted to Nurse --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-muted">
                        Submitted to Nurse On
                    </label>
                    <div class="form-control bg-light border-0">
                        {{ $patient->updated_at
                            ? \Carbon\Carbon::parse($patient->updated_at)->format('d M Y')
                            : 'N/A'
                        }}
                    </div>
                </div>
            </div>
        </div>
    </div>

  <div class="card shadow-sm rounded-4 border-0 mb-4">
    <form action="{{ route('admin.patients.updateStatus', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="col-md-6">
            <label class="form-label fw-semibold text-muted">
                Status
            </label>

            <select name="status" class="form-select bg-light border-0">
                <option value="0" {{ $patient->status == 0 ? 'selected' : '' }}>
                    Pending
                </option>
                <option value="1" {{ $patient->status == 1 ? 'selected' : '' }}>
                    Completed
                </option>
            </select>

            <button type="submit" class="btn btn-primary btn-sm mt-3">
                Update Status
            </button>
        </div>
    </form>
</div>



    {{-- Address Details --}}
    <div class="card shadow-sm rounded-4 border-0 mb-4">

        <div class="card-header bg-white border-0 p-4">
            <h5 class="mb-0 fw-semibold">
                <i class="bi bi-geo-alt text-primary me-2"></i>
                Address Details
            </h5>
        </div>

        <div class="card-body p-4 border-top">
            <div class="row g-4">

                {{-- Address --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-muted">
                        Address
                    </label>
                    <div class="form-control bg-light border-0">
                        {{ $patient->address ?? 'N/A' }}
                    </div>
                </div>

                {{-- State --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-muted">
                        State
                    </label>
                    <div class="form-control bg-light border-0">
                        {{ $patient->state ?? 'N/A' }}
                    </div>
                </div>

                {{-- City --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-muted">
                        City
                    </label>
                    <div class="form-control bg-light border-0">
                        {{ $patient->city ?? 'N/A' }}
                    </div>
                </div>

                {{-- Pincode --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-muted">
                        Pincode
                    </label>
                    <div class="form-control bg-light border-0">
                        {{ $patient->pincode ?? 'N/A' }}
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{-- Caregiver Details --}}
    <div class="card shadow-sm rounded-4 border-0 mb-4">

        <div class="card-header bg-white border-0 p-4">
            <h5 class="mb-0 fw-semibold">
                <i class="bi bi-person-heart text-primary me-2"></i>
                Caregiver Details
            </h5>
        </div>

        <div class="card-body p-4 border-top">
            <div class="row g-4">

                <div class="col-md-6">
                    <label class="form-label fw-semibold text-muted">
                        Caregiver Contact Number
                    </label>

                    <div class="form-control bg-light border-0">
                        {{ $patient->caregiver_contact_number ?? 'N/A' }}
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{-- Documents --}}
    <div class="card shadow-sm rounded-4 border-0 mb-4">

        <div class="card-header bg-white border-0 p-4">
            <h5 class="mb-0 fw-semibold">
                <i class="bi bi-file-earmark-text text-primary me-2"></i>
                Documents
            </h5>
        </div>

        <div class="card-body p-4 border-top">
            <div class="row g-4">

                {{-- Government ID --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-muted">
                        Government ID Proof
                    </label>

                    <div class="form-control bg-light border-0 d-flex align-items-center">

                        @if($patient->govt_id)

                            <a
                                href="{{ asset('storage/' . $patient->govt_id) }}"
                                target="_blank"
                                class="btn btn-sm btn-outline-primary"
                            >
                                <i class="bi bi-box-arrow-up-right me-1"></i>
                                Open Government ID
                            </a>

                        @else

                            <span class="text-muted">
                                Not uploaded
                            </span>

                        @endif

                    </div>
                </div>


                {{-- Prescription --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-muted">
                        Prescription Document
                    </label>

                    <div class="form-control bg-light border-0 d-flex align-items-center">

                        @if($patient->prescription)

                            <a
                                href="{{ asset('storage/' . $patient->prescription) }}"
                                target="_blank"
                                class="btn btn-sm btn-outline-info"
                            >
                                <i class="bi bi-box-arrow-up-right me-1"></i>
                                Open Prescription
                            </a>

                        @else

                            <span class="text-muted">
                                Not uploaded
                            </span>

                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
