@extends('layouts.master')

{{-- Customize layout sections --}}
@section('subtitle', 'Detail Pasien')
@section('content_header_title', 'Detail Pasien')
@section('content_header_subtitle', '')

{{-- Content body --}}
@section('content_body')
<div class="card">
    <div class="card-body">
        <a href="{{ route('dataPasien.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        <!-- <div class="row mb-3">
            @if ($pasien->foto_profil && file_exists(storage_path('app/public/foto_profil/' . $pasien->foto_profil)))
                <div class="col-auto">
                    <img src="{{ asset('storage/foto_profil/' . $pasien->foto_profil) }}" 
                         alt="Foto Profil" width="150" class="rounded border">
                </div>
            @else
                <div class="col-auto">
                    <img src="{{ asset('assets/images/default-avatar.png') }}" 
                         alt="Foto Profil Default" width="150" class="rounded border">
                </div>
            @endif
        </div> -->

        <table class="table table-bordered">
            <tr>
                <th>Nama Pasien</th>
                <td>{{ $pasien->nama }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>{{ $pasien->nik ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $pasien->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>No. HP</th>
                <td>{{ $pasien->nomor_telepon ?? '-' }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $pasien->email ?? '-' }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $pasien->alamat }}</td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <td>{{ $pasien->pekerjaan }}</td>
            </tr>
        </table>

    </div>
</div>

<div class="card mt-4">
    <div class="card-header d-flex align-items-center">
        <h5 class="mb-0">Riwayat Pemeriksaan</h5>
        <a href="{{ route('pemeriksaan.create', ['pasien_uuid' => $pasien->uuid]) }}" class="btn btn-primary btn-sm ml-auto">
            Tambah Pemeriksaan
        </a>
    </div>

    <div class="card-body">
        @if($pasien->pemeriksaan->isEmpty())
            <p><em>Tidak ada data pemeriksaan.</em></p>
        @else
            <div class="table-responsive">
                <table id="tabelPemeriksaan" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Keluhan</th>
                            <th>Diagnosis</th>
                            <th>Pemeriksa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pasien->pemeriksaan as $index => $pemeriksaan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_pemeriksaan)->format('d-m-Y') }}</td>
                            <td>{{ $pemeriksaan->keluhan }}</td>
                            <td>{{ $pemeriksaan->diagnosis }}</td>
                            <td>{{ $pemeriksaan->pemeriksa_name }}</td>
                            <td>
                                <a href="{{ route('pemeriksaan.show', ['uuid' => $pemeriksaan->pemeriksaan_uuid]) }}" class="btn btn-info btn-sm">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@stop

{{-- Push extra CSS --}}
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
@endpush

{{-- Push extra JS --}}
@push('js')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tabelPemeriksaan').DataTable({
            pageLength: 5,
    lengthMenu: [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"] ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
    }
        });
    });
</script>
@endpush
