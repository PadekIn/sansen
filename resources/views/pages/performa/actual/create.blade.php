<x-app-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Performa Actual</h2>
        <form method="POST" action="{{ route('main.actual.store') }}">
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
            </div>
            <div class="mb-3">
                <label for="fcr" class="form-label">FCR</label>
                <input type="number" step="0.001" class="form-control" id="fcr" name="fcr" required>
                @error('fcr')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fi" class="form-label">FI</label>
                <input type="number" step="0.001" class="form-control" id="fi" name="fi" required>
                @error('fi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fe" class="form-label">FE</label>
                <input type="number" step="0.01" class="form-control" id="fe" name="fe" required>
                @error('fe')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="dep" class="form-label">DEP</label>
                <input type="number" step="0.01" class="form-control" id="dep" name="dep" required>
                @error('dep')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="abw" class="form-label">ABW</label>
                <input type="number" step="0.01" class="form-control" id="abw" name="abw" required>
                @error('abw')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="adg" class="form-label">ADG</label>
                <input type="number" class="form-control" id="adg" name="adg" required>
                @error('adg')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ip" class="form-label">IP</label>
                <input type="number" class="form-control" id="ip" name="ip" required>
                @error('ip')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('main.actual') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>
