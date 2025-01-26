@props(['path', 'title'])

@php
    // Menentukan apakah path ini adalah path yang aktif
    $isActive = request()->routeIs(ltrim($path, '/'));
@endphp

<li>
    <a href="{{ $path }}"
        class="flex items-center p-2 rounded-lg 
        {{ $isActive ? 'bg-gray-100 text-slate-900' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }}
        group text-slate-50 hover hover:text-slate-900">
        {{ $slot }}
        <span class="ms-3 text-lg">{{ $title }}</span>
    </a>
</li>
