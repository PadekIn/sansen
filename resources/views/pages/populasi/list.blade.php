<x-app-layout>
    <div class="pagetitle px-4">
        <h1>Data Populasi</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Populasi</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section p-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        <a href="{{ route('main.populasi.create') }}" class="primary-default-btn">Tambah Populasi</a>
                    </h5>
                </div>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Jumlah</th>
                            <th>Berat</th>
                            <th>Umur Akhir</th>
                            <th>Grade DOC</th>
                            <th>BW DOC</th>
                            <th>Asal DOC</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($populasis as $populasi)
                            <tr>
                                <td>{{ $populasi->jumlah }}</td>
                                <td>{{ $populasi->berat }}</td>
                                <td>{{ $populasi->umur_akhir }}</td>
                                <td>{{ $populasi->grade_doc }}</td>
                                <td>{{ $populasi->bw_doc }}</td>
                                <td>{{ $populasi->asal_doc }}</td>
                                <td>{{ $populasi->check_in }}</td>
                                <td>{{ $populasi->check_out }}</td>
                                <td class="no-print">
                                <div class="d-flex">
                                    <a href="{{ route('main.populasi.edit', $populasi->hashid) }}"
                                        class="primary-white-btn">Sunting</a>
                                    <div style="width: 10px;"></div>
                                    <button type="button" onclick="destroy('{{ $populasi->hashid }}')"
                                        class="secondary-default-btn">Hapus</button>
                                </div>
                            </td>
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
                text: "Ingin menghapus data Populasi Ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#914149',
                cancelButtonColor: '#3d8497',
                confirmButtonText: 'Ya, Yakin!',
                cancelButtonText: 'Tidak, Batalkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/main/populasi/delete/${id}`;
                }
            });
        }
    </script>
</x-app-layout>
