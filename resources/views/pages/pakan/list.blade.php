<x-app-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Pakan</h2>
        <a href="{{ route('main.pakan.create') }}" class="btn btn-primary mb-3">Tambah Pakan</a>
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
                        <td>
                            <a href="{{ route('main.pakan.edit', $pakan->hashid) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
