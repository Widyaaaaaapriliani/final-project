@extends('layouts.dashboard-layout')

@section('content')
    <!-- Dashboard Header -->
    <div class="shadow-lg rounded-xl pt-20 w-full bg-white">
    <div class="flex justify-between items-center mb-4 p-4 text-white rounded-t-xl" style="background-color: #20750b;"> 
            <h1 class="text-2xl font-bold">Kelola Semua Data Produk</h1>
            <a href="{{ route('products.create') }}">
                <button
                    class="btn bg-white text-slate-900 hover:bg-gray-200 font-semibold px-4 py-2 rounded-lg shadow-md">Tambah
                    Produk</button>
            </a>
        </div>
        <div class="overflow-x-auto px-4">
    <!-- Input Pencarian -->
    <div class="mb-4">
        <input type="text" id="search" placeholder="Cari produk..."
               class="border-2 border-gray-300 p-2 rounded-lg w-full"
               onkeyup="searchProducts()">
    </div>
    
    <table class="table-auto w-full border-collapse rounded-xl overflow-hidden shadow-lg">
        <thead class="bg-gray-200 text-gray-800 text-lg">
            <tr>
                <th class="py-4 px-6 text-left">No</th>
                <th class="py-4 px-6 text-left">Nama</th>
                <th class="py-4 px-6 text-left">Deskripsi</th>
                <th class="py-4 px-6 text-left">Kategori</th>
                <th class="py-4 px-6 text-left">Harga</th>
                <th class="py-4 px-6 text-left">Jumlah</th>
                <th class="py-4 px-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody id="product-table" class="text-gray-700">
            @foreach ($products as $index => $product)
                <tr class="odd:bg-gray-50 even:bg-gray-100 hover:bg-slate-200 transition">
                    <td class="py-4 px-6">{{ $index + 1 }}</td>
                    <td class="py-4 px-6 font-semibold">{{ $product->nama }}</td>
                    <td class="py-4 px-6">{{ Str::words($product->deskripsi, 5, '...') }}</td>
                    <td class="py-4 px-6">{{ $product->category->nama ?? 'Tidak ada kategori' }}</td>
                    <td class="py-4 px-6">{{ number_format($product->harga, 0, ',', '.') }}</td>
                    <td class="py-4 px-6">{{ $product->jumlah }}</td>
                    <td class="py-4 px-6 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('products.edit', $product->id) }}" 
                               class="btn btn-warning p-2 rounded-lg">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error p-2 rounded-lg">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <!-- Confirmation Dialog for Delete -->
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus barang ini?');
        }
    </script>


<script>
// Fungsi untuk mencari produk
function searchProducts() {
    const input = document.getElementById('search');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('product-table');
    const rows = table.getElementsByTagName('tr');

    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        let match = false;

        // Cek setiap sel dalam baris
        for (let j = 0; j < cells.length; j++) {
            if (cells[j]) {
                const cellValue = cells[j].textContent || cells[j].innerText;
                if (cellValue.toLowerCase().indexOf(filter) > -1) {
                    match = true; // Jika ada kecocokan, tandai baris ini
                    break;
                }
            }
        }

        // Tampilkan atau sembunyikan baris berdasarkan kecocokan
        if (match) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
}
</script>
@endsection
