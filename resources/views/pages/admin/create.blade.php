<x-app-layout>
    <div class="pagetitle px-4">
        <h1>Tambah Admin</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('main.admin') }}">Admin</a></li>
                <li class="breadcrumb-item">Tambah Admin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="section p-4">
        <form method="POST" action="{{ route('main.admin.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 form-check" style="font-size: 0.875em;">
                <input type="checkbox" class="form-check-input" id="showPassword" onclick="togglePasswordVisibility()" style="transform: scale(0.8);">
                <label class="form-check-label" for="showPassword">Tampilkan Password</label>
            </div>
            <div class="d-flex justify-content">
                <button type="submit" class="primary-default-btn" style="margin-right: 10px;">Simpan</button>
                <a href="{{ route('main.admin') }}" class="terary-default-btn">Kembali</a>
            </div>
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            var password = document.getElementById("password");
            var passwordConfirmation = document.getElementById("password_confirmation");
            if (password.type === "password") {
                password.type = "text";
                passwordConfirmation.type = "text";
            } else {
                password.type = "password";
                passwordConfirmation.type = "password";
            }
        }
    </script>
</x-app-layout>
