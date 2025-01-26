@extends('layouts.dashboard-layout')

@section('content')
    <div class="container mx-auto mt-8 p-4">
        <h1 class="text-2xl font-bold mb-6 text-center">Input Data</h1>
        <form action="{{ route('input.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf <!-- Tambahkan untuk Laravel CSRF Protection -->

            <!-- Kehadiran -->
            <div>
                <label for="kehadiran" class="block text-gray-700 font-medium mb-2">Kehadiran</label>
                <input type="number" id="kehadiran" name="kehadiran" min="0" max="100" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-200">
            </div>

            <!-- Tugas -->
            <div class="grid grid-cols-2 gap-4">
                @for ($i = 1; $i <= 6; $i++)
                    <div>
                        <label for="tugas{{ $i }}" class="block text-gray-700 font-medium mb-2">Tugas
                            {{ $i }}</label>
                        <input type="number" id="tugas{{ $i }}" name="tugas{{ $i }}" min="0"
                            max="100" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-200">
                    </div>
                @endfor
            </div>

            <!-- Respon -->
            <div class="grid grid-cols-2 gap-4">
                @for ($i = 1; $i <= 6; $i++)
                    <div>
                        <label for="respon{{ $i }}" class="block text-gray-700 font-medium mb-2">Respon
                            {{ $i }}</label>
                        <select id="respon{{ $i }}" name="respon{{ $i }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-200">
                            <option value="0">0</option>
                            <option value="10">100</option>
                        </select>
                    </div>
                @endfor
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 focus:ring focus:ring-indigo-200">
                    Hitung
                </button>
            </div>
        </form>
    </div>
@endsection
