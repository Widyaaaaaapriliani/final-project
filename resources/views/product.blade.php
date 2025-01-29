@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="w-full mt-20 px-32">
        <div class="bg-white p-4 rounded-lg shadow-xl gap-6 ">
            <div class="flex">
                <!-- Product Image -->
                <div class="w-1/2 flex justify-center relative h-[80vh] overflow-hidden rounded-lg shadow-md bg-green-900">
                <img src="{{ Str::startsWith($product->path_img, 'http') ? $product->path_img : asset('storage/' . $product->path_img) }}"
                    alt="Product Image" class="w-full h-full object-cover hover:scale-110 transition duration-300 ease-in-out">
            </div>



                <!-- Product Details -->
                <div class="w-1/2 flex flex-col p-4 justify-between px-8 space-y-6">
                    <div class="text-start">
                        <h1 class="text-5xl font-extrabold text-gray-800">{{ $product->nama }}</h1>
                        <p class="text-lg text-gray-500 font-medium mt-2">Kategori Produk</p>
                        <div class="h-1 w-1/3 bg-gray-800 mt-4 rounded"></div>
                    </div>

                    <!-- Product Specs -->
                    <div class="space-y-6">
                        <div>
                            <p class="text-2xl font-semibold text-gray-700">Deskripsi</p>
                            <p class="text-lg text-gray-600 mt-2">{{ $product->deskripsi }}</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="qty" class="text-lg font-semibold text-gray-700">Kuantitas:</label>
                            <input id="qty" type="number" value="1" min="1"
                                class="border-2 border-gray-300 p-2 text-center w-20 text-lg font-semibold rounded-lg focus:ring-2 focus:ring-gray-500 focus:outline-none" />
                        </div>
                        <div>
                            <p class="text-2xl font-semibold text-gray-700">Stok</p>
                            <p class="text-lg font-bold text-gray-900">{{ $product->jumlah }} Barang</p>
                        </div>
                    </div>

                    <!-- Price -->
                    <div>
                        <p class="text-4xl font-extrabold text-gray-900">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                        <div class="mt-4 flex justify-between items-center gap-4">
                            <!-- Checkout Button -->
                            <button id="co" onclick="showPaymentModal()"
                                class="bg-green-500 text-white py-3 px-6 rounded-lg hover:bg-green-700 transform transition hover:scale-105 shadow-lg w-full">
                                Checkout Sekarang
                            </button>

                            <!-- Add to Cart Button -->
                            <button id="add-to-cart" 
                             class="flex items-center justify-center bg-green-500 text-white hover:bg-green-700 rounded-lg transform transition hover:scale-105 shadow-lg px-4 py-2">
                            <img src="{{ asset('images/cart.png') }}" alt="cart icon" class="h-12 mr-2">
                            </button>
                        </div>
                        <dialog id="my_modal_3" class="modal">
                            <div class="modal-box">
                                <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <h3 class="text-lg font-bold">Keranjang Info</h3>
                                <p class="py-4">Produk Berhasil Ditambahkan</p>
                            </div>
                        </dialog>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Modal -->
        <div id="payment-modal"
            class="fixed z-50 inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center overflow-auto">
            <div class="bg-white rounded-lg shadow-xl w-1/3 p-6 relative">
                <button onclick="closePaymentModal()"
                    class="absolute top-4 right-4 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-full w-8 h-8 flex items-center justify-center font-bold">&times;</button>
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Pembayaran QRIS</h2>
                <p class="text-gray-700 mb-4">Silakan scan kode QR di bawah ini untuk menyelesaikan pembayaran:</p>
                <div class="bg-gray-100 p-4 rounded-lg text-gray-800 mb-6">
                    <strong>QRIS Pembayaran:</strong>
                    <div class="flex justify-center">
                        <img src="{{ asset('images/frame.png') }}" alt="QRIS" class="w-48 h-48">
                    </div>
                    <p class="mt-2">Pastikan untuk memasukkan jumlah yang sesuai dengan total yang tertera.</p>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Barang yang Dibeli:</h3>
                <ul class="list-disc list-inside text-gray-700 mb-4">
                    <li>{{ $product->nama }}</li>
                </ul>
                <div class="flex justify-between text-lg font-bold text-gray-900 mb-6">
                    <span>Total:</span>
                    <span>Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                </div>
                <form id="upload-receipt-form" enctype="multipart/form-data" class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Unggah Bukti Pembayaran:</label>
                    <input type="file" name="receipt" id="receipt"
                        class="border-2 border-gray-300 p-2 w-full rounded-lg focus:ring-2 focus:ring-gray-500 focus:outline-none"
                        accept="image/*" required onchange="previewReceipt()">
                </form>
                <div id="receipt-preview" class="hidden mb-6">
                    <h3 class="font-semibold text-gray-700 mb-2">Pratinjau Bukti Pembayaran:</h3>
                    <img id="receipt-image" src="" alt="Bukti Pembayaran" class="w-full rounded-lg shadow-lg">
                </div>
                <div class="flex justify-end space-x-4">
                    <button onclick="closePaymentModal()"
                        class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600">Tutup</button>
                    <button onclick="submitPaymentProof()"
                        class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">Kirim</button>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
