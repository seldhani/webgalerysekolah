<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FotoResource extends JsonResource
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
            'galery_id' => $this->galery_id,
            'file' => $this->file,
            'judul' => $this->judul,
            'post_id' => $this->post_id,
        ];
    }
}
