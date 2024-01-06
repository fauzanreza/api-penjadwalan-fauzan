<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosens';
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'nip',
        'kode_dosen',
        'nama_dosen',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'jabatan',
        'bidang',
        'nomor_telepon',
        'tanggal_mulai_kerja',
        'pendidikan_terakhir',
        'status',
    ];
}