<script>
    // Toggle Modal
    function toggleModal(modalId, show = true) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden', !show);
    }

    function showPaymentModal() {
        if (!isUserLoggedIn()) {
            // Jika pengguna belum login, arahkan ke halaman login
            window.location.href = "{{ route('login') }}";
            return; // Hentikan eksekusi fungsi
        }
        document.getElementById('payment-modal').classList.remove('hidden');
    }

    function closePaymentModal() {
    // Sembunyikan modal
    const modal = document.getElementById('payment-modal');
    modal.classList.add('hidden');

    // Reset input file dan pratinjau gambar
    const receiptInput = document.getElementById('receipt');
    const receiptImage = document.getElementById('receipt-image');
    const receiptPreview = document.getElementById('receipt-preview');
    const fileInfoText = document.getElementById('file-info');

    // Kosongkan nilai input file
    receiptInput.value = null;

    // Kosongkan pratinjau gambar
    receiptImage.src = "";
    receiptPreview.classList.add('hidden');

    // Kosongkan keterangan file info
    fileInfoText.textContent = '';
    }

   
    function isUserLoggedIn() {
        return {{ auth()->check() ? 'true' : 'false' }}; 
    }

    // Add to Cart
    document.getElementById('add-to-cart').addEventListener('click', function() {
    const qty = parseInt(document.getElementById('qty').value);
    const productId = {{ $product->id }};

    if (isNaN(qty) || qty < 1) {
        alert('Quantity harus minimal 1.');
        return;
    }

    fetch(`{{ route('cart.add', ':id') }}`.replace(':id', productId), {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ quantity: qty })
    })
    .then(response => response.json())
    .then(() => {
        updateCartView(); // Memperbarui tampilan keranjang setelah menambahkan item
    })
    .catch(error => {
        console.error(error);
        alert('Failed to add item to cart.');
    });
});



    // Receipt Preview
    function previewReceipt() {
    const receiptInput = document.getElementById('receipt');
    const receiptPreview = document.getElementById('receipt-preview');
    const receiptImage = document.getElementById('receipt-image');
    const fileInfo = document.getElementById('file-info');

    if (receiptInput.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            receiptImage.src = e.target.result;
            receiptPreview.classList.remove('hidden'); // Tampilkan pratinjau
            fileInfo.textContent = `File yang diunggah: ${receiptInput.files[0].name}`; // Tampilkan nama file
        };
        reader.readAsDataURL(receiptInput.files[0]);
    } else {
        receiptPreview.classList.add('hidden'); // Sembunyikan pratinjau jika tidak ada file
        fileInfo.textContent = ''; // Kosongkan keterangan file info
    }
}
    async function submitPaymentProof() {
    // Cek apakah pengguna sudah login
    if (!isUserLoggedIn()) {
        // Jika pengguna belum login, arahkan ke halaman login
        window.location.href = "{{ route('login') }}";
        return; // Hentikan eksekusi fungsi
    }

    const receiptInput = document.getElementById('receipt');

    // Cek apakah ada file yang diupload
    if (!receiptInput.files.length) {
        alert('Silakan unggah bukti pembayaran sebelum mengirim.');
        return; // Hentikan eksekusi fungsi jika tidak ada file
    }

    const formData = new FormData(document.getElementById('upload-receipt-form'));
    const productId = {{ $product->id }};
    const quantity = document.getElementById('qty').value;

    formData.append('product_id', productId);
    formData.append('quantity', quantity);

    try {
        const response = await fetch(`{{ route('checkout.single', ':productId') }}`.replace(':productId', productId), {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData,
        });

        if (response.ok) {
            alert('Bukti Pembayaran anda sudah dikirim');
            toggleModal('payment-modal', false);
            window.location.reload();
        } else {
            const errorData = await response.json();
            alert(`Gagal mengirim bukti pembayaran: ${errorData.message}`);
            window.location.reload();
        }
    } catch (error) {
        console.error(error);
        alert('Terjadi kesalahan saat mengirim bukti pembayaran.');
    }
}   
</script>
@section('scripts')

<script>
    // Kode yang sudah ada sebelumnya (Toggle Modal, showPaymentModal, dll)
    
    // Toggle Modal
    function toggleModal(modalId, show = true) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden', !show);
    }
    
    // ... (kode lainnya yang sudah ada) ...

    // Kode baru untuk update harga
    const hargaAwal = {{ $product->harga }};
    const stokTersedia = {{ $product->jumlah }};

    const formatKeRupiah = (angka) => {
        return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    };

    const updateHarga = () => {
        const kuantitas = parseInt(document.getElementById('qty').value);
        const totalHarga = hargaAwal * kuantitas;
        
        const elemenHarga = document.querySelector('.text-4xl.font-extrabold');
        elemenHarga.textContent = `Rp ${formatKeRupiah(totalHarga)}`;

        const totalElement = document.querySelector('#payment-modal .text-lg.font-bold.text-gray-900.mb-6 span:last-child');
        if (totalElement) {
            totalElement.textContent = `Rp ${formatKeRupiah(totalHarga)}`;
        }
    };

    document.getElementById('qty').addEventListener('input', function() {
        if (parseInt(this.value) > stokTersedia) {
            this.value = stokTersedia;
        }
        if (this.value < 1 || !this.value) {
            this.value = 1;
        }
        updateHarga();
    });

    document.addEventListener('DOMContentLoaded', updateHarga);
</script>

@endsection
    

