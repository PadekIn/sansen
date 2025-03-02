<x-app-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Populasi</h2>
        <form method="POST" action="{{ route('main.populasi.store') }}">
            @csrf
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                @error('jumlah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="berat" class="form-label">Berat</label>
                <input type="number" step="0.01" class="form-control" id="berat" name="berat" required>
                @error('berat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="umur_akhir" class="form-label">Umur Akhir</label>
                <input type="number" class="form-control" id="umur_akhir" name="umur_akhir" required>
                @error('umur_akhir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="grade_doc" class="form-label">Grade DOC</label>
                <input type="text" class="form-control" id="grade_doc" name="grade_doc" required>
                @error('grade_doc')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="bw_doc" class="form-label">BW DOC</label>
                <input type="number" step="0.01" class="form-control" id="bw_doc" name="bw_doc" required>
                @error('bw_doc')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="asal_doc" class="form-label">Asal DOC</label>
                <input type="text" class="form-control" id="asal_doc" name="asal_doc" required>
                @error('asal_doc')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="check_in" class="form-label">Check In</label>
                <input type="date" class="form-control" id="check_in" name="check_in" required>
                @error('check_in')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="check_out" class="form-label">Check Out</label>
                <input type="date" class="form-control" id="check_out" name="check_out" required>
                @error('check_out')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('main.populasi') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>
