<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_produk')->insert([
            [
                'id'        => 1,
                'nama'      => 'Perikanan',
                'deskripsi' => 'Produk hasil laut dan budidaya ikan seperti ikan segar, udang, dan rumput laut.',
                'path_img'  => 'https://images.unsplash.com/photo-1690379718150-2c721c4de868?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGZpc2hlcnl8ZW58MHx8MHx8fDA%3D',
            ],
            [
                'id'        => 2,
                'nama'      => 'Perkebunan',
                'deskripsi' => 'Produk hasil perkebunan seperti kopi, teh, kelapa sawit, dan cokelat.',
                'path_img'  => 'https://images.unsplash.com/photo-1433704334812-6c45b0b8784d?q=80&w=2074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'id'        => 3,
                'nama'      => 'Pertanian',
                'deskripsi' => 'Produk hasil pertanian seperti padi, jagung, sayuran, dan buah-buahan.',
                'path_img'  => 'https://plus.unsplash.com/premium_photo-1661854008793-8ce54b2e622b?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            [
                'id'        => 4,
                'nama'      => 'Peternakan',
                'deskripsi' => 'Produk hasil peternakan seperti daging sapi, ayam, telur, dan susu.',
                'path_img'  => 'https://images.unsplash.com/photo-1511117833895-4b473c0b85d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
        ]);
    }
}
