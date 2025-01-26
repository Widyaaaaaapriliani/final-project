<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email'    => 'admin123@gmail.com',
            'name'     => 'AdminJi',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',  // Set role sebagai admin
            // Tambahkan kolom lain jika diperlukan, misalnya nama pengguna atau ID unik
        ]);
    }
}
