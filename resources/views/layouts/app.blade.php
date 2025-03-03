<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sansen Brother Farm | Beranda</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/svg/logo.PNG') }}" type="image/x-icon">
    <!-- Custom styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">
        <!-- ! Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-start">
                <div class="sidebar-head">
                    <a href="/" class="logo-wrapper" title="Home">
                        <span class="sr-only">Home</span>
                        <img src="{{ asset('assets/img/svg/logo.PNG') }}" alt="" width="59px" height="59px" />
                        <!-- <span class="icon logo" aria-hidden="true"></span> -->
                        <div class="logo-text">
                            <span class="logo-title">SANSEN</span><br>
                            <span class="logo-subtitle">BROTHER FARM</span>
                        </div>

                    </a>
                    <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                        <span class="sr-only">Toggle menu</span>
                        <span class="icon menu-toggle" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="sidebar-body">
                    <ul class="sidebar-body-menu">
                        <li>
                            <a class="{{ Request::is('/dashboard') ? 'active' : '' }}" href="/">
                                <span class="icon home" aria-hidden="true"></span>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="##">
                                <span class="icon performa" aria-hidden="true"></span>Performa
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a class="{{ Request::is('main/standar') ? 'active' : '' }}" href="{{ route('main.standar') }}">Standar</a>
                                </li>
                                <li>
                                    <a href="{{ route('main.actual') }}">Actual</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('main.populasi') }}">
                                <span class="icon pop" aria-hidden="true"></span>Populasi
                                </a>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="/">
                                <span class="icon activity" aria-hidden="true">
                                </span>Perkembangan
                                </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('main/pakan') ? 'active' : '' }}" href="{{ route('main.pakan') }}">
                                <span class="icon wheat" aria-hidden="true"></span>Pakan
                            </a>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="/">
                                <span class="icon report" aria-hidden="true"></span>Laporan
                            </a>
                        </li>
                </div>
            </div>
        </aside>
        <div class="main-wrapper">
            <!-- ! Main nav -->
            <nav class="main-nav--bg">
                <div class="container main-nav">
                    <div class="main-nav-start">
                    </div>
                    <div class="main-nav-end">
                        <!-- <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                            <span class="sr-only">Toggle menu</span>
                            <span class="icon menu-toggle--gray" aria-hidden="true"></span>
                        </button> -->
                        <div class="nav-user-wrapper">
                            <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                                <span class="sr-only">Profile</span>
                                <span class="nav-user-img">
                                    <picture>
                                        <source srcset="{{ asset('assets/img/avatar/profile-ayam.png') }}" type="image/webp"><img src="{{ asset('assets/img/avatar/profile-ayam.png') }}" alt="User name">
                                    </picture>
                                </span>
                            </button>
                            <ul class="users-item-dropdown nav-user-dropdown dropdown">
                                <li><a href="##">
                                        <i data-feather="user" aria-hidden="true"></i>
                                        <span>Profile</span>
                                    </a></li>
                                <li><a href="##">
                                        <i data-feather="settings" aria-hidden="true"></i>
                                        <span>Account settings</span>
                                    </a></li>
                                <form method="POST" action="{{ route(name: 'logout') }}">
                                    @csrf
                                    <li><a class="danger" href="route('logout')"
                                            onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                            <i data-feather="log-out" aria-hidden="true"></i>
                                            <span>Log out</span>
                                        </a>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- ! Main -->
            <main class="main users chart-page" id="skip-target">
                {{ $slot }}
            </main>
            <!-- ! Footer -->
            <footer class="footer">
                <div class="container footer--flex">
                    <div class="footer-start">
                        <p>2025 © Sansen Brother Farm <a href="" target="_blank"
                                rel="noopener noreferrer"></a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Chart library -->
    <script src="{{ asset('assets/plugins/chart.min.js') }}"></script>
    <!-- Icons library -->
    <script src="{{ asset('assets/plugins/feather.min.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        @if(session('warning'))
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: '{{ session('warning') }}',
            });
        @endif
        @if(session('info'))
            Swal.fire({
                icon: 'info',
                title: 'Info',
                text: '{{ session('info') }}',
            });
        @endif

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ $error }}',
                });
            @endforeach
        @endif
    </script>
</body>

</html>
