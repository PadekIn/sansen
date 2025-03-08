<x-app-layout>
    <div class="pagetitle px-4">
        <h1>Data Pakan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Pakan</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section p-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        <a href="{{ route('main.pakan.create') }}" class="primary-default-btn">Tambah Pakan</a>
                    </h5>
                </div>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Jenis Pakan</th>
                            <th>Jumlah</th>
                            <th>Tanggal Beli</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pakans as $pakan)
                            <tr>
                                <td>{{ $pakan->jenis }}</td>
                                <td>{{ $pakan->jumlah }}</td>
                                <td>{{ $pakan->tgl_beli }}</td>
                                <td>{{ $pakan->keterangan }}</td>
                                <td class="no-print">
                                <div class="d-flex">
                                    <a href="{{ route('main.pakan.edit', $pakan->hashid) }}"
                                        class="primary-white-btn">Sunting</a>
                                    <div style="width: 10px;"></div>
                                    <button type="button" onclick="destroy('{{ $pakan->hashid }}')"
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
                text: "Ingin menghapus data Pakan Ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#914149',
                cancelButtonColor: '#3d8497',
                confirmButtonText: 'Ya, Yakin!',
                cancelButtonText: 'Tidak, Batalkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/main/pakan/delete/${id}`;
                }
            });
        }
    </script>
</x-app-layout>
