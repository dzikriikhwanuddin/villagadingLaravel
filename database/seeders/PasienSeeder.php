<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pasien;
use Illuminate\Support\Str;

class PasienSeeder extends Seeder
{
    public function run()
    {
        Pasien::insert([
            [
                'uuid' => (string) Str::uuid(),
                'nik' => '3201123456789012',
                'nama' => 'Ahmad Fauzi',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '1990-05-15',
                'alamat' => 'Jl. Merdeka No.123, Bandung',
                'nomor_telepon' => '081234567890',
                'pekerjaan' => '-',
                'email' => 'ahmad.fauzi@example.com',
                'status_pernikahan' => 'Menikah',
                'golongan_darah' => 'O',
                'foto_profil' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'pasien_status'=>1
            ],
            [
                'uuid' => (string) Str::uuid(),
                'nik' => '3202123456789013',
                'nama' => 'Siti Aminah',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '1985-08-22',
                'alamat' => 'Jl. Melati Raya, Jakarta',
                'nomor_telepon' => '081298765432',
                'pekerjaan' => '-',
                'email' => 'siti.aminah@example.com',
                'status_pernikahan' => 'Belum Menikah',
                'golongan_darah' => 'A',
                'foto_profil' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'pasien_status'=>1
            ],
        ]);
    }
}
