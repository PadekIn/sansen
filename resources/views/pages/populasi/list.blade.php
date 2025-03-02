<x-app-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Populasi</h2>
        <a href="{{ route('main.populasi.create') }}" class="btn btn-primary mb-3">Tambah Populasi</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
                        <td>
                            <a href="{{ route('main.populasi.edit', $populasi->hashid) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('main.populasi.delete', $populasi->hashid) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
