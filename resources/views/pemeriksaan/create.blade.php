@extends('layouts.master')

@section('subtitle', 'Tambah Pemeriksaan')
@section('content_header_title', 'Tambah Pemeriksaan Pasien')

@section('content_body')
<div class="card">
    <div class="card-body">
        <a href="{{ route('dataPasien.show', $pasien->uuid) }}" class="btn btn-secondary mb-3">Kembali ke Detail Pasien</a>

        <form action="{{ route('pemeriksaan.store') }}" method="POST">
            @csrf

            <input type="hidden" name="pasien_uuid" value="{{ $pasien->uuid }}">

            <div class="form-group">
                <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                <input type="date" name="tanggal_pemeriksaan" id="tanggal_pemeriksaan" 
                       class="form-control @error('tanggal_pemeriksaan') is-invalid @enderror" 
                       value="{{ old('tanggal_pemeriksaan') }}" required>
                @error('tanggal_pemeriksaan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="keluhan">Keluhan</label>
                <textarea name="keluhan" id="keluhan" rows="3" 
                          class="form-control @error('keluhan') is-invalid @enderror" required>{{ old('keluhan') }}</textarea>
                @error('keluhan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="diagnosis">Diagnosis</label>
                <textarea name="diagnosis" id="diagnosis" rows="3" 
                          class="form-control @error('diagnosis') is-invalid @enderror" required>{{ old('diagnosis') }}</textarea>
                @error('diagnosis')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tindakan">Tindakan</label>
                <textarea name="tindakan" id="tindakan" rows="3" 
                          class="form-control @error('tindakan') is-invalid @enderror" required>{{ old('tindakan') }}</textarea>
                @error('tindakan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- <div class="form-group">
                <label for="tindakan">Subjek</label>
                <textarea name="tindakan" id="tindakan" rows="3" 
                          class="form-control @error('tindakan') is-invalid @enderror" required>{{ old('tindakan') }}</textarea>
                @error('tindakan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tindakan">Objek</label>
                <textarea name="tindakan" id="tindakan" rows="3" 
                          class="form-control @error('tindakan') is-invalid @enderror" required>{{ old('tindakan') }}</textarea>
                @error('tindakan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tindakan">assesment</label>
                <textarea name="tindakan" id="tindakan" rows="3" 
                          class="form-control @error('tindakan') is-invalid @enderror" required>{{ old('tindakan') }}</textarea>
                @error('tindakan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tindakan">plan</label>
                <textarea name="tindakan" id="tindakan" rows="3" 
                          class="form-control @error('tindakan') is-invalid @enderror" required>{{ old('tindakan') }}</textarea>
                @error('tindakan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div> -->

            {{-- Optional: Pemeriksa UUID --}}
            <!-- <div class="form-group">
                <label for="pemeriksa_uuid">UUID Pemeriksa (opsional)</label>
                <input type="text" name="pemeriksa_uuid" id="pemeriksa_uuid"
                       class="form-control @error('pemeriksa_uuid') is-invalid @enderror"
                       value="{{ old('pemeriksa_uuid') }}" placeholder="UUID Pemeriksa">
                @error('pemeriksa_uuid')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div> -->

            {{-- Optional: Nama Pemeriksa --}}
            <div class="form-group" hidden>
                <label for="pemeriksa_name">Nama Pemeriksa (opsional)</label>
                <input type="text" name="pemeriksa_name" id="pemeriksa_name"
                       class="form-control @error('pemeriksa_name') is-invalid @enderror"
                       value="{{ auth()->user()->name }}" placeholder="Nama Pemeriksa">
                @error('pemeriksa_name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Optional: Status Pemeriksaan --}}
            <!-- <div class="form-group">
                <label for="pemeriksaan_status">Status Pemeriksaan</label>
                <select name="pemeriksaan_status" id="pemeriksaan_status" class="form-control @error('pemeriksaan_status') is-invalid @enderror">
                    <option value="aktif" {{ old('pemeriksaan_status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="selesai" {{ old('pemeriksaan_status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="batal" {{ old('pemeriksaan_status') == 'batal' ? 'selected' : '' }}>Batal</option>
                </select>
                @error('pemeriksaan_status')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div> -->

            <button type="submit" class="btn btn-primary">Simpan Pemeriksaan</button>
        </form>
    </div>
</div>
@stop
