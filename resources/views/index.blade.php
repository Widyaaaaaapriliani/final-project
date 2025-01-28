@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section class="py-15 h-screen bg-gray-100 flex items-center">
  <div class="container mx-auto flex items-center gap-8 px-6">
    <!-- Left Section (Enhanced Text) -->
    <div class="w-1/2">
      <h1 class="text-9xl font-extrabold text-green-600 leading-tight">
        Selamat Datang!
      </h1>
      <p class="mt-7 text-gray-700 text-lg">
        Nikmati <span class="text-green-600 font-semibold">pengalaman terbaik</span> bersama Lumbung Pangan. Solusi mudah, praktis, dan beragam untuk kebutuhan harian Anda.
      </p>
      <ul class="mt-6 text-gray-600 space-y-2 text-base">
        <li><span class="text-green-600 font-semibold">✔</span> Produk segar langsung dari petani</li>
        <li><span class="text-green-600 font-semibold">✔</span> Proses belanja yang cepat dan mudah</li>
        <li><span class="text-green-600 font-semibold">✔</span> Harga terjangkau untuk semua kebutuhan</li>
      </ul>
      <div class="mt-6 space-x-4">
        <a href="/login" class="bg-green-600 text-white py-3 px-6 rounded-full hover:bg-green-500 shadow-lg transition">Mulai Berbelanja</a>
        <a href="/about" class="bg-gray-200 text-gray-800 py-3 px-6 rounded-full hover:bg-gray-300 shadow-lg transition">Pelajari Lebih Lanjut</a>
      </div>
    </div>

    <!-- Right Section (Image Slider) -->
    <div class="w-1/2">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <!-- Slide 1 -->
          <div class="swiper-slide">
            <div class="relative w-full h-[420px] overflow-hidden shadow-lg rounded-lg">
              <img src="{{ asset('images/slide bar 1.jpg') }}" 
              alt="Gambar 1" class="w-full h-full object-cover">
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="swiper-slide">
            <div class="relative w-full h-[420px] overflow-hidden shadow-lg rounded-lg">
              <img src="{{ asset('images/slide bar 2.jpg') }}" 
              alt="Gambar 1" class="w-full h-full object-cover">
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="swiper-slide">
            <div class="relative w-full h-[420px] overflow-hidden shadow-lg rounded-lg">
              <img src="{{ asset('images/slide bar 3.png') }}" 
              alt="Gambar 1" class="w-full h-full object-cover">
            </div>
          </div>

          <!-- Slide 4 -->
          <div class="swiper-slide">
            <div class="relative w-full h-[420px] overflow-hidden shadow-lg rounded-lg">
              <img src="{{ asset('images/slide bar 4.jpg') }}" 
              alt="Gambar 1" class="w-full h-full object-cover">
            </div>
          </div>

        </div>
        <!-- Pagination -->
        <div class="swiper-pagination mt-4"></div>
      </div>
    </div>
  </div>
