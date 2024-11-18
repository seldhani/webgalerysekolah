<?php

// app/Http/Controllers/DashboardController.php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Kategori;
use App\Models\Post;
use App\Models\Galery;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all(); // Fetch all petugas data
        $kategori = Kategori::all(); // Fetch all kategori data
        $posts = Post::all(); // Fetch all posts
        $galery = Galery::all(); // Fetch all gallery items
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'petugas' => $petugas, // Pass data to view
            'kategori' => $kategori,
            'posts' => $posts,
            'galery' => $galery,
        ]);
    }
}

