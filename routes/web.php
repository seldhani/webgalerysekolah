<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HomeController;
use App\Models\Petugas;
use App\Models\Kategori;
use App\Models\Post;
use App\Models\Galery;



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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', [HomeController::class, 'index'])->name('welcome');// Panggil metode index dari HomeController

Route::get('/agenda', [HomeController::class, 'showAgenda'])->name('agenda');

Route::get('/informasi', [HomeController::class, 'showInformasi'])->name('informasi');

Route::get('/tentangkami', [HomeController::class, 'showTentangKami'])->name('tentangkami');

Route::get('/jurusan', [HomeController::class, 'showJurusan'])->name('jurusan');





Route::get('/login', [AuthController::class, 'formlogin'])->name('login')->middleware('guest'); // Menampilkan hal. login
Route::post('/login', [AuthController::class, 'login'])->middleware('guest'); // login



Route::middleware('auth')->group(function(){
    //Route dashboard
// routes/web.php



Route::get('/admin', function () {
    $petugas = Petugas::all(); // Ambil semua data petugas
    $kategori = Kategori::all(); // Ambil semua data kategori
    $post = Post::all(); // Ambil semua data post
    $galery = Galery::all(); // Ambil semua data post
    return view('admin.dashboard.index', [
        'title' => 'Dashboard',
        'petugas' => $petugas, // Kirim data petugas ke view
        'kategori' => $kategori, // Kirim data kategori ke view
        'posts' => $post, // Kirim data post ke view
        'galery' => $galery, // Kirim data post ke view
    ]);
});


Route::get('/users',[UserController::class, 'index']);
Route::get('/users/create',[UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']); // menyimpan data petugas


Route::get('/users/{id}/edit', [UserController::class, 'edit']); //  menampilkan form edit
Route::put('/users/{id}', [UserController::class, 'update']); // edit data
Route::delete('/users/{id}', [UserController::class, 'destroy']); // hapus data

Route::get('/logout', [AuthController::class, 'logout']); // logout

Route::resource('kategori', KategoriController::class);

Route::resource('posts', PostController::class);

Route::resource('galery', GaleryController::class);

Route::post('/foto/store', [FotoController::class, 'store']); // menyimpan data foto

Route::delete('/foto/{id}', [FotoController::class,'destroy']);



});
