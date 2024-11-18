<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galery;
use App\Models\Foto;
use App\Models\Kategori;
use App\Models\Post;
use App\Models\Petugas;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = [
                'total_galery' => Galery::count(),
                'total_foto' => Foto::count(),
                'total_kategori' => Kategori::count(),
                'total_post' => Post::count(),
                'total_petugas' => Petugas::count(),
                'latest_galeries' => Galery::take(5)->get(),
                'latest_fotos' => Foto::take(5)->get(),
                'latest_posts' => Post::take(5)->get(),
            ];
            
            return response()->json([
                'status' => true,
                'message' => 'Data dashboard berhasil diambil',
                'data' => $data
            ], Response::HTTP_OK);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data dashboard: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
