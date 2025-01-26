@extends('layouts.dashboard-layout')

@section('content')
    <div class="container mx-auto py-6 rounded-md pt-20">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6 bg-slate-50 p-4 rounded-lg shadow-sm">
            <h1 class="text-2xl font-bold text-slate-800">Kelola Semua Transaksi</h1>
        </div>

        <!-- Transaksi Table -->
        <div class="overflow-x-auto bg-slate-50 p-2 rounded-lg shadow-sm">
            <table class="table-auto w-full text-sm text-gray-600">
                <thead class="bg-slate-200 text-gray-800">
                    <tr>
                        <th class="px-4 py-2 text-left">#</th>
                        <th class="px-4 py-2 text-left">Nama Pelanggan</th>
                        <th class="px-4 py-2 text-left">Jumlah</th>
                        <th class="px-4 py-2 text-left">Harga Total</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Tanggal Transaksi</th>
                        <th class="px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $transaksis = [
                            [
                                'id' => 1,
                                'nama_pelanggan' => 'John Doe',
                                'jumlah' => 3,
                                'harga_total' => 150000,
                                'status' => 'success',
                                'tanggal_transaksi' => '2024-12-10',
                            ],
                            [
                                'id' => 2,
                                'nama_pelanggan' => 'Jane Smith',
                                'jumlah' => 1,
                                'harga_total' => 50000,
                                'status' => 'pending',
                                'tanggal_transaksi' => '2024-12-09',
                            ],
                            [
                                'id' => 3,
                                'nama_pelanggan' => 'Alice Johnson',
                                'jumlah' => 2,
                                'harga_total' => 100000,
                                'status' => 'failed',
                                'tanggal_transaksi' => '2024-12-08',
                            ],
                        ];
                    @endphp

                    @forelse ($transaksis as $transaksi)
                        <tr class="border-t border-slate-300">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $transaksi['nama_pelanggan'] }}</td>
                            <td class="px-4 py-2">{{ $transaksi['jumlah'] }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($transaksi['harga_total'], 2) }}</td>
                            <td class="px-4 py-2">{{ $transaksi['status'] }}</td>
                            <td class="px-4 py-2">{{ $transaksi['tanggal_transaksi'] }}</td>
                            <td class="px-4 py-2">
                                <button type="button" class="text-red-500 hover:text-red-700">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">Tidak ada data transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
