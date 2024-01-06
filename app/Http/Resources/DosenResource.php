<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DosenResource extends JsonResource
{
    /**
     * Transform the resource into an arrays.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nip' => $this->nip,
            'kode_dosen' => $this->kode_dosen,
            'nama_dosen' => $this->nama_dosen,
            'alamat' => $this->alamat,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'email' => $this->email,
            'jabatan' => $this->jabatan,
            'bidang' => $this->bidang,
            'nomor_telepon' => $this->nomor_telepon,
            'tanggal_mulai_kerja' => $this->tanggal_mulai_kerja,
            'pendidikan_terakhir' => $this->pendidikan_terakhir,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
