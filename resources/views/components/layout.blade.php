<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Wetlook Carwash' }} | Wetlook Carwash</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="/img/wetlook-logo.ico" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="/css/vendor/plaza-icon.css">
    <link rel="stylesheet" href="/css/vendor/jquery-ui.min.css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="/css/plugins/slick.css">
    <link rel="stylesheet" href="/css/plugins/animate.min.css">
    <link rel="stylesheet" href="/css/plugins/aos.min.css">
    <link rel="stylesheet" href="/css/plugins/nice-select.css">
    <link rel="stylesheet" href="/css/plugins/venobox.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="/css/style.min.css"> -->
    {!! $style ?? false !!}

</head>

<body>
    <header class="header-section d-lg-block d-none">
        <div class="header-top">
            <div class="container">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-6">
                        <div class="header-top--left">
                            <span>Selamat datang di Wetlook Carwash!</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="header-top--right">
                            <!-- Start Header Top Menu -->
                            {{-- <ul class="header-user-menu">
                                <li class="has-user-dropdown">
                                    <a href="">Setting</a>
                                    <!-- Header Top Menu's Dropdown -->
                                    <ul class="user-sub-menu">
                                        <li><a href="">Checkout</a></li>
                                        <li><a href="">My Account</a></li>
                                        <li><a href="">Shopping Cart</a></li>
                                        <li><a href="">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li class="has-user-dropdown">
                                    <a href="">$ USD</a>
                                    <!-- Header Top Menu's Dropdown -->
                                    <ul class="user-sub-menu">
                                        <li><a href="">EUR – Euro</a></li>
                                        <li><a href="">GBP – British Pound</a></li>
                                        <li><a href="">INR – India Rupee</a></li>
                                    </ul>
                                </li>
                                <li class="has-user-dropdown">
                                    <a href="">English</a>
                                    <!-- Header Top Menu's Dropdown -->
                                    <ul class="user-sub-menu">
                                        <li><a href=""><img class="user-sub-menu-in-icon"
                                                    src="/images/icon/lang-en.png" alt=""> English</a></li>
                                        <li><a href=""><img class="user-sub-menu-in-icon"
                                                    src="/images/icon/lang-gr.png" alt=""> Germany</a></li>
                                    </ul>
                                </li>
                                <li><a href=""><i class="icon-repeat"></i> Compare (0)</a></li>
                            </ul> <!-- End Header Top Menu --> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-center p-2">
            <div class="container">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-3">
                        <div class="header-logo">
                            <a href="/"><img src="/img/logo-mini.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- Start Header Search -->
                        {{-- <div class="header-search">
                            <form action="#" method="post">
                                <div class="header-search-box default-search-style d-flex">
                                    <input class="default-search-style-input-box border-around border-right-none"
                                        type="search" placeholder="Search entire store here ..." required>
                                    <button class="default-search-style-input-btn" type="submit"><i
                                            class="icon-search"></i></button>
                                </div>
                            </form>
                        </div> <!-- End Header Search --> --}}
                    </div>
                    <div class="col-3 text-right">
                        {{-- <ul class="header-action-icon">
                            <li>
                                <a href="/login" class="offcanvas-toggle">
                                    <i class="fa fa-sign-in"></i> Log in
                                </a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div> <!-- End Header Center Area -->

        <!-- Start Bottom Area -->
        <div class="header-bottom sticky-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Header Main Menu -->
                        <div class="main-menu">
                            <x-navbar :mobile="false"></x-navbar>
                        </div> <!-- Header Main Menu Start -->
                    </div>
                </div>
            </div>
        </div> <!-- End Bottom Area -->
    </header> <!-- ...:::: End Header Section:::... -->

    <!-- ...:::: Start Mobile Header Section:::... -->
    <div class="mobile-header-section d-block d-lg-none">
        <!-- Start Mobile Header Wrapper -->
        <div class="mobile-header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <div class="mobile-header--left">
                            <a href="/" class="mobile-logo-link">
                                {{-- <img src="/images/logo/logo.png" alt="" class="mobile-logo-img"> --}}
                                <img src="/img/logo-mini.png" alt="" class="mobile-logo-img">
                            </a>
                        </div>
                        <div class="mobile-header--right">
                            <a href="#mobile-menu-offcanvas" class="mobile-menu offcanvas-toggle">
                                <span class="mobile-menu-dash"></span>
                                <span class="mobile-menu-dash"></span>
                                <span class="mobile-menu-dash"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Mobile Header Wrapper -->
    </div> <!-- ...:::: Start Mobile Header Section:::... -->

    <!-- ...:::: Start Offcanvas Mobile Menu Section:::... -->
    <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-leftside offcanvas-mobile-menu-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="fa fa-times"></i></button>
        </div> <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-mobile-menu-wrapper">
            <!-- Start Mobile Menu User Top -->
            <div class="mobile-menu-top">
                <span>Selamat datang di Wetlook Carwash!</span>
                <!-- Start Header Top Menu -->
            </div> <!-- End Mobile Menu User Top -->
            <!-- Start Mobile Menu User Center -->
            <div class="mobile-menu-center">
                <div class="mobile-menu-customer-support">
                    <div class="mobile-menu-customer-support-icon">
                        <img src="/images/icon/support-icon.png" alt="">
                    </div>
                    <div class="mobile-menu-customer-support-text">
                        <span>Customer Support</span>
                        <a class="mobile-menu-customer-support-text-phone" href="tel:+6282127385724">082127385724</a>
                    </div>
                </div>
                <!-- Start Header Action Icon -->
                <ul class="mobile-action-icon">
                    {{-- <li class="mobile-action-icon-item">
                        <a href="wishlist.html" class="mobile-action-icon-link">
                            <i class="fa fa-sign-in"></i> Log In
                        </a>
                    </li> --}}
                </ul> <!-- End Header Action Icon -->
            </div> <!-- End Mobile Menu User Center -->
            <!-- Start Mobile Menu Bottom -->
            <div class="mobile-menu-bottom">
                <!-- Start Mobile Menu Nav -->
                <div class="offcanvas-menu">
                    <x-navbar :mobile="true"></x-navbar>
                </div> <!-- End Mobile Menu Nav -->

                <!-- Mobile Manu Mail Address -->
                <a class="mobile-menu-email icon-text-right" href="mailto:info@yourdomain.com"><i
                        class="fa fa-envelope-o"> aldin@wetlook-carwash.com</i></a>
            </div> <!-- End Mobile Menu Bottom -->
        </div> <!-- End Offcanvas Mobile Menu Wrapper -->
    </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

    <!-- ...:::: Start Offcanvas Addcart Section :::... -->

    <!-- ...:::: Start Offcanvas Mobile Menu Section:::... -->


    <div class="offcanvas-overlay"></div>
    @if (!request()->is('/'))
        <x-header>{{ $title }}</x-header>
    @endif

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

    <!-- ...:::: Start Footer Section:::... -->
    <footer class="footer-section section-top-gap-100">
        <!-- Start Footer Top Area -->
        <div class="footer-top section-inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-5">
                        <div class="footer-widget footer-widget-contact" data-aos="fade-up" data-aos-delay="0">
                            <div class="footer-logo">
                                <a href="/"><img src="/img/logo-mini.png" alt=""
                                        class="img-fluid"></a>
                            </div>
                            <div class="footer-contact">
                                <p>Jl. Raya Semplak 9-78, RT.01/RW.02, Kel. Cilendek Barat, Kec. Bogor Barat, Kota
                                    Bogor, Jawa Barat 16114</p>
                                <div class="customer-support">
                                    <div class="customer-support-icon">
                                        <img src="/images/icon/support-icon.png" alt="">
                                    </div>
                                    <div class="customer-support-text">
                                        <span>Customer Support</span>
                                        <a class="customer-support-text-phone"
                                            href="tel:6282127385724">082127385724</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-7">

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">

                    </div>
                </div>
            </div>
        </div> <!-- End Footer Top Area -->
        <!-- Start Footer Bottom Area -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright-area">
                            <p class="copyright-area-text">&copy; {{ now()->format('Y') }} <a href="/">Wetlook
                                    Carwash</a>. Made with <i class="fa fa-heart text-danger"></i> by Aldin Caesario
                                Iswandi </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-payment">
                            <a href=""><img class="img-fluid" src="/images/icon/payment-icon.png"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Footer Bottom Area -->
    </footer> <!-- ...:::: End Footer Section:::... -->


    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <script src="/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/js/vendor/jquery-ui.min.js"></script>

    <!--Plugins JS-->
    <script src="/js/plugins/slick.min.js"></script>
    <script src="/js/plugins/material-scrolltop.js"></script>
    <script src="/js/plugins/jquery.nice-select.min.js"></script>
    <script src="/js/plugins/jquery.zoom.min.js"></script>
    <script src="/js/plugins/venobox.min.js"></script>
    <script src="/js/plugins/aos.min.js"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="/js/vendor.min.js"></script>
    <script src="/js/plugins.min.js"></script> -->

    <!-- Main JS -->
    <script src="/js/main.js"></script>
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
    {!! $modal ?? false !!}

</body>

</html>
