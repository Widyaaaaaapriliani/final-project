<?php

namespace App\Http\Controllers;

use App\Models\Product;  // Pastikan model Product sudah di-import
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;  // Make sure to import Carbon for date handling
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $userId = session('user_id');

        $transaksiList = Transaksi::where('id_pelanggan', $userId)
            ->where('status', 'completed')
            ->get();

        foreach ($transaksiList as $transaksi) {
            $productIds          = explode(',', $transaksi->id_produk);
            $transaksi->products = Product::whereIn('id', $productIds)->get();
        }

        return view('riwayat', compact('transaksiList'));
    }

    public function showAll(Request $request)
    {
        // Mendapatkan filter dari request
        $filter = $request->get('filter', 'semua');  // Nilainya bisa: 'hari', 'minggu', atau 'bulan'

        // Memulai query untuk transaksi
        $transaksis = Transaksi::with('pelanggan');

        // Menambahkan kondisi berdasarkan filter
        if ($filter == 'hari') {
            $transaksis->hariIni();
        } elseif ($filter == 'minggu') {
            $transaksis->mingguIni();
        } elseif ($filter == 'bulan') {
            $transaksis->bulanIni();
        }

        // Eksekusi query
        $transaksis = $transaksis->get();

        // Menampilkan data transaksi di halaman utama
        return view('dashboard.transaksi.index', compact('transaksis', 'filter'));
    }

    public function generatePdf($filter, Request $request)
    {
        $startDate = $request->get('start_date');
        $endDate   = $request->get('end_date');

        $transaksis = Transaksi::with('pelanggan');

        if ($startDate && $endDate) {
            $transaksis->whereBetween('tanggal_transaksi', [
                Carbon::parse($startDate)->startOfDay(),
                Carbon::parse($endDate)->endOfDay()
            ]);
        }

        foreach ($transaksis as $transaksi) {
            $productIds          = explode(',', $transaksi->id_produk);  // Pisahkan ID produk
            $transaksi->products = Product::whereIn('id', $productIds)->get();
        }
        // Ambil data transaksi
        $transaksis = $transaksis->get();

        // Hitung total transaksi
        $totalTransaksi = $transaksis->sum('harga_total');

        // Generate PDF with filtered transactions
        $pdf = PDF::loadView('dashboard.transaksi.pdf', compact('transaksis', 'filter', 'totalTransaksi'));

        $filename = 'Transaksi-' . ucfirst($filter) . '.pdf';

        return $pdf->download($filename);
    }

    public function showAllLaporan(Request $request)
    {
        $startDate = $request->get('start_date');
        $endDate   = $request->get('end_date');

        // Eager load relasi 'pelanggan' dan 'products'
        $transaksis = Transaksi::with('pelanggan');

        // Terapkan filter tanggal jika ada
        if ($startDate && $endDate) {
            $transaksis->whereBetween('tanggal_transaksi', [
                Carbon::parse($startDate)->startOfDay(),
                Carbon::parse($endDate)->endOfDay()
            ]);
        }

        foreach ($transaksis as $transaksi) {
            $productIds          = explode(',', $transaksi->id_produk);  // Pisahkan ID produk
            $transaksi->products = Product::whereIn('id', $productIds)->get();
        }
        // Ambil data transaksi
        $transaksis = $transaksis->get();

        // Hitung total transaksi
        $totalTransaksi = $transaksis->sum('harga_total');

        return view('dashboard.transaksi.laporan', compact('transaksis', 'totalTransaksi'));
    }
}
