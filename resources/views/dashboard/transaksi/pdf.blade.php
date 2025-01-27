<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        .logo {
            width: 100px;
            height: auto;
        }

        .company-info {
            text-align: left;
            flex: 1;
            margin-left: 20px;
        }

        .company-info h1 {
            margin: 0;
            font-size: 20px;
            text-transform: uppercase;
        }

        .company-info p {
            margin: 2px 0;
            font-size: 14px;
        }

        h1 {
            text-align: center;
            margin: 20px 0 10px;
            font-size: 18px;
            text-transform: uppercase;
        }

        .periode {
            text-align: center;
            margin-bottom: 20px;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 14px;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
            white-space: nowrap;
        }

        table th {
            background-color: #f0f0f0;

        }

        .total {
            font-weight: bold;
            text-align: right;
            padding-right: 8px;
        }

        .total-amount {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>

<body>
    <!-- Header dengan Logo dan Informasi Toko -->
    <div class="header">
        <img src="{{ public_path('images/logo1.png') }}" alt="Logo Toko" class="logo">
        <div class="company-info">
            <h1>PT MaskGlow</h1>
            <p>Jl. Jend. Sudirman No. 123, Makassar</p>
            <p>Telp: (0411) 123456 | Email: maskglowmks@gmail.com</p>
        </div>
    </div>

    <!-- Judul Laporan -->
    <h1>Laporan Penjualan</h1>

    <!-- Periode -->
    <div class="periode">
        <p>Periode: {{ request('start_date') }} s/d {{ request('end_date') }}</p>
    </div>

    <!-- Tabel Penjualan -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga (Rp.)</th>
                <th>Total (Rp.)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $transaksi->pelanggan->name ?? 'Nama Tidak Ditemukan' }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->translatedFormat('d F Y') }}
                    </td>

                    <td class="px-4 py-2">
                        @foreach ($transaksi->products as $product)
                            <div>{{ $product->nama }}</div>
                        @endforeach
                    </td>
                    <td>{{ $transaksi->jumlah }}</td>
                    <td class="px-4 py-2">
                        {{ number_format($transaksi->harga_total / $transaksi->jumlah, 0, ',', '.') }}
                    </td>
                    <td> {{ number_format($transaksi->harga_total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="total">Total Pendapatan</td>
                <td colspan="2" class="total-amount">Rp {{ number_format($totalTransaksi, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
