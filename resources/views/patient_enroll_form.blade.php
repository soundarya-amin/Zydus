@extends('layouts.app')

@section('title', 'Patient Enrollment Form | Diasens Connect')

@section('content')

<section class="registration-section">
    <div class="container py-4">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-xl-11">
                <div class="card card-registration my-4">
                    <div class="row g-0">
                        
                        <!-- Left Image Column -->
                        <div class="col-xl-5 d-none d-xl-block registration-image-col">
                            <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=900&q=80"
                                alt="Diasens Patient Support" 
                                class="registration-image" />
                            
                            <div class="image-overlay-badge">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <i class="bi bi-shield-check text-success fs-4"></i>
                                    <h5 class="mb-0 fw-bold">Diasens Connect</h5>
                                </div>
                                <p class="small mb-0 text-white-50">
                                    Patient Support Program by RxPONT for Zydus Lifesciences. Supported Continuous Glucose Monitoring (CGM) journey.
                                </p>
                            </div>
                        </div>

                        <!-- Right Form Column -->
                        <div class="col-xl-7">
                            <div class="card-body p-md-5 text-black">
                                
                                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                                    <div>
                                        <h3 class="mb-1 text-uppercase fw-bold" style="color: #0A2233; font-size: 1.45rem;">Patient Registration Form</h3>
                                        <span class="text-muted small">Please enter the required patient details for therapy initiation</span>
                                    </div>
                                    <span class="badge rounded-pill" style="background: #FFF0ED; color: #F05C38; font-weight: 700; padding: 8px 14px;">
                                        RxPONT Support
                                    </span>
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

                                    <!-- Full Name & Email -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="full_name">
                                                    Patient Full Name <span class="required-star">*</span>
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

                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="email">
                                                    Email ID <span class="required-star">*</span>
                                                </label>
                                                <input type="email" 
                                                       id="email" 
                                                       name="email" 
                                                       class="form-control-custom @error('email') is-invalid @enderror" 
                                                       placeholder="Enter email address" 
                                                       value="{{ old('email') }}" 
                                                       required />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Contact Number & Caregiver Number -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
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

                                        <div class="col-md-6 mb-3">
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

                                    <!-- Gender Selection -->
                                    <div class="mb-3">
                                        <label class="form-label mb-2">
                                            Gender <span class="required-star">*</span>
                                        </label>
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <label class="gender-radio-item" for="femaleGender">
                                                <input type="radio" name="gender" id="femaleGender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }} required />
                                                <span>Female</span>
                                            </label>

                                            <label class="gender-radio-item" for="maleGender">
                                                <input type="radio" name="gender" id="maleGender" value="male" {{ old('gender', 'male') == 'male' ? 'checked' : '' }} />
                                                <span>Male</span>
                                            </label>

                                            <label class="gender-radio-item" for="otherGender">
                                                <input type="radio" name="gender" id="otherGender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }} />
                                                <span>Other</span>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Date of Birth & Nationality -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="date_of_birth">
                                                    Date of Birth <span class="required-star">*</span>
                                                </label>
                                                <input type="date" 
                                                       id="date_of_birth" 
                                                       name="date_of_birth" 
                                                       class="form-control-custom @error('date_of_birth') is-invalid @enderror" 
                                                       value="{{ old('date_of_birth') }}" 
                                                       required />
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="nationality">
                                                    Nationality <span class="required-star">*</span>
                                                </label>
                                                <input type="text" 
                                                       id="nationality" 
                                                       name="nationality" 
                                                       class="form-control-custom @error('nationality') is-invalid @enderror" 
                                                       placeholder="e.g. Indian" 
                                                       value="{{ old('nationality', 'Indian') }}" 
                                                       required />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Permanent Address -->
                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="permanent_address">
                                            Permanent Address <span class="required-star">*</span>
                                        </label>
                                        <textarea id="permanent_address" 
                                                  name="permanent_address" 
                                                  class="form-control-custom @error('permanent_address') is-invalid @enderror" 
                                                  rows="2" 
                                                  placeholder="Enter full permanent address" 
                                                  required>{{ old('permanent_address') }}</textarea>
                                    </div>

                                    <!-- Delivery Address -->
                                    <div class="form-outline mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label mb-0" for="delivery_address">
                                                Medicine Delivery Address
                                            </label>
                                            <div class="form-check mb-0">
                                                <input class="form-check-input" type="checkbox" id="sameAddressToggle" style="accent-color: #F05C38; cursor: pointer;" />
                                                <label class="form-check-label small text-muted" for="sameAddressToggle" style="cursor: pointer;">
                                                    Same as permanent address
                                                </label>
                                            </div>
                                        </div>
                                        <textarea id="delivery_address" 
                                                  name="delivery_address" 
                                                  class="form-control-custom @error('delivery_address') is-invalid @enderror" 
                                                  rows="2" 
                                                  placeholder="Enter delivery address (if different)">{{ old('delivery_address') }}</textarea>
                                    </div>

                                    <!-- File Uploads: Govt ID & Prescription -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label">
                                                    Govt ID Proof <span class="required-star">*</span>
                                                </label>
                                                <div class="file-input-wrapper">
                                                    <i class="bi bi-file-earmark-person fs-4 text-secondary d-block mb-1"></i>
                                                    <span class="small fw-bold text-dark d-block" id="govtIdText">Upload Govt ID (Aadhaar/Voter/Passport)</span>
                                                    <small class="text-muted" style="font-size: 0.75rem;">PDF, JPG, PNG (Max 2MB)</small>
                                                    <input type="file" 
                                                           name="govt_id" 
                                                           id="govt_id" 
                                                           accept=".pdf,.jpg,.jpeg,.png" 
                                                           required 
                                                           onchange="handleFileChange(this, 'govtIdText')" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <label class="form-label">
                                                    Doctor Prescription (Optional)
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
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" name="consent" id="consent" value="1" {{ old('consent') ? 'checked' : '' }} required style="accent-color: #F05C38; cursor: pointer;" />
                                        <label class="form-check-label small text-muted" for="consent" style="cursor: pointer;">
                                            I agree to the <a href="#" class="text-decoration-underline" style="color: #F05C38;">terms &amp; conditions</a> and give voluntary consent to enroll in the Diasens Connect Patient Support Program. <span class="required-star">*</span>
                                        </label>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="d-flex justify-content-end align-items-center gap-3 pt-2">
                                        <button type="reset" class="btn btn-light px-4 py-2 rounded-pill fw-semibold border">
                                            Reset
                                        </button>
                                        <button type="submit" class="btn-submit-enroll">
                                            <span>Submit Enrollment</span>
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
