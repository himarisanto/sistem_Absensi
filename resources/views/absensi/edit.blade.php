@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <div class="card">
                <div class="card-header">
                    <h1 style="text-align: center">Edit Absensi</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('absensi.update', ['id' => $absensi->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="no_absen">No Absen:</label>
                            <input type="text" name="no_absen" value="{{ $absensi->no_absen }}" class="form-control"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" value="{{ $absensi->nama }}" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="cabang">Cabang:</label>
                            <select class="form-control" name="cabang" required>
                                <option value="">Edit Cabang</option>
                                <option value="CARfix Pekalongan">CARfix Pekalongan</option>
                                <option value="CARfix SINDANGBARANG BOGOR">CARfix SINDANGBARANG BOGOR</option>
                                <option value="CARfix Veteran Solo">CARfix Veteran Solo</option>
                                <option value="CARfix Jakal">CARfix Jakal</option>
                                <option value="CARfix Majapahit">CARfix Majapahit</option>
                                <option value="CARfix Setiabudi">CARfix Setiabudi</option>
                                <option value="CARfix Antapani Bandung">CARfix Antapani Bandung</option>
                                <option value="CARfix SLAMET RIYADI BATANG">CARfix SLAMET RIYADI BATANG</option>
                                <option value="CARfix KEDUNGMUNDU">CARfix KEDUNGMUNDU</option>
                                <option value="CARfix PAKUALAMAN">CARfix PAKUALAMAN</option>
                                <option value="CARfix Osamaliki salatiga">CARfix Osamaliki salatiga</option>
                                <option value="CARfix Raya Magelang">CARfix Raya Magelang</option>
                                <option value="CARfix PUSPOWARNO">CARfix PUSPOWARNO</option>
                                <option value="CARfix CIBINONG">CARfix CIBINONG</option>
                                <option value="CARfix PURWOKERTO">CARfix PURWOKERTO</option>
                                <option value="CARfix COLOMADU">CARfix COLOMADU</option>
                                <option value="CARfix YOGYAKARTA">CARfix YOGYAKARTA</option>
                                <option value="CARfix SAWANGAN">CARfix SAWANGAN</option>
                                <option value="CARfix KENDAL">CARfix KENDAL</option>
                                <option value="CARfix NGALIYAN">CARfix NGALIYAN</option>
                                <option value="CARfix MAGELANG">CARfix MAGELANG</option>
                                <option value="CARfix UNTUNG SUROPATI">CARfix UNTUNG SUROPATI</option>
                                <option value="CARfix Tugu">CARfix Tugu</option>
                                <option value="CARfix PONDOK INDAH">CARfix PONDOK INDAH</option>
                                <option value="CARfix KARANG TENGAH">CARfix KARANG TENGAH</option>
                                <option value="CARfix Narogong">CARfix Narogong</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="posisi">Posisi:</label>
                            <select class="form-control" name="posisi" required>
                                <option value="">Edit Posisi</option>
                                <option value="BRANCH HEAD">BRANCH HEAD</option>
                                <option value="PART AND ADMINISTRATION">PART AND ADMINISTRATION</option>
                                <option value="MEKANIK">MEKANIK</option>
                                <option value="SERVICE ADVISOR">SERVICE ADVISOR</option>
                            </select>
                        </div>
                        <a href="{{ route('absensi.index') }}" class="btn btn-danger float-end">BACK</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection
















































































