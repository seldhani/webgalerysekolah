<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'kategori_id' => $this->kategori_id,
            'isi' => $this->isi,
            'petugas_id' => $this->petugas_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'map_link' => $this->map_link,
        ];
    }
}
