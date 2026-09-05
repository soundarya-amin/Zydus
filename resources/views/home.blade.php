@extends('layouts.app')

@section('title', 'Diasens Connect | Patient Support Program')

@section('content')

    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="badge-hero"><i class="bi bi-shield-check me-1"></i> CGM Enrollment Program</span>
                    <h1 class="hero-title mb-3">Getting your CGM connected, one step at a time.</h1>
                    <p class="text-muted lead mb-4 fs-6">Diasens Connect is how Rx Pont turns your prescription into a working, continuous glucose monitor — sensor, app, and clinician connection  included. Most people are up and running after enrolling.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('patient.register.form') }}" class="btn btn-coral">Start Enrollment</a>
                        <a href="#" class="btn btn-outline-custom">See How It Works</a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="hero-img-wrapper text-center">
                        <div class="floating-badge fb-1">
                            <span class="bg-success rounded-circle p-1"></span> Live Consultation
                        </div>
                        <div class="floating-badge fb-2">
                            <i class="bi bi-heart-pulse-fill text-danger"></i> Patient Care Verified
                        </div>
                        <img src="{{ asset('images/heroDia.png') }}" alt="Doctor" class="img-fluid rounded-4 shadow">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TRUST LOGOS -->
    <section class="py-4 border-top border-bottom bg-light">
        <div class="container">
            <img src="{{ asset('images/logodiasens.png') }}" class='' alt="Diasens Logo">
            <div class="row">
                <div class="col-md-6 d-flex-justify-content-center">
                    <img src="{{ asset('images/about.png') }}" class='w-50' alt="About Diasens">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div >
                        <!-- <span class="fw-bold fs-5 text-secondary"><i class="bi bi-hospital me-1"></i> LOGOIPSUM</span>
                        <span class="fw-bold fs-5 text-secondary"><i class="bi bi-capsule me-1"></i> HEALTHCARE</span>
                        <span class="fw-bold fs-5 text-secondary"><i class="bi bi-activity me-1"></i> MEDIPLUS</span>
                        <span class="fw-bold fs-5 text-secondary"><i class="bi bi-heart-pulse me-1"></i> CAREFIRST</span> -->
                        <h1 class='text-start'>Your glucose has something to say... <br><br><span style='color:#5aa5a1'>Diasens</span> help translate it.</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section id="features" class="py-5">
        <div class="container py-4">
            <div class="text-center max-w-xl mx-auto mb-5">
                <p class="text-muted">THE BRIDGE</p>

                <h2 class="fw-bold">From prescription to sensor, in four steps</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-icon">1</div>
                        <h5 class="fw-bold mb-2">Prescription received</h5>
                        <p class="text-muted small mb-0">Rx Pont receives your CGM prescription directly from you and opens your Diasens Connect file.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-icon">2</div>
                        <h5 class="fw-bold mb-2">Enroll</h5>
                        <p class="text-muted small mb-0">You confirm your details and information online or by phone — usually under ten minutes. </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-icon">3</div>
                        <h5 class="fw-bold mb-2">Sensor installation</h5>
                        <p class="text-muted small mb-0">Our CGM specialist on field will visit you and assist, walking you through placement and pairing to the app step by step.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-icon">4</div>
                        <h5 class="fw-bold mb-2">Ongoing connection</h5>
                        <p class="text-muted small mb-0">Readings sync automatically to your clinic. Diasens Connect support stays reachable for sensor changes and questions.</p>
                    </div>
                </div>
                <!-- <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="bi bi-credit-card"></i></div>
                        <h5 class="fw-bold mb-2">Payments</h5>
                        <p class="text-muted small mb-0">Integrated billing, card processing, and automatic insurance claim generation.</p>
                    </div>
                </div> -->
                <!-- <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="bi bi-shield-lock"></i></div>
                        <h5 class="fw-bold mb-2">Secure & Compliant</h5>
                        <p class="text-muted small mb-0">HIPAA and GDPR compliant infrastructure ensuring total privacy.</p>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS (DARK SECTION) -->
    <section id="steps" class=" mb-2">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-6 align-items-center justify-content-center gy-4" data-aos="zoom-in" data-aos-delay="100">
                    <!-- <div class=''> -->
                        <img src="{{ asset('images\Rxpont logo.png') }}" alt="" srcset="" class="img-fluid mx-auto d-block">
                    <!-- </div> -->
                </div>
                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div>
                        <h1 class='text-center rxpont1 '>RxP<span class='rxpont2'>O</span>NT</h1>
                    </div>
                    <p class='text-start'>
                        Is India’s leading therapy initiation and patient support organization. Our goal is to help patients like you access important breakthrough medicines prescribed by your doctor with ease.
                    </p>
                    <p class='text-start'>
                        At RxPONT, we provide guidance, treatment assistance, and continuous support for your medication needs. Our mission is to make your treatment journey smooth, supportive, and worry-free.

                    </p>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section id="steps" class="mt-4" >
        <div class="container text-center">
            <div class="row">
                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div>
                        <h5 class='justify-content-start'>What is</h5>
                        
                        <h1 class='text-center rxpont1 '>P<span class='rxpont2'>O</span>NT Assist</h1>
                    </div>
                    <p class='text-start'>
                       PontAssist™ is a therapy initiation platform developed by RxPONT. It ensures patients begin and continue their treatment without delays. Supporting Zydus Lifesciences Patient Assistance Program for Diasens, PontAssist™ ensures timely and efficient access to prescribed medications.


                    </p>
                    <p class='text-start'>
                        Our platform is built to accompany you throughout your treatment journey—making the entire process easier and stress-free.

                    </p>
                </div>
                <div class="col-md-6 d-flex align-items-center"data-aos="zoom-in" data-aos-delay="100">
                    <div>
                        <img class='w-50' src="{{ asset('images/pont_assist.png') }}" alt="PontAssist" srcset="">
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section id="testimonials" class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold">What You Can Expect from PONTAssist<sup>TM</sup></h2>
                <p class="text-muted">Your Support Partner in the Treatment Journey.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-12">
                    <!-- <h4 class='text-center'>
                        Your Support Partner in the Treatment Journey
                    </h4> -->
                    <p>
                        <b>PontAssist<sup>TM</sup></b> is designed to make your experience with Diasen CGM safe, easy, and seamless. Through this platform, you gain access to the full benefits of Zydus Patient Support Program.

                    </p>
                    <h5>
                        Here’s how PontAssist™ supports you:

                    </h5>
                    <h6>
                        <i class="fa-solid fa-circle-dot"></i> Simplified Enrollment Process
                    </h6>
                    <p>
                        Say goodbye to lengthy paper forms. Our secure E-Consent system simplifies the enrollment process with clear, easy-to-understand digital steps.

                    </p>
                    <h6>
                        <i class="fa-solid fa-circle-dot"></i> Informed and Compliant Consent
                    </h6>
                    <p>
                        We ensure you fully understand your treatment plan before you begin. Our process follows all legal and safety protocols, reducing the chance of errors or misunderstandings.

                    </p>
                    <h6>
                        <i class="fa-solid fa-circle-dot"></i>  Confidential and Secure Data Handling
                    </h6>
                    <p>
                        Your medical and personal data are kept safe and accessible only to authorized healthcare professionals involved in your care.

                    </p>
                    <h6>
                        <i class="fa-solid fa-circle-dot"></i>   Installing CGM and educating about the device

                    </h6>
                    <p>
                        We assist you in Zydus’s Assistance Program. Our team visits you at your convenience to help avoid delays in starting your treatment.


                    </p>
                    <h6>
                        <i class="fa-solid fa-circle-dot"></i>  Support at Every Step
                    </h6>
                    <p>
                        From medication reminders to follow-ups, PontAssist™ acts as your trusted companion throughout the treatment journey.
                    </p>
                </div>
                
                
            </div>
        </div>
    </section>

    <!-- PRICING -->
    <!-- <section id="pricing" class="py-5">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Flexible Plans for Every Scale</h2>
                <p class="text-muted">Choose the right plan to power your practice.</p>
            </div>
            <div class="row g-4 align-items-stretch">
                 Starter 
                <div class="col-md-4">
                    <div class="pricing-card">
                        <div>
                            <small class="text-muted fw-bold text-uppercase">Starter</small>
                            <h2 class="fw-bold my-3">$49 <span class="fs-6 text-muted fw-normal">/mo</span></h2>
                            <ul class="list-unstyled mb-4 small text-muted">
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i> Up to 50 consultations/mo</li>
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i> 1 Practitioner Account</li>
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i> Basic Scheduling</li>
                                <li class="mb-2 text-decoration-line-through opacity-50"><i class="bi bi-x me-2"></i> Custom Branding</li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-outline-custom w-100">Get Started</a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="pricing-card featured">
                        <span class="pricing-badge">Most Popular</span>
                        <div>
                            <small class="text-muted fw-bold text-uppercase">Professional</small>
                            <h2 class="fw-bold my-3">$129 <span class="fs-6 text-muted fw-normal">/mo</span></h2>
                            <ul class="list-unstyled mb-4 small text-muted">
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i> Unlimited consultations</li>
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i> Up to 5 Staff Accounts</li>
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i> Advanced EHR & e-Rx</li>
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i> Custom Branding</li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-coral w-100">Get Started</a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="pricing-card">
                        <div>
                            <small class="text-muted fw-bold text-uppercase">Enterprise</small>
                            <h2 class="fw-bold my-3">Custom</h2>
                            <ul class="list-unstyled mb-4 small text-muted">
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i> Unlimited Staff & Clinics</li>
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i> Dedicated API Integration</li>
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i> 24/7 Priority Support</li>
                                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i> Custom SLA Agreement</li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-outline-custom w-100">Contact Sales</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- FAQ SECTION -->
    <!-- <section id="faq" class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5 max-w-xl mx-auto">
                <h2 class="fw-bold">Frequently Asked Questions</h2>
                <p class="text-muted">Find answers to common questions about setting up your telehealth clinic.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Is MediCloud HIPAA compliant?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body small text-muted">
                                    Yes, MediCloud is fully HIPAA compliant and adheres to end-to-end encryption standards to protect patient confidentiality.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    How long does setup take?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body small text-muted">
                                    You can set up your practice profile and start taking appointments in less than 10 minutes.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Can patients use MediCloud without downloading an app?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body small text-muted">
                                    Yes! Consultations open directly in any modern browser on mobile or desktop without software installations.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

@endsection
