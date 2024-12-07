<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Inspiring;

// Command untuk memberikan quote inspiratif
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Command custom untuk Filament
Artisan::command('make:custom-filament-user', function () {
    $this->info('Custom Filament User Command Executed.');
})->purpose('Membuat custom user untuk Filament');

// Mendaftarkan command berbasis class
Artisan::command('make:custom-filament-user', function () {
    $this->call(\App\Console\Commands\MakeCustomFilamentUser::class);
})->purpose('Membuat custom user untuk Filament');
