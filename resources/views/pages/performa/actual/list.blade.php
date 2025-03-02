<x-app-layout>
    <div class="pagetitle px-4">
        <h1>Daftar Performa Actual</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main.actual') }}">Performa Actual</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section p-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        <a href="{{ route('main.actual.create') }}" class="btn btn-primary">Tambah Performa Actual</a>
                    </h5>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Populasi</th>
                            <th>FCR</th>
                            <th>FI</th>
                            <th>FE</th>
                            <th>DEP</th>
                            <th>ABW</th>
                            <th>ADG</th>
                            <th>IP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($actuals as $actual)
                            <tr>
                                <td>{{ $actual->populasi->jumlah }}</td>
                                <td>{{ $actual->fcr }}</td>
                                <td>{{ $actual->fi }}</td>
                                <td>{{ $actual->fe }}</td>
                                <td>{{ $actual->dep }}</td>
                                <td>{{ $actual->abw }}</td>
                                <td>{{ $actual->adg }}</td>
                                <td>{{ $actual->ip }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('main.actual.edit', $actual->hashid) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                        <form action="{{ route('main.actual.delete', $actual->hashid) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        function destroy(id) {
            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: "Ingin menghapus data Performa Actual Ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Yakin!',
                cancelButtonText: 'Tidak, Batalkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/main/actual/delete/${id}`;
                }
            });
        }
    </script>
</x-app-layout>
