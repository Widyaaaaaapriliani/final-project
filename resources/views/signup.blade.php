<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="bg-slate-100">
    <div class="flex items-center justify-center h-screen w-full bg-slate-100 relative p-0 m-0">
        <!-- Signup Background -->
        <div class="h-screen w-full">
            <img class="w-full h-full object-cover" src="{{ asset('images/banner/banner_lumbung.png') }}" alt="Signup Background">
        </div>
        
        <!-- Signup Container -->
        <div class="absolute top-10 w-[60vh] flex flex-col border bg-white px-6 py-14 shadow-lg rounded-xl">
            <!-- Logo -->
            <div class="mb-6 flex justify-center">
                <img src="{{ asset('images/lumbung-pangan.png') }}" alt="Logo" class="w-44">
            </div>

            <!-- Title -->
            <div class="text-center text-2xl font-bold text-gray-900 mb-6">
                Create Your Account
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-4 text-red-500 text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('signup') }}" method="POST" class="space-y-10">
                @csrf
                <div class="flex flex-col space-y-6">
                    <input
                        class="w-full rounded-lg border border-gray-300 p-4 leading-relaxed placeholder-gray-500 tracking-wide focus:ring-2 focus:ring-green-700 focus:outline-none"
                        type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
                    <input
                        class="w-full rounded-lg border border-gray-300 p-4 leading-relaxed placeholder-gray-500 tracking-wide focus:ring-2 focus:ring-green-700 focus:outline-none"
                        type="text" name="name" placeholder="Name" value="{{ old('name') }}" required />
                    <input
                        class="w-full rounded-lg border border-gray-300 p-4 leading-relaxed placeholder-gray-500 tracking-wide focus:ring-2 focus:ring-green-700 focus:outline-none"
                        type="password" name="password" placeholder="Password" required />
                    <input
                        class="w-full rounded-lg border border-gray-300 p-4 leading-relaxed placeholder-gray-500 tracking-wide focus:ring-2 focus:ring-green-700 focus:outline-none"
                        type="password" name="password_confirmation" placeholder="Confirm Password" required />
                </div>

                <!-- Signup Button -->
                <button
                    type="submit"
                    class="w-full bg-green-700 text-white py-3 rounded-lg hover:bg-green-800 transition duration-300 font-semibold">
                    Sign up
                </button>
            </form>

            <!-- Google Signup -->
            <div class="flex items-center justify-center mt-5 gap-2 py-3 border rounded-lg cursor-pointer hover:bg-gray-100 transition duration-300">
                <img src="{{ asset('images/google.png') }}" alt="Google" class="w-5 h-5">
                <span class="font-medium text-blue-600">Sign up with Google</span>
            </div>

            <!-- Login Link -->
            <div class="mt-4 text-center text-sm text-gray-600">
                Sudah memiliki akun? 
                <a href="{{ route('login.form') }}" class="font-semibold text-blue-600 hover:underline">Masuk Sekarang</a>
            </div>
        </div>
    </div>
</body>

</html>
