<?php
namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PemeriksaanController extends Controller
{
    public function create(Request $request)
    {
        // Ambil pasien berdasarkan uuid
        $pasien = Pasien::where('uuid', $request->pasien_uuid)->firstOrFail();

        return view('pemeriksaan.create', compact('pasien'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_uuid' => 'required|exists:pasien,uuid',
            'tanggal_pemeriksaan' => 'required|date',
            'keluhan' => 'required|string',
            'diagnosis' => 'required|string',
            'tindakan' => 'required|string',
            'pemeriksa_uuid' => 'nullable|uuid',
            'pemeriksa_name' => 'nullable|string|max:255',
            'pemeriksaan_status' => 'nullable|string|max:50',
        ]);

        Pemeriksaan::create([
            'pasien_uuid' => $request->pasien_uuid,
            'pemeriksaan_uuid' => (string) Str::uuid(), // generate UUID baru
            'tanggal_pemeriksaan' => $request->tanggal_pemeriksaan,
            'keluhan' => $request->keluhan,
            'diagnosis' => $request->diagnosis,
            'tindakan' => $request->tindakan,
            'pemeriksa_uuid' => $request->pemeriksa_uuid ?? null,
            'pemeriksa_name' => $request->pemeriksa_name ?? null,
            'pemeriksaan_status' => $request->pemeriksaan_status ?? 1, // default status aktif
        ]);

        return redirect()->route('dataPasien.show', $request->pasien_uuid)
                         ->with('success', 'Data pemeriksaan berhasil ditambahkan.');
    }

    public function show($pemeriksaan_uuid)
    {
        $pemeriksaan = Pemeriksaan::where('pemeriksaan_uuid', $pemeriksaan_uuid)->firstOrFail();

        return view('pemeriksaan.show', compact('pemeriksaan'));
    }
}
