<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMK extends Model
{
    use HasFactory;

    protected $table = "jadwal_m_k_s";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'mata_kuliah_id',
        'dosen_id',
        'kelas_id',
        'hari',
        'waktu_mulai',
        'waktu_selesai',
        'ruangan',
    ];

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
