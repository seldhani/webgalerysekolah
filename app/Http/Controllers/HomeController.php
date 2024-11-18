<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galery;
use App\Models\Kategori;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $galery = Galery::with(['foto.posts'])
            ->where('position', '2')
            ->get();
        
        $guru = Galery::with(['foto.posts'])
            ->where('position', '4')
            ->get();
            
        return view('welcome', compact('galery', 'guru'));
    }

    public function showHero()
    {
        $galery = Galery::with('foto')->get(); 
        return view('welcome', compact('galery'));
    }
    
    public function showAgenda()
    {
        $kategori = Kategori::where('judul', 'Agenda Sekolah')->first();
        $galery = collect();
        $guru = Galery::with(['foto.posts'])
            ->where('position', '4')
            ->get();

        if ($kategori) {
            $galery = Galery::with('foto')
                ->where('position', $kategori->id)
                ->get();
        }

        return view('agenda', compact('galery', 'guru'));
    }

    public function showInformasi()
    {
        $galery = Galery::with(['foto.posts'])
            ->where('position', '1')
            ->get();
        
        $guru = Galery::with(['foto.posts'])
            ->where('position', '4')
            ->get();
        
        return view('informasi', compact('galery', 'guru'));
    }

    public function showTentangKami()
    {
        $post = Post::where('kategori_id', '5')->first(); 
        $guru = Galery::with(['foto.posts'])
            ->where('position', '4')  // Ambil data galeri untuk guru
            ->get(); 
    
        $galery = Galery::with('foto')->where('position', '2')->get();  // Contoh query untuk galery
        $postsWithKategori5 = Post::where('kategori_id', '5')->get();  // Mengambil semua posts dengan kategori_id 5
        $postsWithKategori6 = Post::where('kategori_id', '6')->get();  // Mengambil semua posts dengan kategori_id 6
    
        return view('tentangkami', compact('post', 'guru', 'galery', 'postsWithKategori5', 'postsWithKategori6'));  // Kirim semua data ke view
    }
    

    


}   
