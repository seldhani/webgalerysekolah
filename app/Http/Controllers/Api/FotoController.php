<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foto;
use Illuminate\Http\Response;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $fotos = Foto::all();
            
            return response()->json([
                'status' => true,
                'message' => 'Data foto berhasil diambil',
                'data' => $fotos
            ], Response::HTTP_OK);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data foto: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $foto = Foto::findOrFail($id);
            
            return response()->json([
                'status' => true,
                'message' => 'Detail foto berhasil diambil',
                'data' => $foto
            ], Response::HTTP_OK);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Foto tidak ditemukan'
            ], Response::HTTP_NOT_FOUND);
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
