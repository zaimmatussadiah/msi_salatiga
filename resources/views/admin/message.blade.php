@extends('layout.app')

@section('title', 'Pesan')

@section('content')
    <div class="container">
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
            <h3>Total Pesan : {{ $messages->total() }}</h3>
        </div>
        <div>
            <a href="{{ route('message.reset') }}" onclick="return confirmDeletion()">
                <button class="btn btn-danger mb-3">Hapus semua pesan</button>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->message }}</td>
                            <td>
                                <form id="deleteForm_{{ $message->id }}"
                                    action="{{ route('message.destroy', $message->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger"
                                        onclick="confirmDelete('{{ $message->id }}')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <ul class="d-flex justify-content-center color2">
                {{ $messages->appends(request()->input())->links('pagination::simple-bootstrap-4') }}
            </ul>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#FFD700',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
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

        function confirmDeletion() {
            return confirm('Are you sure you want to delete all messages?');
        }
    </script>

@endsection
