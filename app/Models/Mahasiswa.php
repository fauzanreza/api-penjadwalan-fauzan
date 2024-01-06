<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mahasiswas";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'nim',
        'nama_mhs',
        'alamat',
        'email',
        'no_telepon',
        'tanggal_lahir',
        'jenis_kelamin',
        'kelas',
        'prodi_id',
        'angkatan',
        'status',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
