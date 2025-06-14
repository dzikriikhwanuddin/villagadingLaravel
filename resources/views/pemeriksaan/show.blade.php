@extends('layouts.master')

@section('subtitle', 'Detail Pemeriksaan')
@section('content_header_title', 'Detail Pemeriksaan')
@section('content_body')
    <div class="card">
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">Kembali</a>
            <a href="{{ route('pemeriksaan.create', ['pasien_uuid' => $pemeriksaan->pasien_uuid]) }}" class="btn btn-primary mb-3 float-right">
            Tambah Pemeriksaan
        </a>

            <table class="table table-bordered">
                <tr>
                    <th>Tanggal Pemeriksaan</th>
                    <td>{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_pemeriksaan)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Keluhan</th>
                    <td>{{ $pemeriksaan->keluhan }}</td>
                </tr>
                <tr>
                    <th>Diagnosis</th>
                    <td>{{ $pemeriksaan->diagnosis }}</td>
                </tr>
                <tr>
                    <th>Tindakan</th>
                    <td>{{ $pemeriksaan->tindakan }}</td>
                </tr>
                <!-- <tr>
                    <th>Pemeriksa UUID</th>
                    <td>{{ $pemeriksaan->pemeriksa_uuid ?? '-' }}</td>
                </tr> -->
                <tr>
                    <th>Nama Pemeriksa</th>
                    <td>{{ $pemeriksaan->pemeriksa_name ?? '-' }}</td>
                </tr>
                <!-- <tr>
                    <th>Status Pemeriksaan</th>
                    <td>{{ ucfirst($pemeriksaan->pemeriksaan_status) ?? '-' }}</td>
                </tr> -->
                <!-- <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $pemeriksaan->created_at->format('d-m-Y H:i') }}</td>
                </tr> -->
                <!-- <tr>
                    <th>Terakhir Diperbarui</th>
                    <td>{{ $pemeriksaan->updated_at->format('d-m-Y H:i') }}</td>
                </tr> -->
            </table>
        </div>
    </div>
@stop
