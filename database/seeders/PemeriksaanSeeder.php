<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use Illuminate\Support\Str;

class PemeriksaanSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua pasien
        $pasienList = Pasien::all();

        foreach ($pasienList as $pasien) {
            // Buat 2 pemeriksaan untuk tiap pasien sebagai contoh
            for ($i = 1; $i <= 2; $i++) {
                Pemeriksaan::create([
                    'pasien_uuid' => $pasien->uuid,
                    'pemeriksaan_uuid' => (string) Str::uuid(),
                    'tanggal_pemeriksaan' => now()->subDays(rand(1, 100)),
                    'keluhan' => 'Keluhan contoh ke-' . $i,
                    'diagnosis' => 'Diagnosis contoh ke-' . $i,
                    'tindakan' => 'Tindakan contoh ke-' . $i,
                    'pemeriksa_uuid' => (string) Str::uuid(), // contoh UUID pemeriksa
                    'pemeriksa_name' => 'Dr. Contoh Pemeriksa ' . $i,
                    'pemeriksaan_status' => 1, 
                ]);
            }
        }
    }
}
