@extends('layout.app')

@section('title', 'Input Pengurus')

@section('content')

    <div class="container">
        <a href="{{ route('member.create') }}" class="btn btn-primary mb-3">Tambah data</a>
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

        <div class="mb-3">
            <h3>Total Pengurus : {{ count($members) }}</h3>
        </div>


        <div class="table-responsive">
            <table class=" table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th class="text-center">no</th>
                        <th class="text-center">image</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($members as $member)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td class="text-center">
                                <img src="/storage/members/{{ $member->image }}" alt="" class="img-fluid" width="90">
                            </td>
                            <td class="text-center">{{ $member->name }}</td>
                            <td class="text-center">{{ $member->job }}</td>
                            <td class="text-center">{{ $member->description }}</td>
                            <td class="text-center d-flex gap-2">
                                <a href="{{ route('member.edit', $member->id) }}" class="btn btn-warning d-flex">Edit</a>
                                <form action="{{ route('member.destroy', $member->id) }}" method="POST"
                                    id="deleteForm_{{ $member->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger d-flex"
                                        onclick="confirmDelete('{{ $member->id }}')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#FFD700', // Kunjung
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
