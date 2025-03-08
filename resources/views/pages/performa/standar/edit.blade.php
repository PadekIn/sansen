<x-app-layout>
    <div class="pagetitle px-4">
        <h1> Edit Standar Performa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('main.standar') }}">Standar Performa</a></li>
                <li class="breadcrumb-item">Edit Standar Performa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section p-4">
        {{-- <h3 class="mb-4">Edit Standar</h3> --}}
        <form action="{{ route('main.standar.update', $standar->hashid) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="populasi_id" class="form-label">Populasi</label>
                <select class="form-control" id="populasi_id" name="populasi_id" required>
                    @foreach($populasis as $populasi)
                        <option value="{{ $populasi->id }}" {{ $populasi->id == $standar->populasi_id ? 'selected' : '' }}>
                            {{ $populasi->jumlah }}
                        </option>
                    @endforeach
                </select>
                @error('populasi_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fcr" class="form-label">fcr</label>
                <input type="number" step="0.001" min="0" class="form-control" id="fcr" name="fcr" value="{{ $standar->fcr }}">
                @error('fcr')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">fi</label>
                <input type="number" step="0.001" min="0" class="form-control" id="fi" name="fi" value="{{ $standar->fi }}">
                @error('fi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fe" class="form-label">fe</label>
                <input type="number" step="0.01" min="0" class="form-control" id="fe" name="fe" value="{{ $standar->fe }}">
                @error('fe')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="dep" class="form-label">dep</label>
                <input type="number" step="0.01" min="0" class="form-control" id="dep" name="dep" value="{{ $standar->dep }}">
                @error('dep')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="abw" class="form-label">abw</label>
                <input type="number" step="0.01" min="0" type="text" class="form-control" id="abw" name="abw" value="{{ $standar->abw }}">
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
                <input type="number" class="form-control" id="ip" name="ip" value="{{ $standar->ip }}">
                @error('ip')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content">
                <button type="submit" class="primary-default-btn" style="margin-right: 10px;">Perbarui</button>
                <a href="{{ route('main.standar') }}" class="terary-default-btn">Kembali</a>
            </div>
        </form>
    </section>
</x-app-layout>
