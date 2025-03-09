<x-app-layout>
        <div class="pagetitle px-4">
            <h1> Data Perkembangan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Perkembangan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section p-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                            <a href="{{ route('main.perkembangan.create') }}" class="primary-default-btn">Tambah Perkembangan
                                Baru</a>
                        </h5>
                    </div>
                    <!-- Table with stripped rows -->
                    <table id="listTable" class="table datatable">
                        <thead>
                            <tr style="font-weight: bold">
                                <td>Populasi</td>
                                <td>Umur</td>
                                <td>Kematian Atas</td>
                                <td>Kematian Bawah</td>
                                <td>Tipe Pakan Atas</td>
                                <td>Pakan Atas</td>
                                <td>Tipe Pakan Bawah</td>
                                <td>Pakan Bawah</td>
                                <td>abw Normal Atas</td>
                                <td>Abw Normal Bawah</td>
                                <td class="no-print">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perkembangans as $perkembangan)
                                <tr>
                                    <td>{{ $perkembangan->populasi->jumlah }}</td>
                                    <td>{{ $perkembangan->umur }}</td>
                                    <td>{{ $perkembangan->kematian_atas }}</td>
                                    <td>{{ $perkembangan->kematian_bawah }}</td>
                                    <td>{{ $perkembangan->pakanAtas->jenis }}</td>
                                    <td>{{ $perkembangan->pakan_atas }}</td>
                                    <td>{{ $perkembangan->pakanBawah->jenis }}</td>
                                    <td>{{ $perkembangan->pakan_bawah }}</td>
                                    <td>{{ $perkembangan->abw_normal_atas }}</td>
                                    <td>{{ $perkembangan->abw_normal_bawah }}</td>
                                    <td class="no-print">
                                        <div class="d-flex">
                                            <a href="{{ route('main.perkembangan.edit', $perkembangan->hashid) }}"
                                                class="primary-white-btn">Sunting</a>
                                            <div style="width: 10px;"></div>
                                            <button type="button" onclick="destroy('{{ $perkembangan->hashid }}')"
                                                class="secondary-default-btn">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>

        </section>

        <script>
            function destroy(id) {
                Swal.fire({
                    title: 'Apakah Kamu Yakin?',
                    text: "Ingin menghapus data Perkembangan Ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#914149',
                    cancelButtonColor: '#3d8497',
                    confirmButtonText: 'Ya, Aku Yakin!',
                    cancelButtonText: 'Tidak, Batalkan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Perform the delete action here
                        window.location.href = `/main/perkembangan/delete/${id}`;
                    }
                })
            };
        </script>
</x-app-layout>
