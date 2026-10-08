@extends('layouts.app')

@section('title', 'Patient Enrollment Form | Diasens Connect')

@section('content')

<section class="registration-section">
    <div class="container py-4">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-xl-11">
                <div class="card card-registration my-4">
                        <!-- Close Button -->
                        <div class="registration-close">
                           <button type="button" onclick="window.location.href='/'" aria-label="Close">
                            &times;
                        </button>
                        </div>
                    <div class="row g-0">
                        
                        <!-- Left Image Column -->
                        <div class="col-xl-5 d-none d-xl-block registration-image-col">
                            <img src="{{ asset('images/reg.jpg') }}"
                                alt="Diasens Patient Support" 
                                class="registration-image" />
                        </div>

                        <!-- Right Form Column -->
                        <div class="col-xl-7">
                            <div class="card-body p-md-5 text-black">
                                
                                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                                    <div>
                                        <h3 class="mb-1 text-uppercase fw-bold" style="color: #0A2233; font-size: 1.45rem;">Patient Registration Form</h3>
                                    </div>
                                </div>

                                <!-- Feedback Alerts -->
                                @if(session('success'))
                                    <div class="alert alert-success d-flex align-items-center gap-2 rounded-4 py-3 px-4 mb-4 border-0 shadow-sm" role="alert">
                                        <i class="bi bi-check-circle-fill fs-5 text-success"></i>
                                        <div>{{ session('success') }}</div>
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger rounded-4 py-3 px-4 mb-4 border-0 shadow-sm" role="alert">
                                        <div class="fw-bold mb-1"><i class="bi bi-exclamation-triangle-fill me-1"></i> Please check the errors below:</div>
                                        <ul class="mb-0 ps-3 small">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('patient.register') }}" method="POST" enctype="multipart/form-data" id="patientForm">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="zydus_rep_name">
                                                    Zydus Representative Name <span class="required-star">*</span>
                                                </label>
                                                <input type="text" 
                                                       id="zydus_rep_name" 
                                                       name="zydus_rep_name" 
                                                       class="form-control-custom @error('zydus_rep_name') is-invalid @enderror" 
                                                       placeholder="Enter Zydus representative name" 
                                                       value="{{ old('zydus_rep_name') }}" 
                                                       required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-outline">
                                                <select class="form-select form-select-lg mb-3 @error('patient_type') is-invalid @enderror" 
                                                        name="patient_type" 
                                                        id="patient_type" 
                                                        required>
                                                    <option value="" disabled selected>Select Patient Type</option>
                                                    <option value="1">New Registration</option>
                                                    <option value="0">Old Registration</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="full_name">
                                                    Full Name <span class="required-star">*</span>
                                                </label>
                                                <input type="text" 
                                                       id="full_name" 
                                                       name="full_name" 
                                                       class="form-control-custom @error('full_name') is-invalid @enderror" 
                                                       placeholder="Enter full name" 
                                                       value="{{ old('full_name') }}" 
                                                       required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="email">
                                                    Patient Email ID 
                                                </label>
                                                <input type="email" 
                                                       id="email" 
                                                       name="email" 
                                                       class="form-control-custom @error('email') is-invalid @enderror" 
                                                       placeholder="Enter email address" 
                                                       value="{{ old('email') }}" 
                                                       />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Contact Number & Caregiver Number -->
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="contact_number">
                                                    Patient Contact Number <span class="required-star">*</span>
                                                </label>
                                                <div class="custom-input-group">
                                                    <span class="custom-input-prefix">+91</span>
                                                    <input type="tel" 
                                                           id="contact_number" 
                                                           name="contact_number" 
                                                           class="form-control-custom mobile-number @error('contact_number') is-invalid @enderror" 
                                                           placeholder="10-digit number" 
                                                           maxlength="10" 
                                                           value="{{ old('contact_number') }}" 
                                                           required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="caregiver_contact_number">
                                                    Caregiver Contact Number
                                                </label>
                                                <div class="custom-input-group">
                                                    <span class="custom-input-prefix">+91</span>
                                                    <input type="tel" 
                                                           id="caregiver_contact_number" 
                                                           name="caregiver_contact_number" 
                                                           class="form-control-custom mobile-number @error('caregiver_contact_number') is-invalid @enderror" 
                                                           placeholder="10-digit number" 
                                                           maxlength="10" 
                                                           value="{{ old('caregiver_contact_number') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="doctor_name">
                                                    Doctor Name
                                                </label>
                                                <input type="text" 
                                                       id="doctor_name" 
                                                       name="doctor_name" 
                                                       class="form-control-custom @error('doctor_name') is-invalid @enderror" 
                                                       placeholder="Enter doctor's name" 
                                                       value="{{ old('doctor_name') }}" 
                                                       />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-outline">
                                                <select class="form-select form-select-lg mb-3 @error('state') is-invalid @enderror"
                                                        name="state"
                                                        id="state"
                                                        required>
                                                    
                                                    <option value="">Select State</option>

                                                    @foreach($states as $state)
                                                        <option value="{{ $state }}"
                                                            {{ old('state') == $state ? 'selected' : '' }}>
                                                            {{ $state }}
                                                        </option>
                                                    @endforeach

                                                </select>

                                                @error('state')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="city">
                                                    City <span class="required-star">*</span>
                                                </label>
                                                <input type="text" 
                                                       id="city" 
                                                       name="city" 
                                                       class="form-control-custom @error('city') is-invalid @enderror" 
                                                       placeholder="Enter city" 
                                                       value="{{ old('city') }}" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="pincode">
                                                    Pincode <span class="required-star">*</span>
                                                </label>
                                                <input type="text" 
                                                       id="pincode" 
                                                       name="pincode" 
                                                       maxlength="6"
                                                       class="form-control-custom @error('pincode') is-invalid @enderror" 
                                                       placeholder="Enter pincode" 
                                                       value="{{ old('pincode') }}" 
                                                       required />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="address">
                                            Address 
                                        </label>
                                        <textarea id="address" 
                                                  name="address" 
                                                  class="form-control-custom @error('address') is-invalid @enderror" 
                                                  rows="2" 
                                                  placeholder="Enter full address">{{ old('address') }}</textarea>
                                    </div>

                                    <!-- File Uploads: Govt ID & Prescription -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label">
                                                    ID Proof
                                                </label>
                                                <div class="file-input-wrapper">
                                                    <i class="bi bi-file-earmark-person fs-4 text-secondary d-block mb-1"></i>
                                                    <span class="small fw-bold text-dark d-block" id="govtIdText">Upload ID Proof</span>
                                                    <small class="text-muted" style="font-size: 0.75rem;">PDF, JPG, PNG (Max 2MB)</small>
                                                    <input type="file" 
                                                           name="govt_id" 
                                                           id="govt_id" 
                                                           accept=".pdf,.jpg,.jpeg,.png" 
                                                           onchange="handleFileChange(this, 'govtIdText')" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label">
                                                    Doctor Prescription
                                                </label>
                                                <div class="file-input-wrapper">
                                                    <i class="bi bi-file-medical fs-4 text-secondary d-block mb-1"></i>
                                                    <span class="small fw-bold text-dark d-block" id="prescText">Upload Prescription</span>
                                                    <small class="text-muted" style="font-size: 0.75rem;">PDF, JPG, PNG (Max 2MB)</small>
                                                    <input type="file" 
                                                           name="prescription" 
                                                           id="prescription" 
                                                           accept=".pdf,.jpg,.jpeg,.png" 
                                                           onchange="handleFileChange(this, 'prescText')" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Consent Checkbox -->
                                    <!-- <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" name="consent" id="consent" value="1" {{ old('consent') ? 'checked' : '' }} required style="accent-color: #F05C38; cursor: pointer;" />
                                        <label class="form-check-label small text-muted" for="consent" style="cursor: pointer;">
                                            I agree to the <a href="#" class="text-decoration-underline" style="color: #F05C38;">terms &amp; conditions</a> and give voluntary consent to enroll in the Diasens Connect Patient Support Program. <span class="required-star">*</span>
                                        </label>
                                    </div> -->

                                    <!-- Action Buttons -->
                                    <div class="d-flex justify-content-end align-items-center gap-3 pt-2">
                                        <button type="reset" class="btn btn-light px-4 py-2 rounded-pill fw-semibold border">
                                            Reset
                                        </button>
                                        <button type="submit" class="btn-submit-enroll">
                                            <span>Submit Form</span>
                                            <i class="bi bi-arrow-right ms-1"></i>
                                        </button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Handle File upload display name
    function handleFileChange(input, textId) {
        const textElement = document.getElementById(textId);
        if (input.files && input.files[0]) {
            textElement.textContent = 'Selected: ' + input.files[0].name;
            textElement.style.color = '#F05C38';
        }
    }

    // Address sync checkbox
    document.addEventListener('DOMContentLoaded', () => {
        const sameAddressCheck = document.getElementById('sameAddressToggle');
        const permAddress = document.getElementById('permanent_address');
        const delivAddress = document.getElementById('delivery_address');

        if (sameAddressCheck && permAddress && delivAddress) {
            sameAddressCheck.addEventListener('change', function() {
                if (this.checked) {
                    delivAddress.value = permAddress.value;
                    delivAddress.readOnly = true;
                    delivAddress.style.backgroundColor = '#EEF4F8';
                } else {
                    delivAddress.readOnly = false;
                    delivAddress.style.backgroundColor = '';
                }
            });

            permAddress.addEventListener('input', function() {
                if (sameAddressCheck.checked) {
                    delivAddress.value = permAddress.value;
                }
            });
        }

        // Mobile numeric filter
        document.querySelectorAll('.mobile-number').forEach(input => {
            input.addEventListener('input', (e) => {
                e.target.value = e.target.value.replace(/[^0-9]/g, '').slice(0, 10);
            });
        });
    });
</script>
@endpush
