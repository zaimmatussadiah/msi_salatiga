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
                <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" name="title" placeholder="Judul"
                            value="{{ old('title', $post->title) }}">
                        @error('title')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    @if ($post->image)
                        <img src="/storage/posts/{{ $post->image }}" alt="" class="img-fluid img-preview">
                    @endif
                    <div class="form-group">
                        <label for="file">Gambar</label>
                        <input type="file" class="form-control mb-3" name="image" id="image"
                            value="{{ old('image', $post->image) }}" onchange="previewImage()">
                        @error('image')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="body">Isi Berita</label>
                        <input id="body" type="hidden" name="body" value="{!! old('body', $post->body) !!}">
                        <trix-editor input="body" class="trix-content"></trix-editor>
                        @error('description')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block ">Edit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script>
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

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>

@endsection
