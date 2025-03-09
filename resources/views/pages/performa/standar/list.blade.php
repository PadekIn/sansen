<x-app-layout>
<div class="pagetitle px-4">
    <h1> Data Standar Performa</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Standar Performa</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section p-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">
                    <a href="{{ route('main.standar.create') }}" class="primary-default-btn">Tambah Standar Performa
                        Baru</a>
                </h5>
            </div>
            <!-- Table with stripped rows -->
            <table id="listTable" class="table datatable">
                <thead>
                    <tr style="font-weight: bold">
                        <td>populasi</td>
                        <td>fcr</td>
                        <td>fi</td>
                        <td>fe</td>
                        <td>dep</td>
                        <td>abw</td>
                        <td>adg</td>
                        <td>ip</td>
                        <td class="no-print">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($standars as $standar)
                        <tr>
                            <td>{{ $standar->populasi->jumlah }}</td>
                            <td>{{ $standar->fcr }}</td>
                            <td>{{ $standar->fi }}</td>
                            <td>{{ $standar->fe }}</td>
                            <td>{{ $standar->dep }}</td>
                            <td>{{ $standar->abw }}</td>
                            <td>{{ $standar->adg }}</td>
                            <td>{{ $standar->ip }}</td>
                            <td class="no-print">
                                <div class="d-flex">
                                    <a href="{{ route('main.standar.edit', $standar->hashid) }}"
                                        class="primary-white-btn">Sunting</a>
                                    <div style="width: 10px;"></div>
                                    <button type="button" onclick="destroy('{{ $standar->hashid }}')"
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
            text: "Ingin menghapus data Standar peforma Ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#914149',
            cancelButtonColor: '#3d8497',
            confirmButtonText: 'Ya, Aku Yakin!',
            cancelButtonText: 'Tidak, Batalkan!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform the delete action here
                window.location.href = `/main/standar/delete/${id}`;
            }
        })
    };
</script>
</x-app-layout>

