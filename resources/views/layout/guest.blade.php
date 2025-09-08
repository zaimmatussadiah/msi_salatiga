<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Mentari Sehat Indonesia Kota Salatiga</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="/assets/img/logo-msi.jpg" rel="icon">
    <link href="/assets/img/logo-msi.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Your main CSS file -->
    <link href="/assets/css/main.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/trix.css">

    <!-- Gaya untuk menahan header di bagian atas saat scroll -->
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        header {
            background-color: transparent;
            transition: background-color 0.3s ease-in-out;
        }

        .navbar {
            padding: 3px 0;
        }

        .fixed-top {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        table tr td,
        table tr th {
            background-color: rgba(255, 255, 255, 0) !important;
        }
    </style>
</head>

<body id="body">
    <header id="header" class="header p-3 d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <img src="/assets/img/navbar-logo.png" alt="" width="100">
            </a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar fs-3">
                <ul class="column-gap-3">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('posts') }}">Berita dan Kegiatan</a></li>
                    <li class="dropdown">
                        <a href="#">
                            TENTANG KAMI
                            <i class="bi bi-chevron-down dropdown-indicator"></i>
                        </a>
                        <ul>
                            <li><a href="{{ route('about') }}">Mentari Sehat KotaSalatiga</a></li>
                            <li><a href="{{ route('about') }}#pengurus">Pengurus</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('contact') }}">Hubungi Kami</a></li>
                    <li>
                        <a href="{{ route('login') }}"
                            class="btn color-yellow text-white d-flex justify-content-center align-items-center"
                            style="width: 80px; height: 40px;">Login</a>
                    </li>
                </ul>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <!-- Bagian konten web Anda -->
    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="footer-content position-relative">
                <div class="container-fluid py-5 content-footer text-light">
                    <div class="container">
                        <h2 class="text-center mb-4" style="font-size: 3vw;">YAYASAN MENTARI SEHAT INDONESIA KOTA SALALATIGA</h2>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="col-sm-1 d-flex justify-content-center mt-4 mb-2">
                                <a href="https://www.instagram.com/msikotasalatiga?igsh=MWcyMTN6d2h1MDJtaw==" class="tanpaWarna">
                                    <i class="bi bi-instagram fs-2"></i></a>
                            </div>
                            <div class="col-sm-1 d-flex justify-content-center mt-4 mb-2">
                                <a href="" class="tanpaWarna">
                                    <i class="fab fa-youtube fs-2"></i></a>
                            </div>
                            <div class="col-sm-1 d-flex justify-content-center mt-4 mb-2">
                                <a href=""
                                    class="tanpaWarna">
                                    <i class="bi bi-tiktok fs-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid  content-footer text-light">
                    <div class="container d-flex flex-column justify-content-center align-items-center">
                        <p>Jl. Pramuka RT 01 RW 05, Ngablak, Pulutan, Sidorejo, Kota Salatiga</p>
                        <table class="table table-dark table-transparent table-borderless" style="width: 300px;">
                            <tr class="">
                                <th scope="row "><strong>Phone:</strong></th>
                                <th>085868285794 </th>
                            </tr>
                            <tr class="">
                                <th scope="row "><strong>Email:</strong></th>
                                <th>ssrmsikotasalatiga@gmail.com</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="footer-legal text-center position-relative">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong>
                        <a href="https://www.instagram.com/wigiggg/"><span>Mentari Sehat Indonesia Kota Salatiga
                                </span></strong>
                    </a>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="https://www.instagram.com/msikotasalatiga?igsh=MWcyMTN6d2h1MDJtaw==">Mentari Sehat Indonesia Kota Salatiga</a>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/trix.js"></script>
    {{-- JQUERRY --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Tambahkan script ini di akhir file sebelum tag </body> -->
    <script>
        var header = document.getElementById("header");

        window.onscroll = function() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                header.classList.add("fixed-top");
                header.style.backgroundColor = "rgba(0, 0, 0, 0.8)"; // Ganti warna latar belakang pada scroll
            } else {
                header.classList.remove("fixed-top");
                header.style.backgroundColor = "transparent"; // Kembalikan ke transparan saat tidak di-scroll
            }
        };
    </script>
</body>

</html>
