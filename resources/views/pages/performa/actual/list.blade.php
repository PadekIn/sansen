<x-app-layout>
<div class="pagetitle px-4">
        <h1>Data Performa Actual</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Performa Actual</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section p-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        <a href="{{ route('main.actual.create') }}" class="primary-default-btn">Tambah Performa Actual</a>
                    </h5>
                </div>
                <!-- @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif -->
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
                                <td class="no-print">
                                <div class="d-flex">
                                    <a href="{{ route('main.actual.edit', $actual->hashid) }}"
                                        class="primary-white-btn">Sunting</a>
                                    <div style="width: 10px;"></div>
                                    <button type="button" onclick="destroy('{{ $actual->hashid }}')"
                                        class="secondary-default-btn">Hapus</button>
                                </div>
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
                confirmButtonColor: '#914149',
                cancelButtonColor: '#3d8497',
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
