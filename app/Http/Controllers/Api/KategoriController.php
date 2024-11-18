<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Http\Response;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $kategoris = Kategori::all();
            
            return response()->json([
                'status' => true,
                'message' => 'Data kategori berhasil diambil',
                'data' => $kategoris
            ], Response::HTTP_OK);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data kategori: ' . $e->getMessage()
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
