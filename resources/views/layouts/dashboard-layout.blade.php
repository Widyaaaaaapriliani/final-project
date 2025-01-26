<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>@yield('title', 'Default Title')</title>
    @vite('resources/css/app.css')
</head>

<body>
    <!-- Sidebar -->
    <x-dashboard.sidebar />

    <!-- Header -->
    <x-dashboard.header>
        @yield('header')
    </x-dashboard.header>

    <!-- Main Content -->
    <div class="py-2 px-3 pt-0 sm:ml-64 bg-gray-100">
        <div class="p-3">
            @yield('content')
        </div>
    </div>
</body>

</html>
