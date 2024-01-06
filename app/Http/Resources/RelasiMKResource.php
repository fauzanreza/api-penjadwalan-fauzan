<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RelasiMKResource extends JsonResource
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
            'mata_kuliah_id' => $this->mata_kuliah_id,
            'mahasiswa_id' => $this->mahasiswa_id,
            'nama_matkul' => $this->mata_kuliah->nama_matkul,
            'nama_mhs' => $this->mahasiswa->nama_mhs,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}