@extends('layout.guest')
@section('content')
    {{-- Header --}}
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/header/magang7.jpg');">
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
                        <li class="breadcrumb-item"><a href="/berita">Berita</a></li>
                        <li class="breadcrumb-item">Postingan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <h1 class="mb-3 mt-3">{{ $post->title }}</h1>
                <img src="{{ Storage::url('posts/' . $post->image) }}" class="img-fluid" alt="Gambar"
                    style="width: 100%; margin-top: 30px;">
            <div class="content ps-0 ps-lg-4 mb-5" style="white-space: pre-line; word-wrap: break-word;">
                {!! $post->body !!}
            </div>
        </div>
    </div>
@endsection
