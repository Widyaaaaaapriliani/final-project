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

<body class="bg-slate-100">

    <div class="flex items-center justify-center h-screen w-full bg-slate-100">
        <div class="h-screen w-full">
            <img class="w-full h-full" src="{{ asset('images/banner/banner_lumbung.png') }}" alt="">
        </div>
        <!-- Login Container -->
        <div class="absolute top-20 min-w-fit flex-col border bg-white px-6 py-14 shadow-md rounded-[10px] ">
            <div class="mb-4 flex justify-center">
                <img src="{{ asset('images/logo_lumbung.png') }}" alt="" class="w-[180px]">
            </div>
            <div class="text-center text-xl font-bold text-slate-900 mb-5">
                Enter your Account
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

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="flex flex-col text-sm rounded-md">
                    <input
                        class="mb-5 rounded-[4px] border p-3 hover:outline-none focus:outline-none hover:border-indigo-800"
                        type="text" name="email" placeholder="Username or Email" required />
                    <input
                        class="border rounded-[4px] p-3 hover:outline-none focus:outline-none hover:border-indigo-800"
                        type="password" name="password" placeholder="Password" required />
                </div>
                <button
                type="submit"
                    class="mt-5 w-full border p-2 bg-green-700 text-white rounded-[4px] hover:bg-green-800 duration-300 font-bold">Sign
                    in</button>
            </form>
            <div class="mt-1 flex justify-between text-sm text-gray-900">
                <a href="#">Forgot password?</a>
                <a href="{{ route('signup') }}">Sign up</a>
            </div>

            <div class="flex justify-center mt-2 text-sm py-2 border rounded-sm gap-2">
                <img src="{{ asset('images/google.png') }}" alt="google" class="w-5 h-5">
                <div class="font-semibold text-blue-600">Sign in with Google</div>
            </div>

            <div class="mt-5 flex text-center text-sm text-gray-400">
                <p>
                    This site is protected by reCAPTCHA and the Google <br />
                    <a class="underline" href="">Privacy Policy</a> and <a class="underline" href="">Terms
                        of Service</a> apply.
                </p>
            </div>
        </div>
    </div>
</body>

</html>
