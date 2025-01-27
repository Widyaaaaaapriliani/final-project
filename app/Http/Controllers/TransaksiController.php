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
            ->where('status', 'selesai')
            ->get();

        foreach ($transaksiList as $transaksi) {
            $productIds          = explode(',', $transaksi->id_produk);
            $transaksi->products = Product::whereIn('id', $productIds)->get();
        }

        return view('riwayat', compact('transaksiList'));
    }

    public function showPesanan()
    {
        $userId        = session('user_id');
        $transaksiList = Transaksi::with('product')  // Muat relasi ke produk
            ->where('id_pelanggan', $userId)
            ->whereIn('status', ['dikirim'])
            ->get();

        return view('pesanan', compact('transaksiList'));
    }

    public function updateStatusByUser(Request $request, $id)
    {
        // Cari transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);

        // Periksa apakah status saat ini adalah 'dikirim'
        if ($transaksi->status === 'dikirim') {
            // Ubah status menjadi 'diterima'
            $transaksi->status = 'selesai';
            $transaksi->save();

            return redirect()->route('pesanan')->with('success', 'Pesanan telah diterima.');
        }

        return redirect()->route('pesanan')->with('error', 'Status pesanan tidak valid.');
    }

    public function showAll()
    {
        // Ambil semua transaksi beserta relasi pelanggan dan produk
        $transaksi = Transaksi::with(['pelanggan', 'produk'])->get();

        return view('dashboard.transaksi.index', compact('transaksi'));
    }

    // Mengupdate status transaksi
    public function updateStatus(Request $request, $id)
    {
        $transaksi         = Transaksi::findOrFail($id);
        $transaksi->status = $request->status;
        $transaksi->save();

        return response()->json(['message' => 'Status transaksi berhasil diperbarui']);
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

        // Ambil data transaksi
        $transaksis = $transaksis->get();

        // Hitung total transaksi
        $totalTransaksi = $transaksis->sum('harga_total');

        return view('dashboard.transaksi.laporan', compact('transaksis', 'totalTransaksi'));
    }
}
