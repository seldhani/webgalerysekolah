<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galery;

class AgendaController extends Controller
{
    public function index()
    {
        $galery = Galery::with(['foto.posts'])->where('kategori', 'Agenda Sekolah')->get();
        
        // Debug info
        foreach($galery as $g) {
            foreach($g->foto as $f) {
                \Log::info('Foto ID: ' . $f->id . ', Post ID: ' . $f->post_id . ', Post: ', [
                    'post' => $f->posts
                ]);
            }
        }
        
        return view('agenda', compact('galery'));
    }
}
