@extends('layouts.dashboard-layout')

@section('content')
    <div class="container mx-auto py-6 rounded-md pt-20">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4 p-4 text-white rounded-t-xl" style="background-color: #20750b;">
            <h1 class="text-3xl font-bold text-slate-50">Kelola Semua Transaksi</h1>
        </div>

        <!-- Transaksi Table -->
        <div class="overflow-x-auto bg-slate-50 p-4 rounded-lg shadow-lg">
            <table class="table-auto w-full text-sm text-gray-600 rounded-xl overflow-hidden">
                <thead class="bg-gray-200 text-gray-800 text-lg ">
                    <tr>
                        <th class="px-5 py-3 text-left">No</th>
                        <th class="px-5 py-3 text-left">Pelanggan</th>
                        <th class="px-5 py-3 text-left">Produk</th>
                        <th class="px-5 py-3 text-left">Jumlah</th>
                        <th class="px-5 py-3 text-left">Harga</th>
                        <th class="px-5 py-3 text-left">Status</th>
                        <th class="px-5 py-3 text-left">Tanggal</th>
                        <th class="px-5 py-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($transaksi as $transaksi)
                        <tr class="border-b hover:bg-slate-50 transition-all duration-300">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $transaksi->pelanggan->name ?? 'Nama Tidak Ditemukan' }}</td>
                            <td class="px-6 py-4">{{ $transaksi->produk->nama ?? 'Produk Tidak Ditemukan' }}</td>
                            <td class="px-6 py-4">{{ $transaksi->jumlah }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($transaksi->harga_total, 0, ',', '.') }}</td> 
                            <td class="px-6 py-4">
                                <select class="status-dropdown text-green-800 hover:bg-indigo-100 focus:outline-none rounded-lg shadow-sm" data-id="{{ $transaksi->id_transaksi }}" onchange="updateStatus(this)">
                                    <option value="pending" {{ $transaksi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="dikemas" {{ $transaksi->status == 'dikemas' ? 'selected' : '' }}>Dikemas</option>
                                    <option value="dikirim" {{ $transaksi->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                    <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                            </td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d-m-Y') }}</td>
                            
                            <td class="px-6 py-4 flex gap-1">
                                    <button onclick="showBuktiTF('{{ asset('storage/' . $transaksi->bukti_tf) }}')" 
                                        class="btn btn-primary p-2 rounded-lg bg-green-500 text-white hover:bg-green-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="Visible--Streamline-Sharp" height="24" width="24"><desc>Visible Streamline Icon: https://streamlinehq.com</desc><g id="visible--eye-eyeball-open-view"><path id="Subtract" fill="#000000" fill-rule="evenodd" d="M12.0814 3.25c-2.58537 0 -4.50957 1.12303 -6.19867 2.70213 -0.83741 0.78286 -1.62746 1.68718 -2.41532 2.62921 -0.25314 0.30268 -0.50499 0.60792 -0.75864 0.91534l-0.00003 0.00003 -0.00002 0.00003 -0.00003 0.00003 -0.00001 0.00002 -0.00001 0c-0.54539 0.66101 -1.09909 1.33211 -1.69169 2.00931L0.584839 12l0.432141 0.4939c0.59258 0.6772 1.14627 1.3483 1.69165 2.0093l0.00003 0 0.00003 0 0.00002 0.0001 0.00003 0 0.00002 0c0.25366 0.3074 0.50551 0.6127 0.75865 0.9154 0.78786 0.942 1.57791 1.8463 2.41532 2.6292 1.6891 1.5791 3.6133 2.7021 6.19867 2.7021 2.5854 0 4.5095 -1.123 6.1987 -2.7021 0.8374 -0.7829 1.6274 -1.6872 2.4153 -2.6292 0.2531 -0.3027 0.505 -0.608 0.7587 -0.9155l0 -0.0001 0.0001 0c0.5454 -0.661 1.099 -1.332 1.6916 -2.0092L23.5779 12l-0.4321 -0.4939c-0.5926 -0.6772 -1.1462 -1.3482 -1.6916 -2.00915l-0.0001 -0.00016c-0.2537 -0.30746 -0.5056 -0.61273 -0.7587 -0.91545 -0.7879 -0.94203 -1.5779 -1.84635 -2.4154 -2.62921C16.5909 4.37303 14.6667 3.25 12.0814 3.25Zm-0.0002 5c-2.0711 0 -3.75002 1.67893 -3.75002 3.75 0 2.0711 1.67892 3.75 3.75002 3.75 2.071 0 3.75 -1.6789 3.75 -3.75 0 -2.07107 -1.679 -3.75 -3.75 -3.75Z" clip-rule="evenodd" stroke-width="1"></path></g></svg>
                                    </button>
                               
                                <form action="{{ route('transaksi.destroy', $transaksi->id_transaksi) }}"
                                    method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error p-2 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white"
                                            viewBox="0 0 14 14">
                                            <path fill="#ffffff"
                                                d="M5.76256 2.01256C6.09075 1.68437 6.53587 1.5 7 1.5c0.46413 0 0.90925 0.18437 1.23744 0.51256 0.20736 0.20737 0.35731 0.46141 0.43961 0.73744h-3.3541c0.0823 -0.27603 0.23225 -0.53007 0.43961 -0.73744ZM3.78868 2.75c0.10537 -0.67679 0.42285 -1.30773 0.91322 -1.798097C5.3114 0.34241 6.13805 0 7 0c0.86195 0 1.6886 0.34241 2.2981 0.951903 0.49037 0.490367 0.8079 1.121307 0.9132 1.798097H13c0.4142 0 0.75 0.33579 0.75 0.75 0 0.41422 -0.3358 0.75 -0.75 0.75h-1v8.25c0 0.3978 -0.158 0.7794 -0.4393 1.0607S10.8978 14 10.5 14h-7c-0.39783 0 -0.77936 -0.158 -1.06066 -0.4393C2.15804 13.2794 2 12.8978 2 12.5V4.25H1c-0.414214 0 -0.75 -0.33578 -0.75 -0.75 0 -0.41421 0.335786 -0.75 0.75 -0.75h2.78868ZM5 5.87646c0.34518 0 0.625 0.27983 0.625 0.625V10.503c0 0.3451 -0.27982 0.625 -0.625 0.625s-0.625 -0.2799 -0.625 -0.625V6.50146c0 -0.34517 0.27982 -0.625 0.625 -0.625Zm4.625 0.625c0 -0.34517 -0.27982 -0.625 -0.625 -0.625s-0.625 0.27983 -0.625 0.625V10.503c0 0.3451 0.27982 0.625 0.625 0.625s0.625 -0.2799 0.625 -0.625V6.50146Z">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-gray-500">Tidak ada data transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal untuk menampilkan bukti TF -->
    <div id="buktiTFModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-96 shadow-lg relative">
        <!-- Tombol Close -->
        <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="tutup()">✕</button>
        <h2 class="text-xl font-bold mb-4">Bukti Transfer</h2>
        <img id="buktiTFImage" src="" alt="Bukti Transfer" class="rounded-md w-full">
    </div>
</div>

@endsection

@section('scripts')
<script>
    function updateStatus(selectElement) {
        const status = selectElement.value;
        const transaksiId = selectElement.getAttribute('data-id');

        console.log(`ID Transaksi: ${transaksiId}, Status: ${status}`); // Debug log untuk ID dan status

        // Menampilkan konfirmasi SweetAlert sebelum melanjutkan update status
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: `Status transaksi akan diubah menjadi ${status}.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, ubah!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika konfirmasi, kirim request PATCH
                fetch(`/dashboard/transaksi/${transaksiId}/update-status`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Menyertakan token CSRF
                    },
                    body: JSON.stringify({ status: status })
                })
                .then(response => {
                    if (response.ok) {
                        // Jika berhasil, tampilkan SweetAlert dengan pesan sukses
                        Swal.fire(
                            'Berhasil!',
                            'Status transaksi telah diperbarui.',
                            'success'
                        );
                    } else {
                        // Jika gagal, tampilkan SweetAlert dengan pesan error
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan dalam memperbarui status.',
                            'error'
                        );
                    }
                })
                .catch(error => {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan dalam memperbarui status.',
                        'error'
                    );
                    console.error('Error:', error);
                });
            }
        });
    }
</script>

<script>
    function showBuktiTF(imageUrl) {
        const modal = document.getElementById('buktiTFModal');
        const img = document.getElementById('buktiTFImage');
        img.src = imageUrl;
        modal.classList.remove('hidden');
    }

    function tutup() {
        const modal = document.getElementById('buktiTFModal');
        modal.classList.add('hidden');
    }
</script>
@endsection
