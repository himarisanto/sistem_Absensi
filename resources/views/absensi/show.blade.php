@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="text-align: center">Detail Absensi</h1>

    <table class="table table-bordered" style="max-width: 400px; margin: auto;">
        <tbody>
            <tr>
                <th style="width: 50%;">No Absen</th>
                <td style="width: 50%;">{{ $absensi->no_absen }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $absensi->nama }}</td>
            </tr>
            <tr>
                <th>Cabang</th>
                <td>{{ $absensi->cabang }}</td>
            </tr>
            <tr>
                <th>Posisi</th>
                <td>{{ $absensi->posisi }}</td>
            </tr>
        </tbody>
    </table>

    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('absensi.index') }}" class="btn btn-primary">Back</a>
    </div>
</div>
@endsection