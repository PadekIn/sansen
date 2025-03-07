<x-app-layout>
    <div class="pagetitle px-4">
        <h1> Edit Perkembangan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('main.perkembangan') }}">Perkembangan</a></li>
                <li class="breadcrumb-item">Edit Perkembangan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section p-4">
        <form action="{{ route('main.perkembangan.update', $perkembangan->hashid) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="populasi_id" class="form-label">Populasi</label>
                <select class="form-control" id="populasi_id" name="populasi_id">
                    <option value="">Pilih Populasi</option>
                    @foreach($populasis as $populasi)
                        <option value="{{ $populasi->id }}" {{ $populasi->id == $perkembangan->populasi_id ? 'selected' : '' }}>{{ $populasi->jumlah }}</option>
                    @endforeach
                </select>
                @error('populasi_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur" value="{{ old('umur', $perkembangan->umur) }}">
                @error('umur')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kematian_atas" class="form-label">Kematian Atas</label>
                <input type="number" class="form-control" id="kematian_atas" name="kematian_atas" value="{{ old('kematian_atas', $perkembangan->kematian_atas) }}">
                @error('kematian_atas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kematian_bawah" class="form-label">kematian Bawah</label>
                <input type="number" class="form-control" id="kematian_bawah" name="kematian_bawah" value="{{ old('kematian_bawah', $perkembangan->kematian_bawah) }}">
                @error('kematian_bawah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="id_tipe_pakan_atas" class="form-label">Tipe Pakan Atas</label>
                <select class="form-control" id="id_tipe_pakan_atas" name="id_tipe_pakan_atas" required>
                    <option value="">Pilih Tipe Pakan Atas</option>
                    @foreach($pakans as $pakan)
                        <option value="{{ $pakan->id }}" {{ $pakan->id == $perkembangan->id_tipe_pakan_atas ? 'selected' : '' }}>{{ $pakan->jenis }}</option>
                    @endforeach
                </select>
                @error('id_tipe_pakan_atas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pakan_atas" class="form-label">Pakan Atas</label>
                <input type="number" class="form-control" id="pakan_atas" name="pakan_atas" value="{{ old('pakan_atas', $perkembangan->pakan_atas) }}">
                @error('pakan_atas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="id_tipe_pakan_bawah" class="form-label">Tipe Pakan Bawah</label>
                <select class="form-control" id="id_tipe_pakan_bawah" name="id_tipe_pakan_bawah" required>
                    <option value="">Pilih Tipe Pakan Atas</option>
                    @foreach($pakans as $pakan)
                        <option value="{{ $pakan->id }}" {{ $pakan->id == $perkembangan->id_tipe_pakan_bawah? 'selected' : '' }}>{{ $pakan->jenis }}</option>
                    @endforeach
                </select>
                @error('id_tipe_pakan_bawah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pakan_bawah" class="form-label">Pakan Bawah</label>
                <input type="number" class="form-control" id="pakan_bawah" name="pakan_bawah" value="{{ old('pakan_bawah', $perkembangan->pakan_bawah) }}">
                @error('pakan_bawah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="abw_normal_atas" class="form-label">Abw Normal Atas</label>
                <input type="number" step="0.001" min="0" class="form-control" id="abw_normal_atas" name="abw_normal_atas" value="{{ old('abw_normal_atas', $perkembangan->abw_normal_atas) }}">
                @error('abw_normal_atas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="abw_normal_bawah" class="form-label">Abw Normal Bawah</label>
                <input type="number" step="0.001" min="0" class="form-control" id="abw_normal_bawah" name="abw_normal_bawah" value="{{ old('abw_normal_bawah', $perkembangan->abw_normal_bawah) }}">
                @error('abw_normal_bawah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('main.perkembangan') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </section>
</x-app-layout>

