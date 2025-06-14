@extends('layouts.master')

@section('subtitle', 'Tambah Data Pasien')
@section('content_header_title', 'Tambah Data Pasien')
@section('content_header_subtitle', '')

@section('content_body')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dataPasien.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- <div class="form-group">
                    <label for="foto_profil">Foto Profil</label>
                    <input type="file" name="foto_profil" id="foto_profil" class="form-control @error('foto_profil') is-invalid @enderror">
                    @error('foto_profil')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div> -->

                <div class="form-group">
                    <label for="nama">Nama Pasien</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" required>
                    @error('nik')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                    @error('tanggal_lahir')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" required>
                    @error('nomor_telepon')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email (Opsional)</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}">
                    @error('pekerjaan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status_pernikahan">Status Pernikahan</label>
                    <select class="form-control @error('status_pernikahan') is-invalid @enderror" id="status_pernikahan" name="status_pernikahan">
                        <option value="">-- Pilih Status --</option>
                        <option value="Belum Menikah" {{ old('status_pernikahan') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                        <option value="Menikah" {{ old('status_pernikahan') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                        <option value="Cerai" {{ old('status_pernikahan') == 'Cerai' ? 'selected' : '' }}>Cerai</option>
                    </select>
                    @error('status_pernikahan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gol_darah">Golongan Darah</label>
                    <select class="form-control @error('gol_darah') is-invalid @enderror" id="gol_darah" name="gol_darah">
                        <option value="">-- Pilih Golongan Darah --</option>
                        <option value="A" {{ old('gol_darah') == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ old('gol_darah') == 'B' ? 'selected' : '' }}>B</option>
                        <option value="AB" {{ old('gol_darah') == 'AB' ? 'selected' : '' }}>AB</option>
                        <option value="O" {{ old('gol_darah') == 'O' ? 'selected' : '' }}>O</option>
                    </select>
                    @error('gol_darah')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('dataPasien.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@stop
