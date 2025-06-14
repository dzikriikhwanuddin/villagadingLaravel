@extends('layouts.master')

@section('subtitle', 'Edit Data Pasien')
@section('content_header_title', 'Edit Data Pasien')

@section('content_body')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dataPasien.update', $pasien->uuid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- <div class="form-group">
                    <label for="foto_profil">Foto Profil</label>
                    <input type="file" name="foto_profil" id="foto_profil" class="form-control-file @error('foto_profil') is-invalid @enderror">
                    @error('foto_profil')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror

                    @if ($pasien->foto_profil)
                        <div class="mt-2">
                            <strong>Foto saat ini:</strong><br>
                            <img src="{{ asset('storage/foto_profil/' . $pasien->foto_profil) }}" alt="Foto Profil" width="100" class="img-thumbnail">
                        </div>
                    @endif
                </div> -->

                <div class="form-group">
                    <label for="nama">Nama Pasien</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" 
                           value="{{ old('nama', $pasien->nama) }}" required>
                    @error('nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" 
                           value="{{ old('nik', $pasien->nik) }}" required>
                    @error('nik')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" 
                           class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                           value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}" required>
                    @error('tanggal_lahir')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" required>{{ old('alamat', $pasien->alamat) }}</textarea>
                    @error('alamat')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telepon">Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" 
                           value="{{ old('nomor_telepon', $pasien->nomor_telepon) }}" required>
                    @error('telepon')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email (Opsional)</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email', $pasien->email) }}">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" 
                           value="{{ old('pekerjaan', $pasien->pekerjaan) }}">
                    @error('pekerjaan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status_pernikahan">Status Pernikahan</label>
                    <select name="status_pernikahan" id="status_pernikahan" class="form-control @error('status_pernikahan') is-invalid @enderror">
                        <option value="">-- Pilih Status --</option>
                        <option value="Belum Menikah" {{ old('status_pernikahan', $pasien->status_pernikahan) == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                        <option value="Menikah" {{ old('status_pernikahan', $pasien->status_pernikahan) == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                        <option value="Cerai" {{ old('status_pernikahan', $pasien->status_pernikahan) == 'Cerai' ? 'selected' : '' }}>Cerai</option>
                    </select>
                    @error('status_pernikahan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gol_darah">Golongan Darah</label>
                    <select name="gol_darah" id="gol_darah" class="form-control @error('gol_darah') is-invalid @enderror">
                        <option value="">-- Pilih Golongan Darah --</option>
                        <option value="A" {{ old('gol_darah', $pasien->gol_darah) == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ old('gol_darah', $pasien->gol_darah) == 'B' ? 'selected' : '' }}>B</option>
                        <option value="AB" {{ old('gol_darah', $pasien->gol_darah) == 'AB' ? 'selected' : '' }}>AB</option>
                        <option value="O" {{ old('gol_darah', $pasien->gol_darah) == 'O' ? 'selected' : '' }}>O</option>
                    </select>
                    @error('gol_darah')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Update Data</button>
                <a href="{{ route('dataPasien.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@stop
