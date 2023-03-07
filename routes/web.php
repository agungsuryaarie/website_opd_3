<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HalamanController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\SlideshowController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\FiledownloadController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('galeri/tambah_foto', function () {
//     return view('admin.galeri.tambah_foto');
// });

// Route::get('/dashboard', function () {
//     return view('admin/dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard.index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/halaman', [HalamanController::class, 'index'])->name('halaman.index');
    Route::get('/halaman/create', [HalamanController::class, 'create'])->name('halaman.create');
    Route::post('/halaman/store', [HalamanController::class, 'store'])->name('halaman.store');
    Route::get('/halaman/{id}/edit', [HalamanController::class, 'edit'])->name('halaman.edit');
    Route::put('/halaman/{id}/update', [HalamanController::class, 'update'])->name('halaman.update');
    Route::delete('/halaman/{id}/destroy', [HalamanController::class, 'destroy'])->name('halaman.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::get('/layanan/create', [LayananController::class, 'create'])->name('layanan.create');
    Route::post('/layanan/store', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/{id}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
    Route::put('/layanan/{id}/update', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{id}/destroy', [LayananController::class, 'destroy'])->name('layanan.destroy');
});

Route::middleware('auth')->group(function () {
    // Route::resource('/berita', \App\Http\Controllers\Admin\BeritaController::class);
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}/update', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita}/destroy', [BeritaController::class, 'destroy'])->name('berita.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::post('/galeri/store', [GaleriController::class, 'store'])->name('galeri.store');
    Route::put('/galeri/{id}/update', [GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{id}/destroy', [GaleriController::class, 'destroy'])->name('galeri.destroy');
    Route::get('/galeri/foto/{id}', [GaleriController::class, 'tambah_foto'])->name('galeri.tambah_foto');
    Route::post('/foto/store/{id}', [GaleriController::class, 'foto_store'])->name('foto.store');
    Route::delete('/foto/destroy/{galeri_id}/{id}', [GaleriController::class, 'foto_destroy'])->name('foto.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/slideshow', [SLideshowController::class, 'index'])->name('slideshow.index');
    Route::post('/slideshow/store', [SLideshowController::class, 'store'])->name('slideshow.store');
    Route::put('/slideshow/{slideshow}/update', [SLideshowController::class, 'update'])->name('slideshow.update');
    Route::delete('/slideshow/{slideshow}/destroy', [SLideshowController::class, 'destroy'])->name('slideshow.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');
    Route::post('/banner/store', [BannerController::class, 'store'])->name('banner.store');
    Route::put('/banner/{banner}/update', [BannerController::class, 'update'])->name('banner.update');
    Route::delete('/banner/{banner}/destroy', [BannerController::class, 'destroy'])->name('banner.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/file-download', [FiledownloadController::class, 'index'])->name('file-download.index');
    Route::post('/file-download/store', [FiledownloadController::class, 'store'])->name('file-download.store');
    Route::put('/file-download/{filedownload}/update', [FiledownloadController::class, 'update'])->name('file-download.update');
    Route::delete('/file-download/{filedownload}/destroy', [FiledownloadController::class, 'destroy'])->name('file-download.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/link', [LinkController::class, 'index'])->name('link.index');
    Route::post('/link/store', [LinkController::class, 'store'])->name('link.store');
    Route::put('/link/{link}/update', [LinkController::class, 'update'])->name('link.update');
    Route::delete('/link/{link}/destroy', [LinkController::class, 'destroy'])->name('link.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/video', [VideoController::class, 'index'])->name('video.index');
    Route::get('/video/create', [VideoController::class, 'create'])->name('video.create');
    Route::post('/video/store', [VideoController::class, 'store'])->name('video.store');
    Route::get('/video/{id}/edit', [VideoController::class, 'edit'])->name('video.edit');
    Route::put('/video/{id}/update', [VideoController::class, 'update'])->name('video.update');
    Route::delete('/video/{id}/destroy', [VideoController::class, 'destroy'])->name('video.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::get('/setting/create', [SettingController::class, 'create'])->name('setting.create');
    Route::post('/setting/store', [SettingController::class, 'store'])->name('setting.store');
    Route::get('/setting/edit', [SettingController::class, 'edit'])->name('setting.edit');
    Route::put('/setting/{setting}/update', [SettingController::class, 'update'])->name('setting.update');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/front.php';
require __DIR__ . '/auth.php';
