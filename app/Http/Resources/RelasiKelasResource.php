<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RelasiKelasResource extends JsonResource
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
            'dosen_id' => $this->dosen_id,
            'kelas_id' => $this->kelas_id,
            'mahasiswa_id' => $this->mahasiswa_id,
            'nama_dosen' => $this->dosen->nama_dosen,
            'nama_kelas' => $this->kelas->nama_kelas,
            'nama_mhs' => $this->mahasiswa->nama_mhs,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}