<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HalamanProfilController;
use App\Http\Controllers\LayananPublikController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\VideoController;



// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::get('/download', [DownloadController::class, 'index'])->name('download.index');
Route::get('/media/foto', [MediaController::class, 'index'])->name('media.index');
Route::get('/media/foto/detail/{id}', [MediaController::class, 'show'])->name('media.show');
Route::get('/media/video', [MediaController::class, 'video'])->name('media.video');
Route::get('/media/video/{video:slug}', [MediaController::class, 'showv'])->name('video.show');
Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post.show');
Route::get('/post_dinas', [PostController::class, 'dinas'])->name('post.dinas');
Route::get('/post_pemerintahan', [PostController::class, 'pemerintahan'])->name('post.pemerintahan');
Route::get('/post_umum', [PostController::class, 'umum'])->name('post.umum');
Route::get('/profil/{slug}', [HalamanProfilController::class, 'index'])->name('halamanprofil.index');
Route::get('/layanan/{slug}', [LayananPublikController::class, 'index'])->name('layananpublik.index');
