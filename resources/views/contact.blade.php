@extends('layout.guest')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <style>
        trix-toolbar [data-trix-button-group='file-tools'] {
            display: none;
        }

        .trix-content {
            height: 150px;
            overflow-y: auto;
        }
    </style>
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/header/magang2.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2 class="text-center">HUBUNGI KAMI</h2>
            <ol>
                <li><a href="/">BERANDA</a></li>
                <li>KONTAK</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            @if (session('message'))
                <div id="notification" class="alert alert-success mb-3">
                    {{ session('message') }}
                </div>

                <script>
                    setTimeout(function() {
                        var notification = document.getElementById('notification');
                        if (notification) {
                            notification.style.display = 'none';
                        }
                    }, 6000);
                </script>
            @endif
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center p-5">
                        <i class="bi bi-map"></i>
                        <h3>Alamat</h3>
                        <p class="text-center">Jl. Pramuka RT 01 RW 05, Ngablak, Pulutan, Sidorejo, Kota Salatiga</p>
                    </div>
                </div>
                <!-- End Info Item -->
                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center p-5">
                        <i class="bi bi-envelope"></i>
                        <h3>Email Kami</h3>
                        <p>ssrmsikotasalatiga@gmail.com</p>
                    </div>
                </div>
                <!-- End Info Item -->
                <div class="col-lg-3 col-md-6">
                    <div class="info-item  d-flex flex-column justify-content-center align-items-center p-5">
                        <i class="bi bi-telephone"></i>
                        <h3>Hubungi Kami</h3>
                        <p>085868285794</p>
                    </div>
                </div>
                <!-- End Info Item -->
            </div>

            <div class="row gy-4 mt-1">
                <div class="col-lg-6 ">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d253442.24885861765!2d110.4381254!3d-7.0051453!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70ebe34747a471%3A0x6ef1f990d78ce485!2sMentari%20Sehat%20Indonesia%20Kab.%20Demak!5e0!3m2!1sen!2sid!4v1693535022899!5m2!1sen!2sid"
                        frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen>
                    </iframe>
                </div>
                <!-- End Google Maps -->
                <div class="col-lg-6">
                    <div id="pesan">
                        <h1 class="text-center fs-3 p-2">Kirim Pesan</h1>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="kontakForm" action="{{ route('message') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Nama anda" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Email Anda" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <input id="message" type="hidden" name="message">
                                            <trix-editor input="message" class="trix-content"></trix-editor>
                                        </div>
                                        <button type="submit" class="btn color-yellow btn-block mb-3 text-white">Kirim
                                            Pesan</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->


    </main><!-- End #main -->
@endsection
