<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            
        return response()->json([
            'galery' => $galery,
            'guru' => $guru
        ]);
    }

    public function showHero()
    {
        $galery = Galery::with('foto')->get(); 
        return response()->json([
            'galery' => $galery
        ]);
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

        return response()->json([
            'galery' => $galery,
            'guru' => $guru
        ]);
    }

    public function showInformasi()
    {
        $galery = Galery::with(['foto.posts'])
            ->where('position', '1')
            ->get();
        
        $guru = Galery::with(['foto.posts'])
            ->where('position', '4')
            ->get();
        
        return response()->json([
            'galery' => $galery,
            'guru' => $guru
        ]);
    }

    public function showTentangKami()
    {
        $post = Post::where('kategori_id', '5')->first();
        $guru = Galery::with(['foto.posts'])
            ->where('position', '4')
            ->get(); 

        $galery = Galery::with('foto')
            ->where('position', '2')
            ->get();

        return response()->json([
            'post' => $post,
            'guru' => $guru,
            'galery' => $galery
        ]);
    }
}
