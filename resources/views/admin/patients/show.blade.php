@extends('layouts.admin_dashboard')

@section('content')

<div class="container-fluid">

    {{-- Page Header --}}
    <div class="page-header-wrapper">
        <div class="page-title-box">
            <div class="page-title-icon">
                <i class="fa-solid fa-hospital-user"></i>
            </div>
            <h2 class="page-title-text">Patient Profile</h2>
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

    {{-- ================= PATIENT + STATUS ================= --}}
    <div class="row g-4 mb-4">

        {{-- Patient Profile --}}
        <div class="col-lg-8">

            <div class="card shadow-sm border-0 rounded-3 h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                         <h5 class="fw-semibold mb-0">
                            Patient Profile

                            @if($patient->patient_type)
                                <span class="badge bg-success ms-2" style="font-size: 12px; padding: 3px 6px;">
                                    New Patient
                                </span>

                            @else
                                <span class="badge bg-warning ms-2" style="font-size: 12px; padding: 3px 6px;">
                                    Old Patient
                                </span>
                            @endif
                        </h5>

                        <button type="button"
                                class="btn btn-danger btn-md"
                                data-bs-toggle="modal"
                                data-bs-target="#editPatientModal" style="background-color: #fe7c96; border-color: #fe7c96;">
                            <i class="bi bi-pencil-square me-1"></i>
                            Edit
                        </button>
                    </div>

                    <div class="row align-items-center">

                        {{-- Patient Icon --}}
                        <div class="col-md-4 text-center mb-4 mb-md-0">

                            <div class="mx-auto d-flex align-items-center justify-content-center"
                                 style="width:120px;height:120px;">
                                   <img src="{{ asset('images/hospital-patient-icon.png') }}"
                                        alt="Patient Icon"
                                        class="img-fluid"
                                        style="max-width: 100%; max-height: 100%;">

                            </div>

                        </div>


                        {{-- Patient Details --}}
                        <div class="col-md-8">

                            <div class="mb-3">
                                <strong>Patient Name:</strong>
                                <span class="ms-2">
                                    {{ $patient->full_name ?? 'N/A' }}
                                </span>
                            </div>

                            <div class="mb-3">
                                <strong>Patient ID:</strong>
                                <span class="ms-2">
                                    {{ $patient->patient_code ?? 'N/A' }}
                                </span>
                            </div>

                            <div class="mb-3">
                                <strong>Patient Contact Number:</strong>
                                <span class="ms-2">
                                    {{ $patient->contact_number ?? 'N/A' }}
                                </span>
                            </div>

                            <div class="mb-3">
                                <strong>Registered On:</strong>
                                <span class="ms-2">
                                    {{ $patient->created_at
                                        ? \Carbon\Carbon::parse($patient->created_at)->format('d-m-Y H:i:s')
                                        : 'N/A'
                                    }}
                                </span>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>


        {{-- Status --}}
        <div class="col-lg-4">

            <div class="card shadow-sm border-0 rounded-3 h-100">

                <div class="card-body p-4">

                    <h5 class="fw-semibold mb-4">
                        Status
                    </h5>

                    <form action="{{ route('admin.patients.updateStatus', $patient->ref_id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <input type="hidden" name="ref_id" value="{{ $patient->ref_id }}">

                        <div class="d-grid gap-3">

                            <div class="row g-2 align-items-center">
                                <strong>Fill below details</strong>
                                <div class="col-auto">
                                    <span class="form-label">Select Date and Time:</span>
                                </div>

                                <input type="datetime-local"
                                       class="form-control col"
                                       name="date_assigned"
                                       value="{{ old('date_assigned', $patient->date_assigned ? \Carbon\Carbon::parse($patient->date_assigned)->format('Y-m-d\TH:i') : '') }}"
                                       required>
                                </div>

                            <button type="submit"
                                    name="status"
                                    value="1"
                                    class="btn btn-warning" style="background-color: #f7c948; border-color: #f7c948;">
                                <i class="mdi mdi-account-arrow-right me-1"></i>
                                Send to Nurse
                            </button>

                            <button type="submit"
                                    name="status"
                                    value="2"
                                    class="btn btn-success">
                                <i class="mdi mdi-check-circle-outline me-1"></i>
                                Completed
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{-- ================= ADDRESS + CAREGIVER ================= --}}
    <div class="row g-4 mb-4">

        {{-- Address --}}
        <div class="col-lg-8">

            <div class="card shadow-sm border-0 rounded-3 h-100">

                <div class="card-body p-4">

                    <h5 class="fw-semibold mb-4">
                        Address
                    </h5>

                    <div class="row g-4">

                        <div class="col-md-6">

                            <div class="mb-3">
                                <strong>Address:</strong>
                            </div>

                            <div>
                                {{ $patient->address ?? 'N/A' }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">
                                <strong>State:</strong>
                            </div>

                            <div>
                                {{ $patient->state ?? 'N/A' }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">
                                <strong>City:</strong>
                            </div>

                            <div>
                                {{ $patient->city ?? 'N/A' }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">
                                <strong>Pincode:</strong>
                            </div>

                            <div>
                                {{ $patient->pincode ?? 'N/A' }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Caregiver --}}
        <div class="col-lg-4">

            <div class="card shadow-sm border-0 rounded-3 h-100">

                <div class="card-body p-4">

                    <h5 class="fw-semibold mb-4">
                        CareGiver details
                    </h5>

                    <div>

                        <strong>Contact Number:</strong>

                        <div class="mt-2">
                            {{ $patient->caregiver_contact_number ?? 'N/A' }}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- ================= DOCUMENTS ================= --}}
    <div class="card shadow-sm border-0 rounded-3 mb-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-semibold mb-0">
                    Documents
                </h5>

                <button type="button"
                        class="btn btn-danger btn-md"
                        data-bs-toggle="modal"
                        data-bs-target="#uploadDocumentsModal" style="background-color: #fe7c96; border-color: #fe7c96;">
                    <i class="bi bi-pencil-square me-1"></i>
                    Upload
                </button>
            </div>

            <div class="row g-4">

                {{-- ID Proof --}}
                <div class="col-md-6">

                    <label class="fw-semibold d-block mb-2">
                        Govt. ID Proof
                    </label>

                    @if($patient->govt_id)

                        <a href="{{ asset('storage/' . $patient->govt_id) }}"
                           target="_blank"
                           class="btn btn-outline-primary btn-sm">

                            <i class="mdi mdi-open-in-new me-1"></i>
                            Open ID Proof

                        </a>

                    @else

                        <span class="text-muted">
                            Not uploaded
                        </span>

                    @endif

                </div>


                {{-- Prescription --}}
                <div class="col-md-6">

                    <label class="fw-semibold d-block mb-2">
                        Doctor Prescription
                    </label>

                    @if($patient->prescription)

                        <a href="{{ asset('storage/' . $patient->prescription) }}"
                           target="_blank"
                           class="btn btn-outline-info btn-sm">

                            <i class="mdi mdi-open-in-new me-1"></i>
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

{{-- Modal --}}
    @include('admin.patients.edit', ['patient' => $patient])
@endsection

