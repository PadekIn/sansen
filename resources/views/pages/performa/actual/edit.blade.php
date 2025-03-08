<x-app-layout>
    <div class="pagetitle px-4">
        <h1>Edit Performa Actual</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('main.actual') }}">Performa Actual</a></li>
                <li class="breadcrumb-item">Edit Performa Actual</li>
            </ol>
        </nav>
    </div>
    <div class="section p-4">
        <form method="POST" action="{{ route('main.actual.update', $actual->hashid) }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="populasi_id" class="form-label">Populasi</label>
                <select class="form-control" id="populasi_id" name="populasi_id" required>
                    @foreach($populasis as $populasi)
                    <option value="{{ $populasi->id }}" {{ $populasi->id == $actual->populasi_id ? 'selected' : '' }}>
                        {{ $populasi->jumlah }}
                    </option>
                    @endforeach
                </select>
                @error('populasi_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fcr" class="form-label">FCR</label>
                <input type="number" step="0.001" class="form-control" id="fcr" name="fcr" value="{{ old('fcr', $actual->fcr) }}" required>
                @error('fcr')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fi" class="form-label">FI</label>
                <input type="number" step="0.001" class="form-control" id="fi" name="fi" value="{{ old('fi', $actual->fi) }}" required>
                @error('fi')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fe" class="form-label">FE</label>
                <input type="number" step="0.01" class="form-control" id="fe" name="fe" value="{{ old('fe', $actual->fe) }}" required>
                @error('fe')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="dep" class="form-label">DEP</label>
                <input type="number" step="0.01" class="form-control" id="dep" name="dep" value="{{ old('dep', $actual->dep) }}" required>
                @error('dep')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="abw" class="form-label">ABW</label>
                <input type="number" step="0.01" class="form-control" id="abw" name="abw" value="{{ old('abw', $actual->abw) }}" required>
                @error('abw')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="adg" class="form-label">ADG</label>
                <input type="number" class="form-control" id="adg" name="adg" value="{{ old('adg', $actual->adg) }}" required>
                @error('adg')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ip" class="form-label">IP</label>
                <input type="number" class="form-control" id="ip" name="ip" value="{{ old('ip', $actual->ip) }}" required>
                @error('ip')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content">
                <button type="submit" class="primary-default-btn" style="margin-right: 10px;">Perbarui</button>
                <a href="{{ route('main.actual') }}" class="terary-default-btn">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>
