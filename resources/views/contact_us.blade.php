@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <section class="py-24 relative px-32">
        <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto mt-10">
            <div class="w-full flex flex-col items-center gap-10">
                <div class="text-center">
                    <h6 class="text-gray-400 text-xl font-normal leading-relaxed">Hubungi Kami</h6>
                    <h2 class="text-4xl font-bold font-manrope leading-normal" style="color: #20750b;">Layanan Pelanggan Lumbung Pangan</h2>
                    
                    <p class="text-gray-500 text-base font-normal leading-relaxed mt-4">
                        Kami di sini untuk membantu Anda. Jangan ragu untuk menghubungi kami melalui informasi di bawah ini atau dengan
                        mengisi formulir kontak.
                    </p>
                </div>

                <div class="w-full grid lg:grid-cols-2 grid-cols-1 gap-12">
                    <div class="flex flex-col gap-8">
                        <div class="flex items-center gap-6">
                            <div class="p-4 bg-green-50 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l1.503 1.503A4.978 4.978 0 0111 15v0a4.978 4.978 0 016.497-3.497L19 10m-7-7h0a3 3 0 013 3v0a3 3 0 01-3 3v0a3 3 0 01-3-3v0a3 3 0 013-3v0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-gray-900 text-xl font-bold">Telepon</h4>
                                <p class="text-gray-500 text-base">+62 852-4227-1149</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-6">
                            <div class="p-4 bg-green-50 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A8.962 8.962 0 0116.94 21a9.003 9.003 0 01-7.88-4.21A9.002 9.002 0 0112 3.94a8.962 8.962 0 018.21 8.85z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-gray-900 text-xl font-bold">Email</h4>
                                <p class="text-gray-500 text-base">support@lumbungpangan.com</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-6">
                            <div class="p-4 bg-green-50 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 13.657a8 8 0 00-11.314 0m2.828 2.829a4 4 0 005.657 0m2.828-2.829a8 8 0 0111.314 0" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-gray-900 text-xl font-bold">Alamat</h4>
                                <p class="text-gray-500 text-base">Jl. Toddopuli Raya Timur No.83 Blok HC No. 15, Makassar</p>
                            </div>
                        </div>
                    </div>

                    <form action="/contact" method="POST" class="bg-white p-8 rounded-xl shadow-md flex flex-col gap-6">
                        @csrf
                        <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
                            <input type="text" name="name" placeholder="Nama Anda" required
                                class="p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                            <input type="email" name="email" placeholder="Email Anda" required
                                class="p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                        </div>
                        <textarea name="message" rows="5" placeholder="Pesan Anda" required
                            class="p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"></textarea>
                        <button type="submit"
                            class="w-full px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium text-lg rounded-lg shadow-md transition-all duration-300">
                            Kirim Pesan
                        </button>
                    </form>
                    @if(session('success'))
                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
