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

    <section class="section p-4">
        <h3 class="mb-4">Tambah Standar</h3>
        <form action="{{ route('main.standar.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="populasi_id" class="form-label">Populasi</label>
                <select class="form-control" id="populasi_id" name="populasi_id" required>
                    <option value="">Pilih Populasi</option>
                    @foreach($populasis as $populasi)
                        <option value="{{ $populasi->id }}">{{ $populasi->jumlah }}</option>
                    @endforeach
                </select>
                @error('populasi_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            <div class="mb-3">
                <label for="fcr" class="form-label">fcr</label>
                <input type="number" step="0.001" min="0" class="form-control" id="fcr" name="fcr">
                @error('fcr')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">fi</label>
                <input type="number" step="0.001" min="0" class="form-control" id="fi" name="fi">
                @error('fi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fe" class="form-label">fe</label>
                <input type="number" step="0.01" min="0" class="form-control" id="fe" name="fe">
                @error('fe')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="dep" class="form-label">dep</label>
                <input type="number" step="0.01" min="0" class="form-control" id="dep" name="dep">
                @error('dep')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="abw" class="form-label">abw</label>
                <input type="number" step="0.01" min="0" type="text" class="form-control" id="abw" name="abw">
                @error('abw')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="adg" class="form-label">adg</label>
                <input type="number" class="form-control" id="adg" name="adg">
                @error('adg')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ip" class="form-label">ip</label>
                <input type="number" class="form-control" id="ip" name="ip">
                @error('ip')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('main.standar') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </section>
</x-app-layout>
