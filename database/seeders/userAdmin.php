<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class userAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('12345678');
        User::insert([
            'nama_depan' => 'Admin',
            'nama_belakang' => 'Kita',
            'email' => 'admin@gmail.com',
            'password' => $password,
            'role_id' => '1',
        ]);
    }
}
