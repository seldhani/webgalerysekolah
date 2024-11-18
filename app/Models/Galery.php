<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Galery extends Model
{
    use HasApiTokens,HasFactory;

    protected $table = 'galery'; 
    protected $fillable = [
        'post_id',
        'position',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'post_id', 'id'); // Adjust if 'post_id' is different
    }
    

    public function posts(){
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function foto(){
        return $this->hasMany(Foto::class, 'galery_id', 'id');
    }

    const UPDATED_AT = null;
    public $timestamps = false; 
}
