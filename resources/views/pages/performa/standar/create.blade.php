<x-app-layout>
    <div class="pagetitle px-4">
        <h1> Tambah Standar Performa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('main.standar') }}">Standar Performa</a></li>
                <li class="breadcrumb-item">Tambah Standar Performa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container mt-5">
        <h2 class="mb-4">Tambah Standar</h2>
        <form action="{{ route('main.standar.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="fcr" class="form-label">fcr</label>
                <input type="number" step="0.001" min="0" class="form-control" id="fcr" name="fcr" required>
                @error('fcr')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">fi</label>
                <input type="number" step="0.001" min="0" class="form-control" id="fi" name="fi" required>
                @error('fi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fe" class="form-label">fe</label>
                <input type="number" step="0.01" min="0" class="form-control" id="fe" name="fe" required>
                @error('fe')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="dep" class="form-label">dep</label>
                <input type="number" step="0.01" min="0" class="form-control" id="dep" name="dep" required>
                @error('dep')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="abw" class="form-label">abw</label>
                <input type="number" step="0.01" min="0" type="text" class="form-control" id="abw" name="abw" required>
                @error('abw')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="adg" class="form-label">adg</label>
                <input type="number" class="form-control" id="adg" name="adg" required>
                @error('adg')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ip" class="form-label">ip</label>
                <input type="number" class="form-control" id="ip" name="ip" required>
                @error('ip')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('main.standar') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>
