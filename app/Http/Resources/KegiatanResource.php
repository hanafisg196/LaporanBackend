<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KegiatanResource extends JsonResource
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
            'nagari_kunjungan' => $this->nagari_kunjungan,
            'kegiatan' => $this->kegiatan,
            'hasil' => $this->hasil,
            'langkah' => $this->langkah,
            'rekomendasi' => $this->rekomendasi,
        ];
    }
}
