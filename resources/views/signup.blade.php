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
        <!-- Signup Container -->
        <div class="h-screen w-full">
            <img class="w-full h-full" src="{{ asset('images/banner/banner_lumbung.png') }}" alt="">
        </div>
        <div class="absolute top-10 w-[60vh] flex-col border bg-white px-6 py-14 shadow-md rounded-[10px] ">
            <div class="mb-4 flex justify-center">
                <img src="{{ asset('images/logo_lumbung.png') }}" alt="" class="w-[180px]">
            </div>

            <div class="text-center text-xl font-bold text-slate-900 mb-5">
                Create your Account
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-4 text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('signup') }}" method="POST">
                @csrf
                <div class="flex flex-col text-sm rounded-md">
                    <input
                        class="mb-3 rounded-[4px] border p-3 hover:outline-none focus:outline-none hover:border-indigo-800"
                        type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
                    <input
                        class="mb-3 rounded-[4px] border p-3 hover:outline-none focus:outline-none hover:border-indigo-800"
                        type="text" name="name" placeholder="name" value="{{ old('name') }}" required />
                    <input
                        class="mb-3 border rounded-[4px] p-3 hover:outline-none focus:outline-none hover:border-indigo-800"
                        type="password" name="password" placeholder="Password" required />
                    <input
                        class="border rounded-[4px] p-3 hover:outline-none focus:outline-none hover:border-indigo-800"
                        type="password" name="password_confirmation" placeholder="Confirm Password" required />
                </div>

                <button
                type="submit"
                    class="mt-5 w-full border p-2 bg-green-700 text-white rounded-[4px] hover:bg-green-800 duration-300 font-bold">Sign
                    up</button>
            </form>

            <div class="flex justify-center mt-2 text-sm py-2 border rounded-sm gap-2">
                <img src="{{ asset('images/google.png') }}" alt="google" class="w-5 h-5">
                <div class="font-semibold text-blue-600">Sign up with Google</div>
            </div>

            <div class="mt-2 flex justify-center text-sm text-gray-900 gap-1">
                <a href="{{ route('login.form') }}">Do you have an account?</a>
                <a href="{{ route('login.form') }}" class="font-semibold text-blue-600">Sign in</a>
            </div>
        </div>
    </div>
</body>

</html>
