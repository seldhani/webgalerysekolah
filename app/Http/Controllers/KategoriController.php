<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'title' => 'Kategori',
            'categories' => Kategori::all(),
        ]);
    }

    public function create()
    {
        return view('admin.categories.create', [
            'title' => 'Tambah Kategori',
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'id' => 'required|string|max:11',  
            'judul' => 'required|string|max:225',
        ]);
    
        Kategori::create([
            'id' => $request->id,  // Sertakan id
            'judul' => $request->judul,
        ]);
    
        return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan');
    }
    

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.categories.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:225',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->judul = $request->judul;
        $kategori->save();

        return redirect('/kategori')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect('/kategori')->with('success', 'Kategori berhasil dihapus');
    }
}
