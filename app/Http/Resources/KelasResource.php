<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KelasResource extends JsonResource
{
     /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'prodi_id' => $this->prodi_id,
            'nama_kelas' => $this->nama_kelas,
            'angkatan' => $this->angkatan,
            'nama_prodi' => $this->prodi->nama_prodi, // Assuming there's a 'prodi' relation in your Kelas model
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}