@extends('layout.app')

@section('title', 'Input pengurus')

@section('content')

    <div class="container">
        <a href="{{ route('members') }}" class="btn btn-primary mb-3">Kembali</a>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control mb-3" name="image">
                    </div>
                    @error('image')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control mb-3" name="name" placeholder="nama">
                    </div>
                    @error('name')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <input type="text" class="form-control mb-3" name="job" placeholder="jabatan">
                    </div>
                    @error('job')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control mb-3"
                            placeholder="Opsional"></textarea>
                        <button type="submit" class="btn btn-primary btn-block ">submit</button>
                    </div>
                    @error('description')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </form>
            </div>

        </div>
    </div>

@endsection
