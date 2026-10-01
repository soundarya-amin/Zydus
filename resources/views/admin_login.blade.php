<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
    </style>
</head>
<body style="background-color: #eee;">
    <section class="h-100 gradient-form" >
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">

                            <div class="text-center">
                            <img src="{{ asset('images/Rxpont logo.png') }}"
                                style="width: 185px;" alt="logo">
                            <h4 class="mt-1 mb-5 pb-1">Diasense- Login</h4>
                            </div>

                           <form method="POST" action="{{ route('admin.login') }}">
                            @csrf
                            <h4 class='mb-3'>Login to your account</h4>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" name='email' id="form2Example11" class="form-control"
                                placeholder="Userid" />
                                <label class="form-label" for="form2Example11">Username</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" name='password' id="form2Example22" class="form-control"  placeholder="Password" />
                                <label class="form-label" for="form2Example22">Password</label>
                            </div>

                            <div class="text-center pt-1 mb-5 pb-1">
                                <button  class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log
                                in</button>
                                <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                            </div>

                            <!-- <div class="d-flex align-items-center justify-content-center pb-4">
                                <p class="mb-0 me-2">Don't have an account?</p>
                                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger">Create new</button>
                            </div> -->

                            </form>

                        </div>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-center align-items-center gradient-custom-2">
                        <img src="#" class='w-50' alt="" >
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>  
</body>
</html>