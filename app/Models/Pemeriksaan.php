<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan';

    protected $fillable = ['pasien_uuid','pemeriksaan_uuid', 'tanggal_pemeriksaan', 'keluhan', 'diagnosis', 'tindakan','pemeriksa_uuid','pemeriksa_name','pemeriksaan_status'];


     public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_uuid', 'uuid');
    }
}
