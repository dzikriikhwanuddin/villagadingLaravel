<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DataPasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dataPasien = Pasien::all();
        return view('dataPasien', compact('dataPasien'));
    }

    public function create()
    {
        return view('dataPasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|digits:16|unique:pasien,nik',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'nullable|string',
            'nomor_telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:pasien,email',
            'status_pernikahan' => 'nullable|in:Belum Menikah,Menikah,Cerai',
            'golongan_darah' => 'nullable|in:A,B,AB,O',
            'pekerjaan' => 'nullable|string|max:100',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only([
            'nik',
            'nama',
            'jenis_kelamin',
            'tanggal_lahir',
            'alamat',
            'nomor_telepon',
            'email',
            'status_pernikahan',
            'golongan_darah',
            'pekerjaan',
        ]);

        $data['uuid'] = (string) Str::uuid();

        if (!Storage::disk('public')->exists('foto_profil')) {
            Storage::disk('public')->makeDirectory('foto_profil');
        }

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto_profil', $filename);
            $data['foto_profil'] = $filename;
        }

        Pasien::create($data);

        return redirect()->route('dataPasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit($uuid)
    {
        $pasien = Pasien::where('uuid', $uuid)->firstOrFail();
        return view('dataPasien.edit', compact('pasien'));
    }

    public function update(Request $request, $uuid)
    {
        $pasien = Pasien::where('uuid', $uuid)->firstOrFail();

        $request->validate([
            'nik' => 'required|digits:16|unique:pasien,nik,' . $pasien->id,
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'nullable|string',
            'nomor_telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:pasien,email,' . $pasien->id,
            'status_pernikahan' => 'nullable|in:Belum Menikah,Menikah,Cerai',
            'golongan_darah' => 'nullable|in:A,B,AB,O',
            'pekerjaan' => 'nullable|string|max:100',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pasien->nik = $request->nik;
        $pasien->nama = $request->nama;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->alamat = $request->alamat;
        $pasien->nomor_telepon = $request->nomor_telepon;
        $pasien->email = $request->email;
        $pasien->status_pernikahan = $request->status_pernikahan;
        $pasien->golongan_darah = $request->golongan_darah;
        $pasien->pekerjaan = $request->pekerjaan;

        if (!Storage::disk('public')->exists('foto_profil')) {
            Storage::disk('public')->makeDirectory('foto_profil');
        }

        if ($request->hasFile('foto_profil')) {
            if ($pasien->foto_profil && Storage::disk('public')->exists('foto_profil/' . $pasien->foto_profil)) {
                Storage::disk('public')->delete('foto_profil/' . $pasien->foto_profil);
            }
            $file = $request->file('foto_profil');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto_profil', $filename);
            $pasien->foto_profil = $filename;
        }

        $pasien->save();

        return redirect()->route('dataPasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function show($uuid)
    {
        $pasien = Pasien::where('uuid', $uuid)->with('pemeriksaan')->firstOrFail();
        return view('dataPasien.show', compact('pasien'));
    }
}
