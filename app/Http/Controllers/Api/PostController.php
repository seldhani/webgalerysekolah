<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // API untuk mendapatkan semua post
    public function index()
    {
        $posts = Post::with('kategori')->get();

        return response()->json([
            'success' => true,
            'data' => $posts
        ], 200);
    }
    
    // API untuk membuat post baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'status' => 'required|integer',
            'map_link' => 'nullable|string'
        ]);

        $post = Post::create([
            'judul' => $validatedData['judul'],
            'isi' => $validatedData['isi'],
            'kategori_id' => $validatedData['kategori_id'],
            'petugas_id' => auth()->id(),
            'status' => $validatedData['status'],
            'map_link' => $validatedData['map_link'] ?? '',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post berhasil dibuat',
            'data' => $post
        ], 201);
    }

    // API untuk mendapatkan post tertentu berdasarkan ID
    public function show($kategori_id)
    {
        $posts = Post::with('kategori')
                    ->where('kategori_id', $kategori_id)
                    ->get();

        if ($posts->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada post untuk kategori ini'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $posts
        ], 200);
    }

    // API untuk memperbarui post
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'status' => 'required|integer',
            'map_link' => 'nullable|string'
        ]);

        $data = [
            'judul' => $validatedData['judul'],
            'isi' => $validatedData['isi'],
            'kategori_id' => $validatedData['kategori_id'],
            'status' => $validatedData['status'],
            'map_link' => $validatedData['map_link'] ?? ''
        ];

        $post->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Post berhasil diperbarui',
            'data' => $post
        ], 200);
    }

    // API untuk menghapus post
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $post = Post::findOrFail($id);
            $post->delete();

            DB::statement('SET @counter = 0');
            DB::statement('UPDATE posts SET id = @counter:=@counter+1');
            DB::statement('ALTER TABLE posts AUTO_INCREMENT = 1');

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Post berhasil dihapus'
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus post'
            ], 500);
        }
    }
}
