@extends('layout.app')

@section('title', 'Input Berita & Kegiatan')

@section('content')

    <div class="container">
        <style>
            trix-toolbar [data-trix-button-group='file-tools'] {
                display: none;
            }

            .trix-content {
                height: 150px;
                overflow-y: auto;
            }
        </style>
        <a href="{{ route('list-posts') }}" class="btn btn-primary mb-3">Kembali</a>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" name="title" placeholder="Judul">
                        @error('title')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Sampul</label>
                        <img class="img-preview img-fluid mb-2">
                        <input type="file" class="form-control mb-3" name="image" id="image" onchange="previewImage()">
                        @error('image')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="body">Isi Berita</label>
                        <input id="body" type="hidden" name="body">
                        <trix-editor input="body" class="trix-content"></trix-editor>
                        @error('image')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                        <button type="submit" class="btn btn-primary btn-block ">submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
                    const image = document.querySelector('#image');
                    const imgPreview = document.querySelector('.img-preview');

                    imgPreview.style.display = 'block';

                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(image.files[0]);
                    oFReader.onload = function(oFREvent) {
                        imgPreview.src = oFREvent.target.result;
                    }
                }
    </script>

@endsection
