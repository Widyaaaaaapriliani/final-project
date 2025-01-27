<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table      = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_pelanggan',
        'jumlah',
        'id_produk',
        'harga_total',
        'status',
        'bukti_tf',
        'tanggal_transaksi'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'id_pelanggan', 'id');
    }

    /**
     * Relasi ke Product (Produk).
     * Setiap transaksi memiliki satu produk.
     */
    public function produk()
    {
        return $this->belongsTo(Product::class, 'id_produk', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk');  // Sesuaikan nama kolom foreign key
    }

    // Relasi ke pelanggan
}
