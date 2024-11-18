<?php

namespace App\Http\Controllers;
use App\Models\Galery;
use App\Models\Post;
use Illuminate\Http\Request;

class GaleryController extends Controller
{


    public function index()
    {
        $galeries = Galery::with('posts')->get(); // Ini mengambil galery beserta post

        return view('admin.galery.index', [
            'title' => 'Galery',
            'galeries' => $galeries, // Menggunakan variabel ini di view
        ]);
    }


    public function create()
    {
        $posts = Post::all();
        return view('admin.galery.create', [
            'title' => 'Tambah Galeri Foto',
            'posts' => $posts // Pastikan ini ada
        ]);
    }

    public function store(Request $request)
    {
        Galery::create([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => (int) $request->status, // Pastikan status di-cast menjadi integer
        ]);

        return redirect('/galery')->with('success', 'Galery berhasil ditambahkan');
    }

    public function edit(Galery $galery)
    {
        $posts = Post::all();

        return view('admin.galery.edit', [
            'title' => 'Edit Galery',
            'galery' => $galery, // Perbaiki dari 'galeries' ke 'galery'
            'posts' => $posts,
        ]);
    }


    public function update(Request $request, Galery $galery)
    {
        $galery->update([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => (int) $request->status, // Pastikan status di-cast menjadi integer
        ]);

        return redirect('/galery')->with('success', 'Galery berhasil diperbarui');
    }


    public function destroy($id)
    {
        $galery = Galery::findOrFail($id);
        $galery->delete();

        return redirect('/galery')->with('success', 'Galery berhasil dihapus');
    }
    public function show($id)
    {
        $galery = Galery::with('posts', 'foto')->findOrFail($id);
        return view('admin.galery.show', compact('galery'));
    }
    



}
