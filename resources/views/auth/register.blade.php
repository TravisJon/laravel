<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>TCS Service</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('Template') }}/assets/img/favicon1.jpg" rel="icon">
    <link href="{{ asset('Template') }}/assets/img/favicon1.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('Template') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('Template') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('Template') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('Template') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('Template') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ asset('Template') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('Template') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('Template') }}/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <style>
        body {
            background: linear-gradient(45deg, #3a73d0, #4bbecf);
        }
    </style>

</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">TCS Service - Register</h5>
                                        <p class="text-center small">Masukkan detail pribadi untuk membuat akun</p>
                                    </div>

                                    <form class="row g-3 needs-validation" action="{{ url('/registeruser') }}"
                                        method="POST">
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="yourName"
                                                required>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="yourEmail"
                                                required>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Pilih Role</label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="role_id" value="">
                                                @foreach ($role as $r)
                                                    <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- <div class="col-12">
                                            <label for="yourPassword" class="form-label">Pilih Role</label>
                                            <select name="role_id" id="" class="form-control">
                                                <option value="" selected disabled>--- Pilih Role ----</option>
                                                @foreach ($role as $r)
                                                    <option value="{{ $r->id }}">{{ $r->role_id }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please enter your Role!</div>
                                        </div> --}}

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox"
                                                    value="" id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">Saya setuju menerima
                                                    <a href="#">Syarat & Ketentuan</a></label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Sudah punya akun? <a href="{{ url('/') }}">Log
                                                    in</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                Designed by <a href="#">Prayoga</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('Template') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('Template') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Template') }}/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="{{ asset('Template') }}/assets/vendor/echarts/echarts.min.js"></script>
    <script src="{{ asset('Template') }}/assets/vendor/quill/quill.min.js"></script>
    <script src="{{ asset('Template') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ asset('Template') }}/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('Template') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('Template') }}/assets/js/main.js"></script>

</body>

</html>
