<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GaleryController;
use App\Http\Controllers\Api\FotoController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\PetugasController;
use App\Http\Controllers\Api\DashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('petugas', PetugasController::class);
Route::get('/dashboard', [DashboardController::class, 'index']);



Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/kategori/{kategori_id}', [PostController::class, 'show']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);



Route::prefix('home')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/hero', [HomeController::class, 'showHero']);
    Route::get('/agenda', [HomeController::class, 'showAgenda']);
    Route::get('/informasi', [HomeController::class, 'showInformasi']);
    Route::get('/tentang-kami', [HomeController::class, 'showTentangKami']);
});


Route::prefix('foto')->group(function () {
    Route::get('/', [FotoController::class, 'index']);
    Route::post('/', [FotoController::class, 'store']);    // Untuk menyimpan foto
    Route::delete('/{id}', [FotoController::class, 'destroy']); // Untuk menghapus foto berdasarkan ID
});



Route::prefix('galeries')->group(function () {
    Route::get('/', [GaleryController::class, 'index']);      // Menampilkan semua galeri
    Route::post('/', [GaleryController::class, 'store']);     // Menyimpan galeri baru
    Route::get('/{id}', [GaleryController::class, 'show']);   // Menampilkan galeri berdasarkan ID
    Route::put('/{id}', [GaleryController::class, 'update']); // Mengupdate galeri berdasarkan ID
    Route::delete('/{id}', [GaleryController::class, 'destroy']); // Menghapus galeri berdasarkan ID
});
