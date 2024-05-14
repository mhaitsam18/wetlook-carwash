<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title ?? 'Wetlook Carwash' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" href="/assets/img/wetlook-logo.png">
    <link rel="apple-touch-icon" href="/assets/img/wetlook-logo.png">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets-niceadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets-niceadmin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets-niceadmin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets-niceadmin/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assets-niceadmin/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assets-niceadmin/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets-niceadmin/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets-niceadmin/css/style.css" rel="stylesheet">
    {!! $style ?? false !!}

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <x-admin-header></x-admin-header>
    <x-admin-sidebar></x-admin-sidebar>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $title ?? 'Wetlook Carwash' }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/index">Dashboard</a></li>
                    {!! $headers ?? false !!}
                    <li class="breadcrumb-item active">{{ $title ?? 'Wetlook Carwash' }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                @if (session()->has('error') || (isset($errors) && $errors->any()))
                    <x-alert type="error" :message="session()->get('error') ? session()->get('error') : 'Terjadi Kesalahan'" :colour="'danger'" />
                @endif
                @if (session()->has('success'))
                    <x-alert type="success" :message="session()->get('success')" :colour="'success'" />
                @endif
                @if (session()->has('status'))
                    <x-alert type="status" :message="session()->get('status')" :colour="'info'" />
                @endif
                @if (session()->has('warning'))
                    <x-alert type="warning" :message="session()->get('warning')" :colour="'warning'" />
                @endif

                {{ $slot }}

            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Wetlook Carwash</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Created by <a href="#">Aldin Caesario Iswandi</a>
        </div>
    </footer><!-- End Footer -->
    {!! $modal ?? false !!}

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets-niceadmin/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets-niceadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets-niceadmin/vendor/chart.js/chart.umd.js"></script>
    <script src="/assets-niceadmin/vendor/echarts/echarts.min.js"></script>
    <script src="/assets-niceadmin/vendor/quill/quill.js"></script>
    <script src="/assets-niceadmin/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/assets-niceadmin/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assets-niceadmin/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets-niceadmin/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const success = $('.flash-data').data('success');
        if (success) {
            //'Data ' +
            Swal.fire({
                title: 'Berhasil',
                text: success,
                icon: 'success'
            });
        }
        const error = $('.flash-data').data('error');
        if (error) {
            //'Data ' +
            Swal.fire({
                title: 'Gagal',
                text: error,
                icon: 'error'
            });
        }
        const warning = $('.flash-data').data('warning');
        if (warning) {
            //'Data ' +
            Swal.fire({
                title: 'Perhatian',
                text: warning,
                icon: 'warning'
            });
        }
        $('.access-denied').on('click', function(e) {
            e.preventDefault(); // Mencegah pengiriman formulir secara langsung

            //'Data ' +
            Swal.fire({
                title: 'Akses ditolak',
                text: 'Anda tidak memiliki otoritas untuk membuka fitur ini',
                icon: 'warning'
            });
        });
        $('.tombol-hapus').on('click', function(e) {
            e.preventDefault(); // Mencegah pengiriman formulir secara langsung

            const form = $(this).closest('form'); // Menemukan formulir terdekat

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data ini akan dihapus!",
                icon: 'warning',
                confirmButtonText: 'Hapus',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Mengirimkan formulir setelah konfirmasi
                }
            });
        });
    </script>
    {!! $script ?? false !!}

</body>

</html>
