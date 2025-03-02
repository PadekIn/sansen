<x-app-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Performa Actual</h2>
        <a href="{{ route('main.actual.create') }}" class="btn btn-primary mb-3">Tambah Performa Actual</a>
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
                            <a href="{{ route('main.actual.edit', $actual->hashid) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('main.actual.delete', $actual->hashid) }}" method="POST" style="display:inline;">
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
