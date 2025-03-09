<x-app-layout>
    <div class="pagetitle px-4">
        <h1>Edit Populasi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('main.populasi') }}">Populasi</a></li>
                <li class="breadcrumb-item">Edit Populasi</li>
            </ol>
        </nav>
    </div> <!-- End Page Title -->
    <div class="section p-4">
        <form method="POST" action="{{ route('main.populasi.update', $populasi->hashid) }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah', $populasi->jumlah) }}" required>
                @error('jumlah')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="berat" class="form-label">Berat</label>
                <input type="number" step="0.01" class="form-control" id="berat" name="berat" value="{{ old('berat', $populasi->berat) }}" required>
                @error('berat')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="umur_akhir" class="form-label">Umur Akhir</label>
                <input type="number" step="0.001" min="0" class="form-control" id="umur_akhir" name="umur_akhir" value="{{ old('umur_akhir', $populasi->umur_akhir) }}" required>
                @error('umur_akhir')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="grade_doc" class="form-label">Grade DOC</label>
                <select class="form-control" id="grade_doc" name="grade_doc" required>
                    <option value="" disabled {{ is_null($populasi->grade_doc ) ? 'selected' : '' }}>Pilih Grade DOC</option>
                    <option value="Silver" {{ old('grade_doc', $populasi->grade_doc) == 'Silver' ? 'selected' : '' }}>Silver</option>
                    <option value="Gold" {{ old('grade_doc', $populasi->grade_doc) == 'Gold' ? 'selected' : '' }}>Gold</option>
                    <option value="Platinum" {{ old('grade_doc', $populasi->grade_doc) == 'Platinum' ? 'selected' : '' }}>Platinum</option>
                </select>
                @error('grade_doc')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="bw_doc" class="form-label">BW DOC</label>
                <input type="number" step="0.01" class="form-control" id="bw_doc" name="bw_doc" value="{{ old('bw_doc', $populasi->bw_doc) }}" required>
                @error('bw_doc')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="asal_doc" class="form-label">Asal DOC</label>
                <input type="text" class="form-control" id="asal_doc" name="asal_doc" value="{{ old('asal_doc', $populasi->asal_doc) }}" required>
                @error('asal_doc')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="check_in" class="form-label">Check In</label>
                <input type="date" class="form-control" id="check_in" name="check_in" value="{{ old('check_in', $populasi->check_in) }}" required>
                @error('check_in')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="check_out" class="form-label">Check Out</label>
                <input type="date" class="form-control" id="check_out" name="check_out" value="{{ old('check_out', $populasi->check_out) }}" required>
                @error('check_out')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content">
                <button type="submit" class="primary-default-btn" style="margin-right: 10px;">Perbarui</button>
                <a href="{{ route('main.populasi') }}" class="terary-default-btn">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>
