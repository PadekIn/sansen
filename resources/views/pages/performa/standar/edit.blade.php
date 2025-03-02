<x-app-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Standar</h2>
        <form action="{{ route('main.standar.update', $standar->hashid) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="fcr" class="form-label">fcr</label>
                <input type="number" step="0.001" min="0" class="form-control" id="fcr" name="fcr" value="{{ $standar->fcr }}" required>
                @error('fcr')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">fi</label>
                <input type="number" step="0.001" min="0" class="form-control" id="fi" name="fi" value="{{ $standar->fi }}"  required>
                @error('fi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fe" class="form-label">fe</label>
                <input type="number" step="0.01" min="0" class="form-control" id="fe" name="fe" value="{{ $standar->fe }}" required>
                @error('fe')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="dep" class="form-label">dep</label>
                <input type="number" step="0.01" min="0" class="form-control" id="dep" name="dep" value="{{ $standar->dep }}" required>
                @error('dep')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="abw" class="form-label">abw</label>
                <input type="number" step="0.01" min="0" type="text" class="form-control" id="abw" name="abw" value="{{ $standar->abw }}" required>
                @error('abw')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="adg" class="form-label">adg</label>
                <input type="number" class="form-control" id="adg" name="adg" required value="{{ $standar->adg }}" >
                @error('adg')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ip" class="form-label">ip</label>
                <input type="number" class="form-control" id="ip" name="ip" value="{{ $standar->ip }}" required>
                @error('ip')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('main.standar') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>
