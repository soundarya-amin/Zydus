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

    <div class="row g-4 mb-4">

        {{-- Patient Profile --}}
        <div class="col-lg-8">

            <div class="card shadow-sm border-0 rounded-3 h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-semibold mb-0">
                            Patient Profile

                            @if($patient->patientEnrollment->patient_type)
                                <span class="badge bg-success ms-2" style="font-size: 12px; padding: 3px 6px;">
                                    New Patient
                                </span>

                            @else
                                <span class="badge bg-warning ms-2" style="font-size: 12px; padding: 3px 6px;">
                                    Old Patient
                                </span>
                            @endif
                        </h5>
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
                                    {{ $patient->patientEnrollment->full_name ?? 'N/A' }}
                                </span>
                            </div>

                            <div class="mb-3">
                                <strong>Patient ID:</strong>
                                <span class="ms-2">
                                    {{ $patient->patientEnrollment->patient_code ?? 'N/A' }}
                                </span>
                            </div>

                            <div class="mb-3">
                                <strong>Patient Contact Number:</strong>
                                <span class="ms-2">
                                    {{ $patient->patientEnrollment->contact_number ?? 'N/A' }}
                                </span>
                            </div>

                            <div class="mb-3">
                                <strong>Registered On:</strong>
                                <span class="ms-2">
                                    {{ $patient->patientEnrollment->created_at
                                        ? \Carbon\Carbon::parse($patient->patientEnrollment->created_at)->format('d-m-Y')
                                        : 'N/A'
                                    }}
                                </span>
                            </div>

                            <div>
                                <strong>Submit To Nurse on:</strong>
                                <span class="ms-2">
                                    {{ $patient->created_at
                                        ? \Carbon\Carbon::parse($patient->created_at)->format('d-m-Y')
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

                    <form action="{{ route('admin.nurses.updateStatus', $patient->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <input type="hidden" name="patient_id" value="{{ $patient->id }}">

                        <div class="d-grid gap-3">

                            <!-- <button type="submit"
                                    name="status"
                                    value="1"
                                    class="btn btn-warning">
                                <i class="mdi mdi-account-arrow-right me-1"></i>
                                Assign to Nurse
                            </button> -->

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
                                {{ $patient->patientEnrollment->address ?? 'N/A' }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">
                                <strong>State:</strong>
                            </div>

                            <div>
                                {{ $patient->patientEnrollment->state ?? 'N/A' }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">
                                <strong>City:</strong>
                            </div>

                            <div>
                                {{ $patient->patientEnrollment->city ?? 'N/A' }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">
                                <strong>Pincode:</strong>
                            </div>

                            <div>
                                {{ $patient->patientEnrollment->pincode ?? 'N/A' }}
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
                            {{ $patient->patientEnrollment->caregiver_contact_number ?? 'N/A' }}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection
