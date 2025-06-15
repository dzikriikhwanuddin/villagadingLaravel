@extends('layouts.master')

{{-- Customize layout sections --}}
@section('subtitle', 'Data Pasien')
@section('content_header_title', 'Data Pasien')
@section('content_header_subtitle', '')

{{-- Content body: main page content --}}
@section('content_body')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('dataPasien.create') }}" class="btn btn-primary">
                    Tambah Data Pasien
                </a>
            </div>

            <!-- <p>Login sebagai: <strong>{{ auth()->user()->name }}</strong></p> -->

            <table id="dataPasienTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No1</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataPasien as $index => $pasien)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pasien->nama }}</td>
                            <td>{{ $pasien->jenis_kelamin }}</td>
                            <td>{{ $pasien->tanggal_lahir }}</td>
                            <td>{{ $pasien->alamat }}</td>
                            <td>
                                <a href="{{ route('dataPasien.show', $pasien->uuid) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('dataPasien.edit', $pasien->uuid) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('dataPasien.destroy', $pasien->uuid) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus pasien ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

{{-- Push extra CSS --}}
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
@endpush

{{-- Push extra scripts --}}
@push('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataPasienTable').DataTable();
        });
    </script>
@endpush
