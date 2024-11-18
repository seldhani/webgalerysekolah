<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori'; // Sesuaikan nama tabel

    protected $fillable = [
        'id',
        'judul',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function galery()
    {
        return $this->hasMany(Galery::class, 'id');
    }

    public $timestamps = false;
}
