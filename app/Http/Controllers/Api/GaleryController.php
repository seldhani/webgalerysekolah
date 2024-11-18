<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galery;
use App\Models\Post;
use Illuminate\Http\Response;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $galeries = Galery::with('posts')->get();
            
            return response()->json([
                'status' => true,
                'message' => 'Data galeri berhasil diambil',
                'data' => $galeries
            ], Response::HTTP_OK);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data galeri: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = validator($request->all(), [
                'post_id' => 'required|exists:posts,id',
                'position' => 'required|string',
                'status' => 'required|boolean'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], Response::HTTP_BAD_REQUEST);
            }

            $galery = Galery::create($request->all());
            $galery->load('posts');

            return response()->json([
                'status' => true,
                'message' => 'Galeri berhasil ditambahkan',
                'data' => $galery
            ], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan galeri: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $galery = Galery::with(['posts', 'foto'])->findOrFail($id);
            
            return response()->json([
                'status' => true,
                'message' => 'Detail galeri berhasil diambil',
                'data' => $galery
            ], Response::HTTP_OK);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Galeri tidak ditemukan'
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Validasi input
            $validator = validator($request->all(), [
                'post_id' => 'required|exists:posts,id',
                'position' => 'required|numeric',
                'status' => 'required|boolean'
            ], [
                'post_id.required' => 'Post ID wajib diisi',
                'post_id.exists' => 'Post tidak ditemukan',
                'position.required' => 'Posisi wajib diisi',
                'position.numeric' => 'Posisi harus berupa angka',
                'status.required' => 'Status wajib diisi',
                'status.boolean' => 'Status harus berupa boolean (true/false)'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], Response::HTTP_BAD_REQUEST);
            }

            // Cari data galeri
            $galery = Galery::find($id);
            
            if (!$galery) {
                return response()->json([
                    'status' => false,
                    'message' => 'Galeri tidak ditemukan'
                ], Response::HTTP_NOT_FOUND);
            }

            // Update data
            $galery->update([
                'post_id' => $request->post_id,
                'position' => $request->position,
                'status' => $request->status
            ]);

            // Load relasi posts
            $galery->load('posts');

            return response()->json([
                'status' => true,
                'message' => 'Galeri berhasil diperbarui',
                'data' => $galery
            ], Response::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui galeri: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Cari data galeri
            $galery = Galery::find($id);
            
            if (!$galery) {
                return response()->json([
                    'status' => false,
                    'message' => 'Galeri tidak ditemukan'
                ], Response::HTTP_NOT_FOUND);
            }

            // Hapus data
            $galery->delete();

            return response()->json([
                'status' => true,
                'message' => 'Galeri berhasil dihapus'
            ], Response::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus galeri: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
