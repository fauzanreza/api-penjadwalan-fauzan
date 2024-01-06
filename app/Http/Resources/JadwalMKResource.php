<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JadwalMKResource extends JsonResource
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
            'nama_mata_kuliah' => $this->mata_kuliah->nama_matkul, // Include nama mata kuliah
            'dosen_id' => $this->dosen_id,
            'nama_dosen' => $this->dosen->nama_dosen, // Include nama dosen
            'kelas_id' => $this->kelas_id,
            'nama_kelas' => $this->kelas->nama_kelas, // Include nama kelas
            'hari' => $this->hari,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'ruangan' => $this->ruangan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}