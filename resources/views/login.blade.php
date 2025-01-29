<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="bg-green-700">

    <div class="relative flex items-center justify-center h-screen">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img class="w-full h-full object-cover" src="{{ asset('images/banner/banner_lumbung.png') }}" alt="Background">
        </div>

        <!-- Login Form -->
        <div class="relative z-10 bg-white px-8 py-12 rounded-3xl shadow-2xl max-w-md w-full">
            <!-- Logo -->
            <div class="mb-6 text-center">
                <img src="{{ asset('images/lumbung-pangan.png') }}" alt="Logo" class="mx-auto w-40">
            </div>
            
            <!-- Title -->
            <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Enter your Account</h2>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-5 text-red-500 text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div class="flex flex-col space-y-3">
                    <input
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-700 focus:outline-none mb-4"
                        type="text" name="email" placeholder="Username or Email" required />
                    <input
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-700 focus:outline-none mb-6"
                        type="password" name="password" placeholder="Password" required />
                </div>
                <button
                    type="submit"
                    class="w-full bg-green-700 text-white py-3 rounded-lg hover:bg-green-800 transition duration-300 font-semibold">
                    Sign in
                </button>
            </form>

            <!-- Signup Link -->
            <div class="mt-4 text-center text-sm text-gray-500">
                Belum memiliki akun? 
                <a href="{{ route('signup') }}" class="text-green-700 font-semibold hover:underline">Buat Akun</a>
            </div>
        </div>
    </div>

</body>

</html>
