
    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <a class="navbar-brand text-white mb-3 d-inline-block" href="#"><img src="{{ asset('images/Rxpont logo.png') }}" alt="RxPONT Logo"></a>
                    <!-- <p class="text-white-50 small">Empowering modern healthcare providers with intuitive telehealth SaaS tools.</p> -->
                </div>
                <div class="col-md-4 col-6">
                    <h6 class="fw-bold mb-3">Contact</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('patient.register.form') }}"><i class="fa-solid fa-user-plus"></i> Register</a></li>
                        <li class="mb-2"><a href="#"><i class="fa-solid fa-phone"></i> 8073376393</a></li>
                        <li class="mb-2"><a href="#"><i class="fa-brands fa-whatsapp"></i> 8073376393</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-6">
                    <h6 class="fw-bold mb-3">Access</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('admin.login') }}">Access Portal</a></li>
                        <!-- <li class="mb-2"><a href="#">Careers</a></li>
                        <li class="mb-2"><a href="#">Press Kit</a></li> -->
                    </ul>
                </div>
                <!-- <div class="col-md-2 col-6">
                    <h6 class="fw-bold mb-3">Legal</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#">Privacy Policy</a></li>
                        <li class="mb-2"><a href="#">Terms of Service</a></li>
                        <li class="mb-2"><a href="#">HIPAA Compliance</a></li>
                    </ul>
                </div> -->
            </div>
            <div class="border-top border-secondary pt-4 text-center text-white-50 small">
                © <?= date('Y') ?> RxPONT India Pvt Ltd. All rights reserved.
            </div>
        </div>
    </footer>