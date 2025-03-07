<x-app-layout>
    <div class="pagetitle px-4">
        <h1>Edit Pakan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('main.pakan') }}">Pakan</a></li>
                <li class="breadcrumb-item">Edit Pakan</li>
            </ol>
        </nav>
    </div>
    <div class="section p-4">
        <form method="POST" action="{{ route('main.pakan.update', $pakan->hashid) }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Pakan</label>
                <select class="form-control" id="jenis" name="jenis" required>
                    <option value="" disabled {{ is_null($pakan->jenis ) ? 'selected' : '' }}>Pilih Jenis Pakan</option>
                    <option value="SB 10" {{ old('jenis', $pakan->jenis) == 'SB 10' ? 'selected' : '' }}>SB 10</option>
                    <option value="SB 11" {{ old('jenis', $pakan->jenis) == 'SB 11' ? 'selected' : '' }}>SB 11</option>
                    <option value="SB 12" {{ old('jenis', $pakan->jenis) == 'SB 12' ? 'selected' : '' }}>SB 12</option>
                </select>
                @error('jenis')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah', $pakan->jumlah) }}" required>
                @error('jumlah')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_beli" class="form-label">Tanggal Beli</label>
                <input type="date" class="form-control" id="tgl_beli" name="tgl_beli" value="{{ old('tgl_beli', $pakan->tgl_beli) }}" required>
                @error('tgl_beli')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $pakan->keterangan) }}</textarea>
                @error('keterangan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('main.pakan') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>
