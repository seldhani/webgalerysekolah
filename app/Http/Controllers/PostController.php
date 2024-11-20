<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Import model Post
use App\Models\Kategori; // Import model Post
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        // Mengambil semua data posts dan melempar ke view
        $posts = Post::all();

        $kategori = Kategori::all();
        
        return view('admin.posts.index', [
            'title' => 'Unggahan',
            'posts' => $posts,
            'categories' => $kategori,
        ]);
    }
    
    public function create(){
        $kategori = Kategori::all();

        return view('admin.posts.create', [
            'categories' => $kategori,
            'title' => 'Buat Unggahan',
            
        ]);
    }

    public function store(Request $request){
        Post::create([
            'id'=>$request->id,
            'judul'=> $request->judul,
            'isi'=> $request->isi,
            'kategori_id'=> $request->kategori_id,
            'petugas_id' => auth()->id(),
            'status' => $request->status,
            'map_link' => '',
            'social_link' => $request->social_link ?: '', 
        ]);

        return redirect('/posts')->with('succees', 'Berhasil diunggah');
    }

    public function edit(Post $post)
{
    $categories = Kategori::all();
    return view('admin.posts.edit', [
        'title' => 'Edit Unggahan',
        'posts' => $post, // Pastikan nama variabel konsisten
        'categories' => $categories,
    ]);
}

public function update(Request $request, Post $post)
{
    
    $post->update([
        'judul' => $request->judul,
        'isi' => $request->isi,
        'kategori_id' => $request->kategori_id,
        'status' => $request->status,
        'map_link' => '',
        'social_link' => $request->social_link ?: '', 
    ]);

    $data = [
        'judul' => $request->judul,
        'isi' => $request->isi,
        'kategori_id' => $request->kategori_id,
        'status' => $request->status,
    ];

    // Jika map_link ada (tidak kosong), tambahkan ke data update
    if ($request->map_link) {
        $data['map_link'] = $request->map_link;
    }

    // Update post dengan data yang sudah disiapkan
    $post->update($data);

    // Redirect ke halaman posts dengan pesan sukses
    return redirect('/posts')->with('success', 'Unggahan berhasil diperbarui');
}


public function destroy($id)
{
    $posts = Post::find($id);
    if (!$posts) {
        return redirect('/posts')->with('error', 'Post tidak ditemukan');
    }

    $posts->delete();
    return redirect('/posts')->with('success', 'Unggahan berhasil dihapus');
}

}
