<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\checkUserController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\pickRoleController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\profileUserController;





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



Route::get('/aboutUs', function () {
    return view('aboutUs');
});
Route::get('/listBisnisPartner', function () {
    return view('listBisnisPartner');
});

// Route::get('/settingAkun', function () {
//     return view('settingAkun');
// });

Route::get('/form', function () {
    return view('form.register-perusahaan');
});

Route::get('/pemilihanRole', function () {
    return view('form.pemilihanRole');
});

Route::get('/lowonganBisnis', function () {
    return view('lowonganBisnis');
})->name('lowonganBisnis');

Route::get('/editProfilePerusahaan', function () {
    return view('form.editProfilePerusahaan');
});

Route::get('/profileLowonganBisnis', function () {
    return view('profileLowonganBisnis');
});

Route::get('/editLowonganBisnis', function () {
    return view('form.editLowonganBisnis');
});

Route::get('/editProfileUser', function () {
    return view('editProfileUser');
});

Route::get('/verifikasimail', function () {
    return view('form.emailVerifikasi');
});

// Route::get('/listUserBergabung', function () {
//     return view('listUserBergabung');
// });

Route::get('/tambahLowonganBisnis', function () {
    return view('form.tambahLowonganBisnis');
});


Route::middleware('checkBisnisman')->group(function () {
    Route::get('/', function () {
        return view('homePage');
    });

    Route::get('/searchLowongan', [LowonganController::class, 'index'])->name('search.lowongan');
    Route::get('/searchPerusahaan', [PerusahaanController::class, 'index'])->name('search.perusahaan');

    Route::get('/profile/edit', [profileUserController::class, 'create'])->name('profileUser.create');
    Route::post('/profile/edit/{id}', [profileUserController::class, 'edit'])->name('profileUser.edit');
    Route::get('/profile/{id}', [profileUserController::class, 'index'])->name('profileUser.index');

    Route::get('/lowonganBisnis', [LowonganController::class, 'index'])->name('lowongan.index');
    Route::get('/dashboardBusinesman', [LowonganController::class, 'create'])->name('lowongan.create');
    Route::put('/dashboardBusinesman/{id}', [LowonganController::class, 'update'])->name('lowongan.update');
    Route::post('/tambahLowongan', [LowonganController::class, 'store'])->name('tambah.lowongan');
    Route::delete('/deleteLowongan/{id}', [LowonganController::class, 'destroy'])->name('lowongan.destroy');
    Route::get('/detailLowonganBisnis/{id}', [LowonganController::class, 'show']);
    route::put('/updateLowonganStatus/{id}', [LowonganController::class, 'updateLowonganStatus'])->name('updateLowonganStatus');
    route::get('/manageLowongan', [LowonganController::class, 'manageLowongan']);

    Route::get('/manageProfilPerusahaanBusinesman', [PerusahaanController::class, 'manageProfil'])->name('manageProfile');
    Route::put('/editProfilPerusahaanBusinesman/{id}', [PerusahaanController::class, 'editProfil'])->name('editProfile');
    Route::get('/listPermintaanBergabung', [PerusahaanController::class, 'listPermintaan'])->name('listPermintaan');
    Route::get('/profilePerusahaan/{id}', [PerusahaanController::class, 'profilPerusahaan']);
    });
    
    
Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan');
Route::post('/perusahaan/store', [PerusahaanController::class, 'store'])->name('perusahaan.store');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/pilihRole', [pickRoleController::class, 'index'])->name('pilihRole');
Route::post('/pilihRole', [pickRoleController::class, 'store'])->name('pickRole');



//ganti email
Route::get('/setting', [EmailController::class, 'setting'])->name('setting');
Route::get('/form/verif', [EmailController::class, 'showChangeEmailForm'])->name('form.verif');
Route::post('/email/change', [EmailController::class, 'changeEmail'])->name('ganti.email');
Route::post('/email/verify', [EmailController::class, 'verifyEmail'])->name('verif.email');
Route::get('/codeVerif', [EmailController::class, 'codeVerif'])->name('codeVerif');


Route::get('/checkUser', [checkUserController::class, 'index'])->name('checkUser');

Route::post('/wishlist/{id}', [LowonganController::class, 'wishlist'])->name('wishlist');
Route::get('/wishlist', [LowonganController::class, 'showWishlist'])->name('showWishlist');
Route::delete('/delete/wishlist/{id}', [LowonganController::class, 'deleteWishlist'])->name('delete.wishlist');

Route::get('/verifikasiLowongan', [VerifikasiController::class, 'index'])->name('verifikasiLowongan');
Route::post('/verifikasiLowongan/{id}', [VerifikasiController::class, 'store'])->name('verifikasiLowongan.Store');

Route::put('/terima/{id}', [VerifikasiController::class, 'terima'])->name('terimaUser');
Route::put('/tolak/{id}', [VerifikasiController::class, 'tolak'])->name('tolakUser');

Route::get('/listUserBergabung',[PerusahaanController::class, 'listUserBergabung'])->name('listUserBergabung');
Route::delete('/deleteLowongan/{id}',[LowonganController::class, 'deleteLowongan'])->name('deleteLowongan');

//Route API Lokasi
Route::get('/api/provinces', [LokasiController::class, 'getProvinces']);
Route::get('/api/regencies/{id}', [LokasiController::class, 'getRegencies']);
Route::get('/api/districts/{id}', [LokasiController::class, 'getDistricts']);
Route::get('/api/villages/{id}', [LokasiController::class, 'getVillages']);

require __DIR__ . '/auth.php';
