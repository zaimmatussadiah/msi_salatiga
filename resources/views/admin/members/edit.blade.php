@extends('layout.app')

@section('title', 'Input pengurus')

@section('content')

    <div class="container">
        <a href="{{ route('members') }}" class="btn btn-primary mb-3">Kembali</a>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('member.update', $pengurus->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <img src="/storage/members/{{ $pengurus->image }}" alt="" class="img-fluid">
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control mb-3" name="image">
                    </div>
                    @error('image')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control mb-3" name="name" placeholder="name"
                            value="{{ $pengurus->name }}">
                    </div>
                    @error('name')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <input type="text" class="form-control mb-3" name="job" placeholder="job"
                            value="{{ $pengurus->job }}">
                    </div>
                    @error('job')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control mb-3"
                            placeholder="Opsional">{{ $pengurus->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </form>
            </div>

        </div>
    </div>

@endsection
