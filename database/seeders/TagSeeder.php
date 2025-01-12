<?php

namespace Database\Seeders;

use App\Models\TagSpesifikasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TagSpesifikasi::insert([
            ['nama_tag' => 'Pengalaman 1-3 tahun'],
            ['nama_tag' => 'Pengalaman >5 tahun'],
            ['nama_tag' => 'Tanggung Jawab'],
            ['nama_tag' => 'Kepemimpinan'],
            ['nama_tag' => 'Disiplin'],
            ['nama_tag' => 'komunikasi'],
            ['nama_tag' => 'Pemecah Masalah'],
            ['nama_tag' => 'Kerja Sama'],
            ['nama_tag' => 'Mengelola Keuangan'],
            ['nama_tag' => 'Jujur'],
        ]);
    }
}
