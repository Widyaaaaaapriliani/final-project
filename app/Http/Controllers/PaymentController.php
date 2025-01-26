<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    // Method untuk menampilkan semua transaksi
    public function index()
    {
        $transaksi = Transaksi::where('id_pelanggan', Auth::id())->get();
        return response()->json($transaksi);
    }

    // Method untuk menampilkan transaksi berdasarkan ID
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }
        return response()->json($transaksi);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'receipt' => 'required|image|max:2048',
        ]);

        // Ambil data pengguna yang sedang login dari session
        $userId = session('user_id');

        // Debugging: Log user_id
        Log::debug('User ID from session: ' . $userId);

        if (!$userId) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 403);
        }

        // Ambil data keranjang berdasarkan user_id
        $cart = Cart::where('user_id', $userId)->first();

        // Debugging: Log cart data
        Log::debug('Cart data: ' . json_encode($cart));

        if (!$cart) {
            return response()->json(['message' => 'Keranjang belanja tidak ditemukan'], 404);
        }

        // Ambil item dari tabel CartItem berdasarkan cart_id
        $cartItems = CartItem::where('cart_id', $cart->id)->get();

        // Debugging: Log cart items
        Log::debug('Cart Items: ' . json_encode($cartItems));

        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Keranjang belanja kosong'], 400);
        }

        $totalPrice    = 0;
        $totalQuantity = 0;

        try {
            $path = $request->file('receipt')->store('bukti_transfer', 'public');

            // Debugging: Log file path
            Log::debug('File path: ' . $path);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menyimpan bukti transfer', 'error' => $e->getMessage()], 500);
        }

        // Proses transaksi dan pengurangan stok produk
        foreach ($cartItems as $item) {
            $product = $item->product;

            // Debugging: Log product data
            Log::debug('Processing product: ' . json_encode($product));

            if (!$product) {
                return response()->json(['message' => 'Produk dengan ID ' . $item->product_id . ' tidak ditemukan'], 404);
            }

            // Periksa apakah stok cukup
            if ($product->jumlah < $item->quantity) {
                return response()->json(['message' => 'Stok produk ' . $product->nama . ' tidak mencukupi'], 400);
            }

            // Hitung total harga dan jumlah
            $totalPrice    += $product->harga * $item->quantity;
            $totalQuantity += $item->quantity;

            // Kurangi stok produk
            $product->jumlah -= $item->quantity;
            $product->save();

            // Buat transaksi baru
            Transaksi::create([
                'id_pelanggan'      => $userId,
                'jumlah'            => $item->quantity,
                'id_produk'         => $product->id,
                'harga_total'       => $product->harga * $item->quantity,
                'status'            => 'completed',
                'bukti_tf'          => $path,
                'tanggal_transaksi' => Carbon::now(),
            ]);

            // Debugging: Log transaction data
            Log::debug('Transaction created for product: ' . $product->id . ' with total price: ' . $product->harga * $item->quantity);
        }

        // Kosongkan keranjang setelah checkout berhasil
        CartItem::where('cart_id', $cart->id)->delete();

        // Hapus keranjang jika sudah kosong
        $cart->delete();

        // Debugging: Log cart cleared
        Log::debug('Cart cleared for user ID: ' . $userId);

        return response()->json(['message' => 'Pembayaran berhasil disimpan', 'data' => 'success'], 201);
    }

    // Method untuk mengupdate status transaksi (misalnya oleh admin)
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        // Update status transaksi
        $transaksi->update(['status' => $validated['status']]);

        return response()->json(['message' => 'Status transaksi diperbarui', 'data' => $transaksi]);
    }

    // Method untuk menghapus transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        // Hapus file bukti transfer jika ada
        if ($transaksi->bukti_tf) {
            Storage::disk('public')->delete($transaksi->bukti_tf);
        }

        $transaksi->delete();

        return redirect()->back()->with('success', 'Transaksi berhasil dihapus.');
    }

    public function checkoutSingleProduct(Request $request, $productId)
    {
        // Validasi input untuk bukti transfer
        $validated = $request->validate([
            'receipt'  => 'required|image|max:2048',  // Bukti transfer wajib berupa gambar
            'quantity' => 'required|integer|min:1'  // Jumlah produk yang dibeli
        ]);

        // Ambil pengguna dari session
        $userId = session('user_id');

        if (!$userId) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 403);
        }

        // Ambil data produk berdasarkan ID
        $product = \App\Models\Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        // Periksa apakah stok mencukupi
        if ($product->jumlah < $validated['quantity']) {
            return response()->json(['message' => 'Stok produk tidak mencukupi'], 400);
        }

        // Simpan bukti transfer
        try {
            $path = $request->file('receipt')->store('bukti_transfer', 'public');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menyimpan bukti transfer', 'error' => $e->getMessage()], 500);
        }

        // Kurangi stok produk
        $product->jumlah -= $validated['quantity'];
        $product->save();

        // Buat transaksi baru
        $transaksi = Transaksi::create([
            'id_pelanggan'      => $userId,
            'jumlah'            => $validated['quantity'],
            'id_produk'         => $product->id,
            'harga_total'       => $product->harga * $validated['quantity'],
            'status'            => 'pending',
            'bukti_tf'          => $path,
            'tanggal_transaksi' => Carbon::now(),
        ]);

        return response()->json([
            'message'   => 'Checkout berhasil',
            'transaksi' => $transaksi
        ], 201);
    }
}
