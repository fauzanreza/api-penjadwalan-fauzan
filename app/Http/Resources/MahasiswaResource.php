<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
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
            'nim' => $this->nim,
            'nama_mhs' => $this->nama_mhs,
            'alamat' => $this->alamat,
            'email' => $this->email,
            'no_telepon' => $this->no_telepon,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'kelas' => $this->kelas,
            'prodi_id' => $this->prodi_id,
            'nama_prodi' => $this->prodi->nama_prodi,
            'angkatan' => $this->angkatan,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
