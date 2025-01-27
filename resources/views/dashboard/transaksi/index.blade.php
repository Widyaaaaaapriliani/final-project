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
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Pelanggan</th>
                        <th class="px-6 py-3 text-left">Produk</th>
                        <th class="px-6 py-3 text-left">Jumlah</th>
                        <th class="px-6 py-3 text-left">Harga</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Tanggal Transaksi</th>
                        <th class="px-6 py-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($transaksi as $transaksi)
                        <tr class="border-b hover:bg-slate-50 transition-all duration-300">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $transaksi->pelanggan->name ?? 'Nama Tidak Ditemukan' }}</td>
                            <td class="px-6 py-4">{{ $transaksi->produk->nama ?? 'Produk Tidak Ditemukan' }}</td>
                            <td class="px-6 py-4">{{ $transaksi->jumlah }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($transaksi->harga_total, 2) }}</td>
                            <td class="px-6 py-4">
                                <select class="status-dropdown text-green-800 hover:bg-indigo-100 focus:outline-none rounded-lg shadow-sm" data-id="{{ $transaksi->id_transaksi }}" onchange="updateStatus(this)">
                                    <option value="pending" {{ $transaksi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="dikemas" {{ $transaksi->status == 'dikemas' ? 'selected' : '' }}>Dikemas</option>
                                    <option value="dikirim" {{ $transaksi->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                    <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                            </td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4">
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
@endsection
