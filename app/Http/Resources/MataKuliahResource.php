<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MataKuliahResource extends JsonResource
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
            'kode_matkul' => $this->kode_matkul,
            'nama_matkul' => $this->nama_matkul,
            'jumlah_sks' => $this->jumlah_sks,
            'tingkat' => $this->tingkat,
            'semester' => $this->semester,
            'deskripsi' => $this->deskripsi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
