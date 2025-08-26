@extends('layout.app')

@section('title', 'Input Berita & Kegiatan')
@section('content')

    <div class="container">
        <div class="mb-3">
            <h3>Total Data Berita & Kegiatan : {{ $posts->total() }}</h3>
        </div>
        <a href="{{ route('post.create') }}" class="btn btn-primary my-3">Tambah data</a>
        <input type="radio" class="btn btn-check"></input>
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
                }, 3000);
            </script>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                    <tr class="text-nowrap">
                        <th>no</th>
                        <th>judul</th>
                        <th>Isi</th>
                        <th>Gambar</th>
                        <th>Dibuat Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="fs-6">
                    @php
                        $i = $posts->firstItem(); // Mengambil nomor awal
                    @endphp
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ substr(strip_tags($post->body), 0, 50) }}...</td>
                            <td>
                                <img src="/storage/posts/{{ $post->image }}" alt="" class="img-fluid"
                                    width="90">
                            </td>
                            <td class="text-nowrap">{{ $post->created_at->toFormattedDateString() }}</td>
                            <td class="text-center d-flex flex-column gap-2">
                                <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('post.destroy', $post->id) }}" method="POST"
                                    id="deleteForm_{{ $post->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger"
                                        onclick="confirmDelete('{{ $post->id }}')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <ul class="d-flex justify-content-center color2">
                {{ $posts->appends(request()->input())->links('pagination::simple-bootstrap-4') }}
            </ul>

        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#FFD700',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Data berhasil dihapus.',
                        'success'
                    )
                    document.getElementById('deleteForm_' + id).submit();
                }
            })
        }
    </script>

@endsection