</section>

    <!-- Categories Section -->
    <section class="py-16">
        <div class="px-8 w-full h-full">
            <h1 class="text-center text-4xl font-bold text-green-700">Kenapa Harus Lumbung Pangan?</h1>
            
            <div class="mt-5 max-w-7xl mx-auto px-4 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                  <!-- Biaya Pengiriman Gratis -->
                  <div class="text-center">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto bg-green-100 rounded-full">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V10m9 0v11m-5-11h5l3 3m-3-3l3 3m-3-3V3m0 7h2a1 1 0 010 2h-2" />
                      </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-green-700">BIAYA PENGIRIMAN GRATIS</h3>
                    <p class="text-gray-500">Belanja minimal Rp 500.000</p>
                  </div>
                
                  <!-- Keamanan Terjaga -->
                  <div class="text-center">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto bg-yellow-100 rounded-full">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c-1.486 0-4 1.21-4 3v4h8v-4c0-1.79-2.514-3-4-3zm0 0V8m0-5v3" />
                      </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-green-700">KEAMANAN TERJAGA</h3>
                    <p class="text-gray-500">Aman dan terpercaya</p>
                  </div>
              
                  <!-- Kualitas Terbaik -->
                  <div class="text-center">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto bg-blue-100 rounded-full">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c.833 0 2.5.5 2.5 3s-1.667 3-2.5 3-2.5-.5-2.5-3 1.667-3 2.5-3zm0 0V2m0 6v8" />
                      </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-green-700">KUALITAS TERBAIK</h3>
                    <p class="text-gray-500">Kualitas dari lumbung desa terbaik</p>
                  </div>
              
                  <!-- Bantuan -->
                  <div class="text-center">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto bg-yellow-100 rounded-full">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V9a8 8 0 10-16 0v4l-2 2v1h20v-1l-2-2zm-4 6H8m12-2h2v-1a1 1 0 00-.293-.707L20 13m0 6v1h-4v-1" />
                      </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-green-700">BANTUAN</h3>
                    <p class="text-gray-500">Bantuan 24/7 selalu online</p>
                  </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bestsellers Section -->
    <section class="py-12 px-32">
        <div class="container mx-auto mt-20">
            <h2 class="text-center text-3xl font-semibold text-green-700">Rekomendasi Untukmu</h2>
            <h2 class="text-center text-xl font-light mb-6 mt-2 mx-52 text-gray-500">
                Temukan produk pilihan terbaik untukmu
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-5">
              @if (!empty($products) && count($products) > 0)
                  @foreach ($products as $product)
                      <x-shop.card-product :path="route('product.show', $product->id)" :title="$product->nama" :id_product="$product->id" :price="number_format($product->harga, 0, ',', '.') . ' IDR'" :image="Str::startsWith($product->path_img, 'http')
                          ? $product->path_img
                          : asset('storage/' . $product->path_img)" />
                  @endforeach
              @else
                  <p class="text-center col-span-full">No products available.</p>
              @endif
            </div>
          <dialog id="my_modal_3" class="modal">
            <div class="modal-box">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <h3 class="text-lg font-bold text-green-700">Keranjang Info</h3>
                <p class="py-4 text-green-500">Produk Berhasil Ditambahkan</p>
            </div>
          </dialog>
        </div>
    </section>

@endsection

@section('scripts')
<script>
    function toggleModal(modalId, show = true) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden', !show);
    }
   
    function isUserLoggedIn() {
        return {{ auth()->check() ? 'true' : 'false' }}; 
    }
   

    document.querySelectorAll('#add-to-cart').forEach(button => {
        button.addEventListener('click', async function () {
            if (!isUserLoggedIn()) {
                window.location.href = "{{ route('login') }}";
                return;
            }

            const productId = this.dataset.productId; // Ambil ID produk dari data-attribute tombol
            const qty = 1; // Set default quantity

            if (isNaN(qty) || qty < 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Quantity harus minimal 1.'
                });
                return;
            }

            try {
                const response = await fetch(`{{ route('cart.add', ':id') }}`.replace(':id', productId), {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        quantity: qty
                    })
                });

                if (!response.ok) {
                    throw new Error('Terjadi kesalahan saat menambahkan ke keranjang.');
                }

                const data = await response.json();
                console.log('Response:', data);

                // Tampilkan SweetAlert untuk notifikasi sukses
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Produk berhasil ditambahkan ke keranjang.',
                    timer: 2000,
                    showConfirmButton: false
                });

            } catch (error) {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Gagal menambahkan ke keranjang. Silakan coba lagi.'
                });
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 1, // Menampilkan satu slide per kali
            loop: true, // Slider akan kembali ke awal setelah slide terakhir
            autoplay: {
                delay: 3000, // Interval antar slide (ms)
                disableOnInteraction: false, // Autoplay tetap berjalan meskipun pengguna berinteraksi
            },
            pagination: {
                el: '.swiper-pagination', // Elemen pagination
                clickable: true, // Membuat pagination interaktif
            },
            speed: 600, // Kecepatan transisi slide (ms)
            effect: 'fade', // Tambahkan efek transisi jika ingin
            fadeEffect: {
                crossFade: true, // Memperhalus efek transisi fade
            },
        });
    });
</script>

@endsection
