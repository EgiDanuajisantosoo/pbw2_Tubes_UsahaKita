<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Inspiring;

// Command untuk memberikan quote inspiratif
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Mendaftarkan User Menggunakan console
Artisan::command('make:custom-filament-user', callback: function () {
    $this->call(\App\Console\Commands\MakeCustomFilamentUser::class);
})->purpose('Membuat custom user untuk Filament');
