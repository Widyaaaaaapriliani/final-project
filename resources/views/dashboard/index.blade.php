<!-- resources/views/dashboard.blade.php -->
@extends('layouts.dashboard-layout') <!-- Menggunakan layout utama yang sudah dibuat -->

@section('title', $title) <!-- Mengisi judul halaman -->

@section('content')
    <!-- Dashboard Stat Cards -->
    <div class="bg-white shadow rounded-lg p-4 pt-20">
        <div class="grid grid-cols-4 gap-4 mb-4">
            <div class="flex flex-col items-center justify-center h-24 rounded bg-gray-100 dark:bg-gray-800 gap-2">
                <div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.5 -0.5 16 16" fill="none" stroke="#000000"
                        stroke-linecap="round" stroke-linejoin="round" id="List-Details--Streamline-Tabler" height="40"
                        width="40">
                        <desc>List Details Streamline Icon: https://streamlinehq.com</desc>
                        <path d="M8.125 3.125h5" stroke-width="1"></path>
                        <path d="M8.125 5.625h3.125" stroke-width="1"></path>
                        <path d="M8.125 9.375h5" stroke-width="1"></path>
                        <path d="M8.125 11.875h3.125" stroke-width="1"></path>
                        <path
                            d="M1.875 3.125a0.625 0.625 0 0 1 0.625 -0.625h2.5a0.625 0.625 0 0 1 0.625 0.625v2.5a0.625 0.625 0 0 1 -0.625 0.625H2.5a0.625 0.625 0 0 1 -0.625 -0.625z"
                            stroke-width="1"></path>
                        <path
                            d="M1.875 9.375a0.625 0.625 0 0 1 0.625 -0.625h2.5a0.625 0.625 0 0 1 0.625 0.625v2.5a0.625 0.625 0 0 1 -0.625 0.625H2.5a0.625 0.625 0 0 1 -0.625 -0.625z"
                            stroke-width="1"></path>
                    </svg>

                </div>
                <div class="text-xl text-gray-900 flex gap-2 ">
                    <h5>80</h5>
                    <p class="text-xl text-gray-900 ">
                        Produk
                    </p>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center h-24 rounded bg-gray-100 dark:bg-gray-800 gap-2">
                <div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.5 -0.5 16 16" fill="none" stroke="#000000"
                        stroke-linecap="round" stroke-linejoin="round" id="Table-Column--Streamline-Tabler" height="40"
                        width="40">
                        <desc>Table Column Streamline Icon: https://streamlinehq.com</desc>
                        <path
                            d="M1.875 3.125a1.25 1.25 0 0 1 1.25 -1.25h8.75a1.25 1.25 0 0 1 1.25 1.25v8.75a1.25 1.25 0 0 1 -1.25 1.25H3.125a1.25 1.25 0 0 1 -1.25 -1.25V3.125z"
                            stroke-width="1"></path>
                        <path d="M6.25 6.25h6.875" stroke-width="1"></path>
                        <path d="M6.25 1.875v11.25" stroke-width="1"></path>
                        <path d="M5.625 1.875 1.875 5.625" stroke-width="1"></path>
                        <path d="m6.25 4.375 -4.375 4.375" stroke-width="1"></path>
                        <path d="m6.25 7.5 -4.375 4.375" stroke-width="1"></path>
                        <path d="m6.25 10.625 -2.5 2.5" stroke-width="1"></path>
                    </svg>

                </div>
                <div class="text-xl text-gray-900 flex gap-2 ">
                    <h5>8</h5>
                    <p class="text-xl text-gray-900 ">
                        Kategori
                    </p>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center h-24 rounded bg-gray-100 dark:bg-gray-800 gap-2">
                <div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.5 -0.5 16 16" fill="none" stroke="#000000"
                        stroke-linecap="round" stroke-linejoin="round" id="Devices-Dollar--Streamline-Tabler" height="40"
                        width="40">
                        <desc>Devices Dollar Streamline Icon: https://streamlinehq.com</desc>
                        <path
                            d="M8.125 11.875V5.625a0.625 0.625 0 0 1 0.625 -0.625h3.75a0.625 0.625 0 0 1 0.625 0.625v0.9375"
                            stroke-width="1"></path>
                        <path
                            d="M11.25 5V3.125a0.625 0.625 0 0 0 -0.625 -0.625H2.5a0.625 0.625 0 0 0 -0.625 0.625v7.5a0.625 0.625 0 0 0 0.625 0.625h5.625"
                            stroke-width="1"></path>
                        <path d="M10 5.625h1.25" stroke-width="1"></path>
                        <path d="M13.125 9.375h-1.5625a0.9375 0.9375 0 0 0 0 1.875h0.625a0.9375 0.9375 0 0 1 0 1.875H10.625"
                            stroke-width="1"></path>
                        <path d="M11.875 13.125v0.625m0 -5v0.625" stroke-width="1"></path>
                    </svg>

                </div>
                <div class="text-xl text-gray-900 flex gap-2 ">
                    <h5>20</h5>
                    <p class="text-xl text-gray-900 ">
                        Transaksi
                    </p>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center h-24 rounded bg-gray-100 dark:bg-gray-800 gap-2">
                <div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.5 -0.5 16 16" fill="none" stroke="#000000"
                        stroke-linecap="round" stroke-linejoin="round" id="Users--Streamline-Tabler" height="40"
                        width="40">
                        <desc>Users Streamline Icon: https://streamlinehq.com</desc>
                        <path d="M3.125 4.375a2.5 2.5 0 1 0 5 0 2.5 2.5 0 1 0 -5 0" stroke-width="1"></path>
                        <path d="M1.875 13.125v-1.25a2.5 2.5 0 0 1 2.5 -2.5h2.5a2.5 2.5 0 0 1 2.5 2.5v1.25"
                            stroke-width="1"></path>
                        <path d="M10 1.9562499999999998a2.5 2.5 0 0 1 0 4.84375" stroke-width="1"></path>
                        <path d="M13.125 13.125v-1.25a2.5 2.5 0 0 0 -1.875 -2.40625" stroke-width="1"></path>
                    </svg>

                </div>
                <div class="text-xl text-gray-900 flex gap-2 ">
                    <h5>12</h5>
                    <p class="text-xl text-gray-900 ">
                        Users
                    </p>
                </div>
            </div>

        </div>
    </div>

    <div class="flex overflow-hidden gap-3 mt-3">
        <x-dashboard.chart></x-dashboard.chart>
        <x-dashboard.piechart></x-dashboard.piechart>
    </div>



@endsection
