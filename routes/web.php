<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KegiatanSelesaiController;
use App\Http\Controllers\KenapaController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/tentang-kami', [HomeController::class, 'tentang']);
Route::get('/tentang-kami/sejarah', [HomeController::class, 'sejarah']);
Route::get('/tentang-kami/pengurus', [HomeController::class, 'organisasi']);
Route::get('/berita-dan-kegiatan', [HomeController::class, 'beritakegiatan']);
Route::get('/detail-berita/{id}', [HomeController::class, 'berita'])->name('beranda.detail.berita');
Route::get('/detail-kegiatan/{id}', [HomeController::class, 'kegiatan'])->name('beranda.detail.kegiatan');
Route::post('/send-mail', [ContactController::class, 'sendEmail'])->name('email.send');
Route::post('/fest', [ContactController::class, 'sendEmail'])->name('hipmi.fest');


Route::get('/kontak', [HomeController::class, 'kontak']);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::resource('beranda', BerandaController::class);
    // Route::get('beranda-data', [BerandaController::class, 'getData'])->name('beranda.data');
    Route::get('/dashboard', [BerandaController::class, 'createOrEdit'])->name('beranda.form');
    Route::post('/beranda/save', [BerandaController::class, 'storeOrUpdate'])->name('beranda.save');
    Route::resource('kenapa', KenapaController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::resource('pengurus', PengurusController::class);
    Route::resource('kategori-berita', KategoriBeritaController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('kegiatan-selesai', KegiatanSelesaiController::class);
});



require __DIR__ . '/auth.php';
