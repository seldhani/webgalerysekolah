<?php

namespace App\Http\Controllers;
use App\Models\Petugas; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index() {
        $petugas = Petugas::all(); // Ambil semua data petugas
        return view('admin.manajemen-admin.index', [
            'title' => 'Manajemen Admin',
            'petugas' => $petugas // Kirim data ke view
        ]);
    }

    public function create() {
        return view('admin.manajemen-admin.create', [
            'title'=> 'Tambah Admin',
        ]);
    }

    public function store(Request $request) {
        // Validasi input
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|max:50',
            'password' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Petugas::create([
            'id' => $request->id,
            'username' => $request->name,
            'password' => Hash::make($request->password),  // Enkripsi password
        ]);

        return redirect('/users')->with('success', 'Petugas berhasil ditambahkan');
    }
    public function edit($id) {
        $petugas = Petugas::findOrFail($id);
        return view('admin.manajemen-admin.edit', compact('petugas'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:50',
            'password' => 'required|string|max:255',
        ]);

        $petugas = Petugas::findOrFail($id);
        $petugas->username = $request->name;
        $petugas->password = Hash::make($request->password);  // Kamu bisa menghapus ini jika ingin mengenkripsi password
        $petugas->save();

        return redirect('/users')->with('success', 'Petugas berhasil diperbarui');
    }

    public function destroy($id) {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return redirect('/users')->with('success', 'Petugas berhasil dihapus');
    }
}
