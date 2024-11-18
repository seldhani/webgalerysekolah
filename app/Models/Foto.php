<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'foto'; 
    protected $fillable = [
        'id',
        'galery_id',
        'file',
        'judul',
        'post_id',
    ];

    public function galery()
{
    return $this->belongsTo(Galery::class, 'galery_id', 'id');
}

    public function posts()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public $timestamps = false;
}
