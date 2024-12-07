<?php

namespace App\Console\Commands;

use App\Models\User;  // Import model User
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;  // Import Hash untuk enkripsi password

class MakeCustomFilamentUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-custom-filament-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membuat custom user untuk Filament';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $namaDepan = $this->ask('Nama Depan');
        $namaBelakang = $this->ask('Nama Belakang');
        $email = $this->ask('Email');
        $role = $this->ask('Role');
        $password = $this->secret('Password');

        if (User::where('email', $email)->exists()) {
            $this->error('Email Telah Dipakai User Lain');
            return 1;
        }

        $user = User::create([
            'nama_depan' => $namaDepan,
            'nama_belakang' => $namaBelakang,
            'email' => $email,
            'role' => $role,
            'password' => Hash::make($password),
        ]);

        $this->info("Berhasil Menamabahkan {$user->email}");

        return 0;
    }
}
