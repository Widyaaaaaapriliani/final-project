@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section class="py-12 pb-8 pt-28 h-screen bg-gray-100">
        <div class="px-32 flex gap-24">
            <div class="max-w-lg pt-6">
                <h1 class="text-5xl font-bold text-green-600">Lumbung <br> Pangan
                <span class="block text-9xl text-green-600">Pilihan</span>    
                <span class="block text-5xl pl-28">Harian Anda.</span></h1>
                <p class="mt-4 text-gray-900 pr-20">
                    Lumbung Pangan menyediakan solusi mudah, praktis, dan beragam untuk kebutuhan harian Anda, langsung di ujung jari.
                </p>
                <a href="/shop" class="inline-block mt-6 bg-green-500 text-white py-3 px-8 rounded-full hover:bg-green-700">Get Started</a>

            </div>
            <div class="relative">
                <div class="absolute z-10 w-[400px] translate-y-6 h-[420px] overflow-hidden shadow-lg">
                    <img src="https://plus.unsplash.com/premium_photo-1678344177250-bfdbed89fc03?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fGZhcm1lcnxlbnwwfHwwfHx8MA%3D%3D" alt="Skincare Model"
                        class="w-full h-full object-cover shadow-lg shadow-slate-900">
                </div>
                <div class="absolute -z-0 -left-6 top-0 w-[400px] h-[420px] shadow-lg border border-black">
                </div>
            </div>
        </div>
        <hr class="border-t-4 border-gray-300 mt-8">
    </section>

    <!-- Categories Section -->
    <section class="">
        <div class="px-32 w-full h-full">
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
        <div class="container mx-auto">
            <h2 class="text-center text-3xl font-semibold text-green-700">Produk Terlaris</h2>
            <h2 class="text-center text-xl font-light mb-6 mt-2 mx-52 text-gray-500">
                Temukan produk terlaris kami yang telah menjadi favorit pelanggan
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
            alert('Quantity harus minimal 1.');
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

            // Tampilkan modal atau beri notifikasi berhasil
            document.getElementById('my_modal_3').showModal();
        } catch (error) {
            console.error('Error:', error);
            alert('Gagal menambahkan ke keranjang. Silakan coba lagi.');
        }
    });
});

</script>
@endsection
