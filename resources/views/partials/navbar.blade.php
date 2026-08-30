<nav class="navbar navbar-expand-lg sticky-top navbar-custom" id="mainNavbar">
    <div class="container">
        <!-- Brand Logo -->
        <a class="brand-logo-container" href="{{ url('/') }}">
            <div>
                <img src="{{asset('images/Rxpont logo.png')}}" alt="logo">
            </div>
        </a>

        <!-- Mobile Toggler -->
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list fs-2 text-dark"></i>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2 my-3 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/#about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/#pontassist') }}">PONTAssist™</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/#support') }}">Our Support</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a href="{{route('patient.register.form')}}" class="btn-coral-pill text-decoration-none">
                        <span>Enroll Patient</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
