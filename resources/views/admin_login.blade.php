<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Diasens Connect - Admin Portal Login">
    <title>Admin Login | Diasens Connect</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin_login.css') }}">
</head>

<body>

    <div class="login-page-wrapper">
        <div class="login-card">
            <!-- Header -->
            <div class="login-card-header">
                <div class="admin-badge-pill">
                    <i class="bi bi-shield-lock-fill"></i>
                    <span>Authorized Access Only</span>
                </div>

                <div class="login-brand-icon">
                    <i class="bi bi-heart-pulse-fill"></i>
                </div>

                <h2 class="fs-4 fw-bold mb-1 text-white">Admin Portal</h2>
                <p class="small text-white-50 mb-0">Sign in to manage patient registrations &amp; support</p>
            </div>

            <!-- Body / Form -->
            <div class="login-card-body">

                <!-- Session & Validation Alerts -->
                @if(session('error'))
                    <div class="alert alert-danger d-flex align-items-center gap-2 rounded-4 py-2 px-3 mb-3 border-0 small shadow-sm" role="alert">
                        <i class="bi bi-exclamation-triangle-fill fs-6"></i>
                        <div>{{ session('error') }}</div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger rounded-4 py-2 px-3 mb-3 border-0 small shadow-sm" role="alert">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" id="adminLoginForm">
                    @csrf

                    <!-- Email Input -->
                    <div class="login-input-group">
                        <label for="email">Email Address <span class="text-danger">*</span></label>
                        <div class="login-input-container">
                            <i class="bi bi-envelope-fill login-input-icon"></i>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   class="login-input-control" 
                                   placeholder="admin@rxpont.com" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autofocus>
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="login-input-group">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label for="password" class="mb-0">Password <span class="text-danger">*</span></label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="small text-decoration-none" style="color: #F05C38; font-weight: 600;">
                                    Forgot password?
                                </a>
                            @endif
                        </div>
                        <div class="login-input-container">
                            <i class="bi bi-lock-fill login-input-icon"></i>
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   class="login-input-control" 
                                   placeholder="Enter your secure password" 
                                   required>
                            <button type="button" class="toggle-password-btn" id="togglePasswordBtn" title="Toggle password visibility">
                                <i class="bi bi-eye" id="togglePasswordIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="rememberMe" style="accent-color: #F05C38; cursor: pointer;">
                            <label class="form-check-label small text-muted" for="rememberMe" style="cursor: pointer;">
                                Keep me signed in
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-login-submit">
                        <span>Sign In</span>
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </form>

                <!-- Back to Home -->
                <div class="text-center mt-4">
                    <a href="{{ url('/') }}" class="back-link">
                        <i class="bi bi-arrow-left"></i>
                        <span>Back to Diasens Connect Home</span>
                    </a>
                </div>

                <!-- Security Note -->
                <div class="security-badge">
                    <i class="bi bi-shield-check text-success"></i>
                    <span>256-Bit SSL Encrypted &amp; HIPAA Compliant</span>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Password toggle script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleBtn = document.getElementById('togglePasswordBtn');
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePasswordIcon');

            if (toggleBtn && passwordInput && toggleIcon) {
                toggleBtn.addEventListener('click', () => {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                    toggleIcon.classList.toggle('bi-eye', !isPassword);
                    toggleIcon.classList.toggle('bi-eye-slash', isPassword);
                });
            }
        });
    </script>
</body>

</html>
