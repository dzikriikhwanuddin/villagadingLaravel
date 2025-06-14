<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';

    // Tambahkan field tambahan ke dalam $fillable
    protected $fillable = [
        'uuid',
        'nik',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'nomor_telepon',
        'foto_profil',
        'email',
        'status_pernikahan',
        'golongan_darah',
        'pekerjaan',
        'pasien_status'
    ];

    public function pemeriksaan()
    {
        return $this->hasMany(Pemeriksaan::class, 'pasien_uuid', 'uuid');
    }
}
