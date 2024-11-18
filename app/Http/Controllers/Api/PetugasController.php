<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Petugas;
use Illuminate\Http\Response;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $petugas = Petugas::all();
            
            return response()->json([
                'status' => true,
                'message' => 'Data petugas berhasil diambil',
                'data' => $petugas
            ], Response::HTTP_OK);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data petugas: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $petugas = Petugas::findOrFail($id);
            
            return response()->json([
                'status' => true,
                'message' => 'Detail petugas berhasil diambil',
                'data' => $petugas
            ], Response::HTTP_OK);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Petugas tidak ditemukan'
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
