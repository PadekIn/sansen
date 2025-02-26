<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .bg-custom {
            background-image: url('./assets/img/svg/ayam-blur.png');
            background-size: cover;
            background-position: center;

        }
    </style>
</head>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex items-center justify-center bg-gray-100 bg-custom">
        <div class="flex justify-center items-center w-full">
            <div class="w-1/2 sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="background-color: #f0f2fa;">
                <img src="./assets/img/svg/logo.PNG" alt="" width="200px" height="200px" class="mx-auto">
                <br>
                <p class="text-center font-bold">
                    SISTEM INFORMASI MANAJEMAN <br>
                    PRODUKSI AYAM BROILER <br>
                    SANSEN BROTHER FARM
                </p>
            </div>
            <div class="w-3/4 sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="background-color: #3c8b9b;">
            <h1 class="text-2xl font-bold text-center">Welcome Back!</h1>
            <h4 class="text-center">Please login to your account first</h4>
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>

<!-- <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900"> -->
<!-- <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div> -->

<!-- <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div> -->
<!-- </div>
    </body> -->
