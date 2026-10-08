  <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <img src="{{ asset('images/Rxpont logo.png') }}" class="w-100" alt="RxPONT Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link px-3 fs-4 fw-bold" href="tel:+916827421021">
                            <i class="fa-solid fa-phone me-1"></i>
                            +91 6827 421 021
                        </a>
                    </li>
                </ul>

                <hr>
                
                </div>
                <a href="{{ route('patient.register.form') }}" class="btn btn-coral ml-1">New Patient Enrollment</a>
            </div>
        </div>
    </nav>