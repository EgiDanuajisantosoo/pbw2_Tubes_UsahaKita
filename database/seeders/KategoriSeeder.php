<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\kategori_bisnis;
use App\Models\KategoriBisnis;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriBisnis::insert([
            ['nama_kategori' => 'Makanan dan Minuman'],
            ['nama_kategori' => 'Otomotif'],
            ['nama_kategori' => 'Toserba'],
            ['nama_kategori' => 'Alat Tulis'],
            ['nama_kategori' => 'Kecantikan dan Perawatan Diri'],
            ['nama_kategori' => 'Pakaian dan Aksesoris'],
            ['nama_kategori' => 'Peralatan Rumah Tangga'],
        ]);
    }
}
