<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\checkUserController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\pickRoleController;
use App\Http\Controllers\PerusahaanController;

Route::get('/searchLowongan', [LowonganController::class, 'index'])->name('search.lowongan');
Route::get('/searchPerusahaan', [PerusahaanController::class, 'index'])->name('search.perusahaan');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/pilihRole', [pickRoleController::class, 'index'])->name('pilihRole');
Route::post('/pilihRole', [pickRoleController::class, 'store'])->name('pickRole');

Route::get('/', function () {
    return view('homePage');
});
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/lowonganBisnis', function () {
    return view('lowonganBisnis');
})->name('lowonganBisnis');


Route::get('/aboutUs', function () {
    return view('aboutUs');
});

Route::get('/lowonganBisnis',[LowonganController::class, 'index'])->name('lowongan.index');
Route::get('/dashboardBusinesman',[LowonganController::class, 'create'])->name('lowongan.create');
Route::put('/dashboardBusinesman/{id}',[LowonganController::class, 'update'])->name('lowongan.update');
Route::post('/tambahLowongan',[LowonganController::class, 'store'])->name('tambah.lowongan');
Route::delete('/deleteLowongan/{id}',[LowonganController::class, 'destroy'])->name('lowongan.destroy');

Route::get('/manageProfilPerusahaanBusinesman',[PerusahaanController::class, 'manageProfil'])->name('manageProfile');
Route::put('/editProfilPerusahaanBusinesman',[PerusahaanController::class, 'editProfil'])->name('editProfile');
Route::get('/form', function () {
    return view('form.register-perusahaan');
});

Route::get('/pemilihanRole', function () {
    return view('form.pemilihanRole');
});

Route::get('/detailLowonganBisnis/{id}', [LowonganController::class,'show']);

Route::post('/perusahaan/store', [PerusahaanController::class, 'store'])->name('perusahaan.store');
Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan');

require __DIR__.'/auth.php';


Route::get('/editProfilePerusahaan', function () {
    return view('form.editProfilePerusahaan');
});

Route::get('/profileLowonganBisnis', function () {
    return view('profileLowonganBisnis');
});

Route::get('/editLowonganBisnis', function () {
    return view('form.editLowonganBisnis');
});

// Route::get('/manageLowongan', function () {
//     return view('tutupBukaLowonganBisnis');
// });

route::put('/updateLowonganStatus/{id}',[LowonganController::class,'updateLowonganStatus'])->name('updateLowonganStatus');
route::get('/manageLowongan',[LowonganController::class,'manageLowongan']);

Route::get('/listPermintaanBergabung', function () {
    return view('listPermintaanBergabung');
});

Route::get('/listUserBergabung', function () {
    return view('listUserBergabung');
});

Route::get('/profilePerusahaan/{id}',[PerusahaanController::class,'profilPerusahaan']);

Route::get('/tambahLowonganBisnis', function () {
    return view('form.tambahLowonganBisnis');
});


//Route API Lokasi
Route::get('/checkUser', [checkUserController::class, 'index'])->name('checkUser');
// Route::get('/wilayah', [checkUserController::class, 'index']);
// Route::post('/wilayah', [checkUserController::class, 'store']);
Route::get('/api/provinces', [LokasiController::class, 'getProvinces']);
Route::get('/api/regencies/{id}', [LokasiController::class, 'getRegencies']);
Route::get('/api/districts/{id}', [LokasiController::class, 'getDistricts']);
Route::get('/api/villages/{id}', [LokasiController::class, 'getVillages']);
Route::get('/wishlist', function () {
    return view('wishlist');
});

Route::get('/verifikasiLowongan', function () {
    return view('verifikasiLowongan');
});

Route::get('/listBisnisPartner', function () {
    return view('listBisnisPartner');
});

Route::get('/settingAkun', function () {
    return view('settingAkun');
});


