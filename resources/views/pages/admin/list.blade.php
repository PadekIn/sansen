<x-app-layout>
    <div class="pagetitle px-4">
        <h1>Data Admin</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Admin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section p-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        <a href="{{ route('main.admin.create') }}" class="primary-default-btn">Tambah Admin</a>
                    </h5>
                </div>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('main.admin.edit', $user->id) }}"
                                            class="primary-white-btn">Sunting</a>
                                        <form action="{{ route('main.admin.delete', $user->id) }}" method="POST"
                                            @if ($users->count() == 1) onsubmit="return tidakBisaHapus(event)"  @else onsubmit="return confirmDelete(event)" @endif


                                            {{-- onsubmit="@if ($users->count() == 1) return confirmDelete(event) @else tidakBisaHapus() @endif" --}}
                                             >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="secondary-default-btn"
{{-- @if ($users->count() == 1) onsubmit="return tidakBisaHapus(event)" @endif --}}
                                            >Hapus</button>
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
        function confirmDelete(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: "Ingin menghapus data admin Ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#914149',
                cancelButtonColor: '#3d8497',
                confirmButtonText: 'Ya, Yakin!',
                cancelButtonText: 'Tidak, Batalkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        }

        function tidakBisaHapus(event) {
            event.preventDefault();
            return Swal.fire({
                title: 'Tidak Bisa Menghapus',
                text: "Minimal satu admin harus ada!",
                icon: 'warning',
                confirmButtonColor: '#3d8497',
                confirmButtonText: 'OK'
            });
        }
    </script>
</x-app-layout>
