@extends('layouts.app')

@section('title', 'Diasens Connect | Patient Support Program')

@section('content')

    <!-- =====================================================
         HERO SECTION (MEDICLOUD HEALTHCARE AESTHETIC)
    ====================================================== -->
    <section class="hero-section" id="hero">
        <div class="container">
            <div class="row align-items-center min-vh-75">
                
                <!-- Left Hero Content -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <!-- HIPAA / Trust Badge -->
                    <div class="hero-badge-pill">
                        <i class="bi bi-shield-check"></i>
                        <span>HIPAA Compliant &amp; Secure Patient Support</span>
                    </div>

                    <!-- Main Headline -->
                    <h1 class="hero-title">
                        Run Your <span class="highlight-text">CGM Journey</span> Effortlessly
                    </h1>

                    <!-- Paragraph Descriptions -->
                    <p class="hero-lead-text">
                        <strong>Diasens Connect</strong> is how RxPONT turns your prescription into a supported continuous glucose monitoring journey.
                    </p>

                    <p class="hero-sub-text">
                        Get guidance, assistance and continuous care to help you begin your prescribed CGM therapy with total confidence.
                    </p>

                    <!-- Hero Action Buttons -->
                    <div class="hero-buttons-group">
                        <a href="#enroll" class="btn-coral-pill text-decoration-none">
                            <span>Enroll Patient</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        <a href="#pontassist" class="btn-outline-navy-pill text-decoration-none">
                            <i class="bi bi-play-circle me-1"></i>
                            <span>Explore PONTAssist™</span>
                        </a>
                    </div>

                    <!-- Trust Bar -->
                    <div class="hero-trust-bar">
                        <div class="trust-item">
                            <div class="trust-icon">
                                <i class="bi bi-patch-check-fill"></i>
                            </div>
                            <div class="trust-text">
                                Zydus Lifesciences
                                <small>Official Assistance Program</small>
                            </div>
                        </div>
                        <div class="trust-item">
                            <div class="trust-icon">
                                <i class="bi bi-headset"></i>
                            </div>
                            <div class="trust-text">
                                Dedicated Support
                                <small>Free Consultation &amp; Setup</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Hero Visual with Floating Badges -->
                <div class="col-lg-6">
                    <div class="hero-image-wrapper">
                        <!-- Circular Teal Backdrop Shape -->
                        <div class="hero-circle-bg"></div>

                        <!-- Floating Badges Matching MediCloud Template -->
                        <div class="floating-badge floating-badge-1">
                            <div class="floating-badge-dot"></div>
                            <span>CGM Guidance</span>
                        </div>

                        <div class="floating-badge floating-badge-2">
                            <div class="floating-badge-dot"></div>
                            <span>Patient Support</span>
                        </div>

                        <div class="floating-badge floating-badge-3">
                            <div class="floating-badge-dot"></div>
                            <span>Personalized Care</span>
                        </div>

                        <!-- Doctor / Healthcare Specialist Cutout -->
                        <img src="https://themewagon.github.io/medicloud/v1.0.0/assets/img/hero/hero-1.png"
                             alt="Diasens Connect Medical Support Specialist" 
                             class="hero-main-img img-fluid"
                             loading="eager"
                             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=800&q=80';">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- =====================================================
         ABOUT RXPONT SECTION
    ====================================================== -->
    <section id="about" class="section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label">WHO WE ARE</span>
                <h2 class="section-title">About RxPONT</h2>
                <p class="section-subtitle">
                    Your trusted partner in therapy initiation and patient support across India.
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Card 1 -->
                <div class="col-md-6 col-lg-5">
                    <div class="about-card-box">
                        <div class="about-icon-circle">
                            <i class="bi bi-heart-pulse-fill"></i>
                        </div>
                        <h3 class="about-card-title">Patient-Centric Support</h3>
                        <p class="about-card-text">
                            RxPONT is India’s leading therapy initiation and patient support organization. Our goal is to help patients access important breakthrough medicines and medical devices prescribed by their doctors with utmost ease.
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-6 col-lg-5">
                    <div class="about-card-box coral-accent">
                        <div class="about-icon-circle">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h3 class="about-card-title">Supporting Your Journey</h3>
                        <p class="about-card-text">
                            At RxPONT, we provide comprehensive guidance, treatment assistance and continuous support for your medication needs. Our dedicated mission is to make your treatment journey smooth, supportive and worry-free.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =====================================================
         WHAT IS PONTASSIST™ SECTION
    ====================================================== -->
    <section id="pontassist" class="section-padding pontassist-overview-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label">RxPONT PATIENT SUPPORT</span>
                <h2 class="section-title">What is PONTAssist™?</h2>
                <p class="section-subtitle">
                    PONTAssist™ is a therapy initiation platform developed by RxPONT. It is designed to help patients begin and continue their prescribed treatment without unnecessary delays.
                </p>
            </div>

            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="pe-lg-4">
                        <span class="badge bg-light text-primary fw-bold px-3 py-2 rounded-pill mb-3">Therapy Initiation Platform</span>
                        <h3 class="fs-2 fw-bold text-dark mb-4">
                            Your Support Partner in the Treatment Journey
                        </h3>
                        <p class="text-muted fs-6 mb-4">
                            Supporting the <strong>Zydus Lifesciences Patient Assistance Program for Diasens</strong>, PONTAssist™ helps ensure timely and efficient access to prescribed therapy.
                        </p>
                        <p class="text-muted fs-6 mb-4">
                            Our platform is purpose-built to accompany you throughout your treatment journey, making the entire onboarding and monitoring process easier and stress-free.
                        </p>
                        <a href="#enroll" class="btn-coral-pill text-decoration-none">
                            <span>Get Started Today</span>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="pontassist-highlight-card">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="highlight-pill-item">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <span>Easy Enrollment</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="highlight-pill-item">
                                    <i class="bi bi-shield-check text-primary"></i>
                                    <span>Secure Process</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="highlight-pill-item">
                                    <i class="bi bi-person-check-fill" style="color: var(--primary-coral);"></i>
                                    <span>Patient Assistance</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="highlight-pill-item">
                                    <i class="bi bi-headset text-info"></i>
                                    <span>Ongoing Support</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =====================================================
         WHAT YOU CAN EXPECT (6 CARDS GRID)
    ====================================================== -->
    <section id="support" class="section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label">OUR VALUE PROPOSITION</span>
                <h2 class="section-title">What You Can Expect from PONTAssist™</h2>
                <p class="section-subtitle">
                    Comprehensive, high-touch support services tailored for your therapy journey.
                </p>
            </div>

            <div class="row g-4">
                <!-- CARD 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="expect-card">
                        <div class="expect-icon-wrapper">
                            <i class="bi bi-file-earmark-check"></i>
                        </div>
                        <h4 class="expect-card-title">Simplified Enrollment Process</h4>
                        <p class="expect-card-text">
                            Say goodbye to lengthy paper forms. Our secure E-Consent system simplifies enrollment with clear, easy-to-understand digital steps.
                        </p>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="expect-card">
                        <div class="expect-icon-wrapper">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4 class="expect-card-title">Informed &amp; Compliant Consent</h4>
                        <p class="expect-card-text">
                            We help ensure you understand your treatment process before you begin while following applicable legal and safety protocols.
                        </p>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="expect-card">
                        <div class="expect-icon-wrapper">
                            <i class="bi bi-lock-fill"></i>
                        </div>
                        <h4 class="expect-card-title">Confidential &amp; Secure Data Handling</h4>
                        <p class="expect-card-text">
                            Your personal and medical information is kept secure and accessible only to authorized healthcare professionals involved in your care.
                        </p>
                    </div>
                </div>

                <!-- CARD 4 -->
                <div class="col-md-6 col-lg-4">
                    <div class="expect-card">
                        <div class="expect-icon-wrapper">
                            <i class="bi bi-heart-pulse"></i>
                        </div>
                        <h4 class="expect-card-title">CGM Installation &amp; Education</h4>
                        <p class="expect-card-text">
                            We assist you through the Zydus Assistance Program. Our team can visit you at your convenience to help with CGM installation and device education.
                        </p>
                    </div>
                </div>

                <!-- CARD 5 -->
                <div class="col-md-6 col-lg-4">
                    <div class="expect-card">
                        <div class="expect-icon-wrapper">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <h4 class="expect-card-title">Support at Every Step</h4>
                        <p class="expect-card-text">
                            From reminders to follow-ups, PONTAssist™ acts as your trusted companion throughout your continuous glucose monitoring treatment.
                        </p>
                    </div>
                </div>

                <!-- CARD 6 -->
                <div class="col-md-6 col-lg-4">
                    <div class="expect-card">
                        <div class="expect-icon-wrapper">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h4 class="expect-card-title">Patient Assistance</h4>
                        <p class="expect-card-text">
                            Get guidance and assistance throughout your Diasens CGM journey so you can start your prescribed therapy with confidence.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =====================================================
         ENROLLMENT SECTION
    ====================================================== -->
    <section id="enroll" class="section-padding bg-light-section">
        <div class="container">
            <div class="enroll-section-container">
                <div class="row g-0">

                    <!-- LEFT CONTACT PANEL -->
                    <div class="col-lg-5 col-xl-4">
                        <div class="enroll-left-panel">
                            <div>
                                <span class="enroll-panel-badge">GET STARTED</span>
                                <h3 class="enroll-panel-title">Enroll Patient Now</h3>
                                <p class="enroll-panel-desc">
                                    Get started with the Diasens Patient Support Program. Our dedicated team is here to guide and assist you every step of the way.
                                </p>

                                <!-- PHONE -->
                                <div class="contact-card-box">
                                    <div class="contact-card-icon">
                                        <i class="bi bi-telephone-fill"></i>
                                    </div>
                                    <div class="contact-card-content">
                                        <small>Call Our Support Line</small>
                                        <a href="tel:+916827421020">+91 6827 421 020</a>
                                    </div>
                                </div>

                                <!-- WHATSAPP -->
                                <div class="contact-card-box whatsapp-card">
                                    <div class="contact-card-icon">
                                        <i class="bi bi-whatsapp"></i>
                                    </div>
                                    <div class="contact-card-content">
                                        <small>Instant WhatsApp Support</small>
                                        <a href="https://wa.me/916827421020" target="_blank">Chat with us</a>
                                    </div>
                                </div>
                            </div>

                            <div class="privacy-trust-note">
                                <i class="bi bi-shield-check text-success fs-5"></i>
                                <span>Don't worry, your data is 100% confidential and safe with us.</span>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT FORM PANEL -->
                    <div class="col-lg-7 col-xl-8">
                        <div class="enroll-right-panel">
                            <div class="mb-4">
                                <h3 class="form-header-title">Patient Enrollment</h3>
                                <p class="form-header-desc">
                                    Please fill in the required patient details to initiate the support program.
                                </p>

                                @if(session('success'))
                                    <div class="alert alert-success d-flex align-items-center gap-2 rounded-4 py-3 px-4 mb-4 border-0 shadow-sm" role="alert">
                                        <i class="bi bi-check-circle-fill fs-5"></i>
                                        <div>{{ session('success') }}</div>
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger rounded-4 py-3 px-4 mb-4 border-0 shadow-sm" role="alert">
                                        <ul class="mb-0 ps-3">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <form action="{{ route('patient.register') }}" method="POST" id="patientEnrollmentForm">
                                @csrf

                                <div class="row g-3">
                                    <!-- PATIENT NAME -->
                                    <div class="col-md-6">
                                        <div class="custom-form-group">
                                            <label class="custom-form-label">
                                                Patient Full Name <span class="required-star">*</span>
                                            </label>
                                            <input type="text" 
                                                   name="patient_name" 
                                                   class="custom-form-control" 
                                                   placeholder="e.g. Rahul Sharma" 
                                                   required>
                                        </div>
                                    </div>

                                    <!-- EMAIL -->
                                    <div class="col-md-6">
                                        <div class="custom-form-group">
                                            <label class="custom-form-label">
                                                Patient Email ID <span class="required-star">*</span>
                                            </label>
                                            <input type="email" 
                                                   name="patient_email" 
                                                   class="custom-form-control" 
                                                   placeholder="e.g. rahul.sharma@example.com" 
                                                   required>
                                        </div>
                                    </div>

                                    <!-- PATIENT CONTACT -->
                                    <div class="col-md-6">
                                        <div class="custom-form-group">
                                            <label class="custom-form-label">
                                                Patient Contact Number <span class="required-star">*</span>
                                            </label>
                                            <div class="custom-input-group">
                                                <span class="custom-input-prefix">+91</span>
                                                <input type="tel" 
                                                       name="patient_contact" 
                                                       class="custom-form-control mobile-number" 
                                                       placeholder="10-digit mobile number" 
                                                       maxlength="10" 
                                                       required>
                                            </div>
                                            <span class="custom-input-helper">Don't include country code</span>
                                        </div>
                                    </div>

                                    <!-- CAREGIVER CONTACT -->
                                    <div class="col-md-6">
                                        <div class="custom-form-group">
                                            <label class="custom-form-label">
                                                Caregiver Contact Number <span class="required-star">*</span>
                                            </label>
                                            <div class="custom-input-group">
                                                <span class="custom-input-prefix">+91</span>
                                                <input type="tel" 
                                                       name="caregiver_contact" 
                                                       class="custom-form-control mobile-number" 
                                                       placeholder="10-digit mobile number" 
                                                       maxlength="10" 
                                                       required>
                                            </div>
                                            <span class="custom-input-helper">Don't include country code</span>
                                        </div>
                                    </div>

                                    <!-- PERMANENT ADDRESS -->
                                    <div class="col-12">
                                        <div class="custom-form-group">
                                            <label class="custom-form-label">
                                                Permanent Address <span class="required-star">*</span>
                                            </label>
                                            <textarea name="permanent_address" 
                                                      id="permanentAddress" 
                                                      class="custom-form-control" 
                                                      rows="2" 
                                                      placeholder="Enter full permanent address with pincode" 
                                                      required></textarea>
                                        </div>
                                    </div>

                                    <!-- DELIVERY ADDRESS -->
                                    <div class="col-12">
                                        <div class="custom-form-group">
                                            <label class="custom-form-label">
                                                Medicine Delivery Address <span class="required-star">*</span>
                                            </label>
                                            <textarea name="delivery_address" 
                                                      id="deliveryAddress" 
                                                      class="custom-form-control" 
                                                      rows="2" 
                                                      placeholder="Enter medicine delivery address" 
                                                      required></textarea>

                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" id="sameAddress">
                                                <label class="form-check-label text-muted small" for="sameAddress">
                                                    Same as my permanent address
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- TERMS & CONSENT -->
                                    <div class="col-12">
                                        <label class="custom-checkbox-container">
                                            <input type="checkbox" name="consent" id="consent" required>
                                            <span>
                                                I agree to the <a href="#" class="text-decoration-underline">terms and conditions</a> and give consent to receive therapy guidance. <span class="required-star">*</span>
                                            </span>
                                        </label>
                                    </div>

                                    <!-- SUBMIT BUTTON -->
                                    <div class="col-12 pt-2">
                                        <button type="submit" class="btn-form-submit">
                                            <span>Enroll Patient</span>
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
