<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $table      = 'kategori_produk';  // Nama tabel kategori
    protected $primaryKey = 'id';
    public $timestamps    = false;

    protected $fillable = [
        'id',
        'nama',
        'deskripsi',
        'path_img'
    ];

    // Relasi one-to-many dengan produk
    public function products()
    {
        return $this->hasMany(Product::class, 'kategori_id', 'id');
    }
}
