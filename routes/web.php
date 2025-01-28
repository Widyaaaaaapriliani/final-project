<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\signupController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama

Route::get('/', [ProductController::class, 'Best4Product'])->name('product.best');

// Route untuk login

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');

Route::post('/login', [LoginController::class, 'login'])->name('login');

// Route untuk signup
Route::get('/signup', [signupController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup');

Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.view');
Route::delete('/cart/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::post('/checkout/single/{productId}', [PaymentController::class, 'checkoutSingleProduct'])->name('checkout.single');
Route::post('/submit-payment-proof', [PaymentController::class, 'store']);

Route::get('/transaksion', [TransaksiController::class, 'index'])->name('transaksi.index');

Route::get('/product/{id}', [ProductDetailsController::class, 'showProductDetails'])->name('product.show');

// Route untuk signup

// Route untuk shop
// Route::get('/shop', function () {
//     return view(view: 'shop');
// })->name('shop');

Route::get('/shop', [ProductController::class, 'index'])->name('products.index');

Route::get('/riwayat', function () {
    return view(view: 'riwayat');
})->name('riwayat');

Route::get('/contact-us', function () {
    return view(view: 'contact_us');
})->name('contact_us');

Route::view('/about', 'about_us')->name('about');

// Route kategori produk
// Route::get('/kategori', function () {
//     return view(view: 'categories');
// })->name('categories');
Route::get('/kategori', [CategoryProductController::class, 'index'])->name('categories');
Route::get('/kategori/{id}', function () {
    return view(view: 'productbycategory');
})->name('categories.show');

// Route untuk transaksi

Route::get('/dashboard/transaksi/laporan', function () {
    return view(view: 'dashboard.transaksi.laporan');
})->name('transaksi.showAllLaporan');

Route::get('/pesanan', [TransaksiController::class, 'showPesanan'])->name('pesanan');

Route::put('/pesanan/{id}', [TransaksiController::class, 'updateStatusByUser'])->name('pesanan.updatebyuser');

Route::get('/kategori/{id}', [CategoryProductController::class, 'show'])->name('categories.show');

// Route untuk logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('status', 'Anda berhasil logout');
})->name('logout');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [ProductController::class, 'showProduct'])->name('dashboard.products');
    Route::get('/produk/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/produk', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/produk/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/kategori', [CategoryProductController::class, 'kategori_dashboard'])->name('dashboard.kategori.index');
    Route::get('/categories', [CategoryProductController::class, 'index'])->name('dashboard.category_products.index');
    Route::get('/categories/tambah', [CategoryProductController::class, 'create'])->name('dashboard.category_products.create');
    Route::post('/categories', [CategoryProductController::class, 'store'])->name('dashboard.category_products.store');
    Route::get('/categories/{id}/edit', [CategoryProductController::class, 'edit'])->name('dashboard.category_products.edit');
    Route::put('/categories/{id}', [CategoryProductController::class, 'update'])->name('dashboard.category_products.update');
    Route::delete('/categories/{id}', [CategoryProductController::class, 'destroy'])->name('dashboard.category_products.destroy');

    Route::patch('/transaksi/{id}/update-status', [TransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');

    Route::get('/transaksi', [TransaksiController::class, 'showAll'])->name('transaksi.showAll');

    // Route untuk menghapus transaksi
    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

    Route::get('/laporan', [TransaksiController::class, 'showAllLaporan'])
        ->name('transaksi.showAllLaporan');
    Route::get('/transaksion/export-pdf/{filter?}', [TransaksiController::class, 'generatePdf'])->name('transaksi.exportPdf');
});
