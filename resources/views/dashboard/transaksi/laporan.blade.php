@extends('layouts.dashboard-layout')

@section('content')
    <div class="container pt-24">
        <h1 class="mb-4 text-3xl font-bold">Laporan Transaksi</h1>

        <!-- Filter Form -->
        <form action="{{ route('transaksi.showAllLaporan') }}" method="GET" class="flex  items-center mb-4 ">

            <div class="form-group mb-3 flex-1 mr-4">
                <label for="start_date" class="block text-sm font-medium text-gray-700 w-full">Tanggal Mulai</label>

                <input type="date" name="start_date" class="form-control rounded-md shadow-sm mt-1 w-full "
                    value="{{ request('start_date') }}">
            </div>
            <div class="form-group mb-3 flex-1 mr-4 w-full">
                <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                <input type="date" name="end_date" class="form-control rounded-md shadow-sm mt-1 w-full "
                    value="{{ request('end_date') }}">
            </div>
            <button type="submit" class="bg-blue-600 p-2.5 px-4 rounded-md text-white shadow-sm mt-2.5">Terapkan
                Filter</button>
        </form>
        <div class="my-4">
            <strong class="block">Total Transaksi</strong>
            <span class="font-bold text-4xl">Rp {{ number_format($totalTransaksi, 0, ',', '.') }}</span>
        </div>

        <!-- PDF Button -->
        <div class="my-6">
            <a href="{{ route('transaksi.exportPdf', ['filter' => 'laporan', 'start_date' => request('start_date'), 'end_date' => request('end_date')]) }}"
                class="bg-red-600 p-2.5 px-4 rounded-md text-white shadow-sm mt-2.5">
                Unduh Laporan PDF
            </a>
        </div>

        <!-- Displaying Transactions -->
        @if ($transaksis->isEmpty())
            <p class="text-gray-500">Tidak ada transaksi yang sesuai dengan filter.</p>
        @else
            <div class="overflow-x-auto bg-slate-50 p-2 rounded-lg shadow-sm">
                <table class="table-auto w-full text-sm text-gray-600">
                    <thead class="bg-slate-200 text-gray-800">
                        <tr>
                            <th class="px-4 py-2 text-left">#</th>
                            <th class="px-4 py-2 text-left">Nama Pelanggan</th>
                            <th class="px-4 py-2 text-left">Nama Produk</th>
                            <th class="px-4 py-2 text-left">Jumlah</th>
                            <th class="px-4 py-2 text-left">Harga Satuan (Rp.)</th>
                            <th class="px-4 py-2 text-left">Harga Total (Rp.)</th>
                            <th class="px-4 py-2 text-left">Tanggal Transaksi</th>
                            <th class="px-4 py-2 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksis as $transaksi)
                            <tr class="border-t border-slate-300">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $transaksi->pelanggan->name ?? 'Nama Tidak Ditemukan' }}
                                </td>
                                <td class="px-4 py-2">
                                    @foreach ($transaksi->products as $product)
                                        <div>{{ $product->nama }}</div>
                                    @endforeach
                                </td>
                                <td class="px-4 py-2">{{ $transaksi->jumlah }}</td>
                                <td class="px-4 py-2">
                                    {{ number_format($transaksi->harga_total / $transaksi->jumlah, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-2"> {{ number_format($transaksi->harga_total, 0, ',', '.') }}
                                </td>


                                <td class="px-4 py-2">
                                    {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d-m-Y') }}</td>
                                <td class="px-4 py-2">
                                    <form action="{{ route('transaksi.destroy', $transaksi->id_transaksi) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">Tidak ada data transaksi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="my-4">
                    <strong class="">Total Pendapatan : </strong>
                    <span class="font-bold ">Rp {{ number_format($totalTransaksi, 0, ',', '.') }}</span>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('styles')
    <style>
        .container {
            padding-top: 40px;
        }

        .form-group label {
            font-size: 0.875rem;
            color: #4a5568;
        }

        .form-control {
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.5rem;
            font-size: 1rem;
            width: 100%;
        }

        .form-control:focus {
            border-color: #4c51bf;
            box-shadow: 0 0 0 1px #4c51bf;
        }

        .btn {
            background-color: #4c51bf;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 1rem;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #434190;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #f7fafc;
            color: #4a5568;
        }

        table td {
            border-top: 1px solid #e2e8f0;
            color: #2d3748;
        }

        table tr:hover {
            background-color: #f9fafb;
        }

        .overflow-x-auto {
            overflow-x: auto;
        }
    </style>
@endpush
