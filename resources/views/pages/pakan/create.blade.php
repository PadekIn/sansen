<x-app-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Pakan</h2>
        <form method="POST" action="{{ route('main.pakan.store') }}">
            @csrf
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Pakan</label>
                <input type="text" class="form-control" id="jenis" name="jenis" required>
                @error('jenis')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                @error('jumlah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_beli" class="form-label">Tanggal Beli</label>
                <input type="date" class="form-control" id="tgl_beli" name="tgl_beli" required>
                @error('tgl_beli')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                @error('keterangan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('main.pakan') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>
