@extends('layout.guest')
@section('content')
    <style>
        .load-button-container {
            display: flex;
            justify-content: center;
            margin-top: 100px;
        }

        .load-button {
            margin: 0 10px !important;
        }
    </style>
    {{-- Header --}}
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/header/magang5.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2 class="text-center">BERITA DAN KEGIATAN</h2>
        </div>
    </div>
    {{-- end Header --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <nav aria-label="breadcrumb bg-body-tertiary">
                    <ol class="breadcrumb p-3 rounded-3 fw-bold fs-6">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item">Berita</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <main id="main">
        <!-- ======= Constructions Section ======= -->
        <section id="constructions" class="constructions">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    {{-- @dd($posts) --}}
                    @foreach ($posts as $post)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3 ">
                            <div class="card h-100">
                                <a href="{{ route('post', $post->slug) }}">
                                    <div class="box-image">
                                        <img src="/storage/posts/{{ $post->image }}" class="img-fluid" alt=""
                                            style="object-fit: cover; height: 200px; width: 100%;">
                                    </div>
                                </a>
                                <div class="card-body text-center">
                                    <a href="{{ route('post', $post->slug) }}">
                                        <h4 class="card-title text-black fs-5 mb-3">{{ $post->title }}</h4>
                                    </a>
                                    <a href="{{ route('post', $post->slug) }}">
                                        <p class="card-text text-black text-start fs-6 p-2">
                                            {{ substr(strip_tags($post->body), 0, 100) }}...</p>
                                    </a>
                                </div>
                                <a href="{{ route('post', $post->slug) }}" class="btn color-yellow text-white m-3">Baca
                                    Selengkapnya</a>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
        </section>
    </main>
@endsection
