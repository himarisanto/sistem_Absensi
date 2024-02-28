@extends('layouts.app')

@section('content')
<style>
    .table th {
        padding: 32px;
    }
</style>
<div class="container" style="margin-left: 100px;">
    <h1 style="text-align: center">Absensi</h1>
    <form action="{{ route('absensi.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="file" class="form-control" id="file" name="file" accept=".xlsx" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Import</button>
    </form>
    <div style="margin-top: 10px;">
        <a href="{{ route('absensi.export') }}" class="btn btn-success">
            <i class="fa fa-file-export"></i> Export
        </a>
    </div>
    <form action="{{ route('absensi.search') }}" method="GET">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="cabangSearch"></label>
                <select class="form-control" id="cabangSearch" name="cabang">
                    <option value="">Cari Cabang</option>
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
            <div class="form-group col-md-4">
                <label for="namaSearch"></label>
                <input type="text" class="form-control" id="namaSearch" name="nama" placeholder="Cari Nama">
            </div>
            <div class="form-group col-md-2">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>
    <table class="table" style="margin-bottom: 70px;">
        <thead>
            <tr>
                <th>No Absen</th>
                <th>Nama</th>
                <th>Cabang</th>
                <th>Posisi</th>
                @php
                $daysInMonth = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
                @endphp
                @for ($i = 1; $i <= $daysInMonth; $i++) <th>Hari{{ $i }}</th>
                    @endfor
                    <th>Shift1</th>
                    <th>Shift2</th>
                    <th>LS</th>
                    <th>OFF</th>
                    <th>CT</th>
                    <th>JM</th>
                    <th>JT</th>
                    <th>Created At</th>
                    <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensis as $absensi)
            <tr>
                <td>{{ $absensi->no_absen }}</td>
                <td>{{ $absensi->nama }}</td>
                <td>{{ $absensi->cabang }}</td>
                <td>{{ $absensi->posisi }}</td>
                @php
                $total1 = $total2 = $totalLS = $totalOFF = $totalJM = $totalCT = 0;
                @endphp
                @for ($i = 1; $i <= 29; $i++) <td>
                    <div class="dropdown" style="width: 100%; position: relative;">
                        <input type="text" class="form-control dropdown-toggle hari-input" data-toggle="dropdown"
                            name="hari{{ $i }}[]" value="{{ $absensi->{'hari' . $i} }}"
                            data-absensi-id="{{ $absensi->id }}" data-hari-index="{{ $i }}" autocomplete="off"
                            style="width: 100%; height: 40px; font-size: 16px;">
                        <div class="dropdown-menu custom-dropdown" style="width: 100%; font-size: 16px;">
                            <a class="dropdown-item" href="#" data-value="1">1</a>
                            <a class="dropdown-item" href="#" data-value="2">2</a>
                            <a class="dropdown-item" href="#" data-value="LS">LS</a>
                            <a class="dropdown-item" href="#" data-value="OFF">OFF</a>
                            <a class="dropdown-item" href="#" data-value="CT">CT</a>
                        </div>
                    </div>
                    </td>
                    @php
                    switch ($absensi->{'hari' . $i}) {
                    case '1':
                    $total1++;
                    break;
                    case '2':
                    $total2++;
                    break;
                    case 'LS':
                    $totalLS++;
                    break;
                    case 'OFF':
                    $totalOFF++;
                    break;
                    case 'CT':
                    $totalCT++;
                    break;
                    }
                    @endphp
                    @endfor
                    <td>{{ $total1 }}</td>
                    <td>{{ $total2 }}</td>
                    <td>{{ $totalLS }}</td>
                    <td>{{ $totalOFF }}</td>
                    <td>{{ $totalCT }}</td>
                    <td>{{ $total1 + $total2 + $totalLS }}</td>
                    <td>{{ ($total1 * 7) + ($total2 * 7) + ($totalLS * 8) }}</td>
                    <td>{{ $absensi->created_at->toDateString() }}</td>
                    <td>
                        <form action="{{ url('delete/'.$absensi->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <ul class="pagination">

            @for ($i = 1; $i <= $absensis->lastPage(); $i++)
                <li class="page-item {{ ($absensis->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $absensis->url($i) }}">{{ $i }}</a>
                </li>
                @endfor
                <li class="page-item {{ ($absensis->currentPage() == $absensis->lastPage()) ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $absensis->nextPageUrl() }}">Next</a>
                </li>
        </ul>
    </div>
    <hr style="margin: 40px 0;">
    <form action="{{ route('absensi.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="no_absen">No Absen:</label>
                <input type="text" class="form-control" id="no_absen" name="no_absen" required>
            </div>
            <div class="form-group col-md-2">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group col-md-2">
                <label for="cabang">Cabang:</label>
                <select class="form-control" id="cabang" name="cabang" required>
                    <option value=""> Cabang</option>
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
            <div class="form-group col-md-2">
                <label for="posisi">Posisi:</label>
                <select class="form-control" id="posisi" name="posisi" required>
                    <option value="">Posisi</option>
                    <option value="BRANCH HEAD">BRANCH HEAD</option>
                    <option value="PART AND ADMINISTRATION">PART AND ADMINISTRATION</option>
                    <option value="MEKANIK">MEKANIK</option>
                    <option value="SERVICE ADVISOR">SERVICE ADVISOR</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            @php
            $currentDate = \Carbon\Carbon::now();
            $lastDayOfMonth = $currentDate->copy()->endOfMonth()->day;
            @endphp

            @for ($i = 1; $i <= $lastDayOfMonth; $i++) <div class="form-group col-md-1">
                {{-- <label for="tgl{{ $i }}">Hari {{ $i }}:</label> --}}
                {{-- <select class="form-control" id="tgl{{ $i }}" name="tgl{{ $i }}">
                    <option value="">Pilih</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="LS">LS</option>
                    <option value="OFF">OFF</option>
                </select> --}}
        </div>
        @endfor
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
</div>
<script>
    function updateDateAndDay() {
        var currentDate = new Date();
        var lastDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();

        if (currentDate.getDate() === lastDayOfMonth) {
            currentDate.setDate(1);
            currentDate.setMonth(currentDate.getMonth() + 1);
        } else {
            currentDate.setDate(currentDate.getDate() + 1);
        }

        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        var newDateAndDay = currentDate.toLocaleDateString('id-ID', options);
        console.log(newDateAndDay);
    }
    function debounce(func, wait, immediate) {
        var timeout;
        return function () {
            var context = this, args = arguments;
            var later = function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }
    updateDateAndDay();
    $(document).ready(function () {
        $('.dropdown-item').on('click', function (e) {
            e.preventDefault();
            var selectedValue = $(this).data('value');
            var dropdown = $(this).closest('.dropdown');
            dropdown.find('.form-control').val(selectedValue);
            saveHariValue(dropdown);
        });
        $('.hari-input').on('input', debounce(function () {
            saveHariValue($(this));
        }, 1000));
        function saveHariValue(element) {
            var newValue = $(element).find('.form-control').val();
            var absensiId = $(element).find('.form-control').data('absensi-id');
            var hariIndex = $(element).find('.form-control').data('hari-index');
            $.ajax({
                url: '/update/hari',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'absensi_id': absensiId,
                    'hari_index': hariIndex,
                    'new_value': newValue,
                },
                success: function (response) {
                    console.log(response);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });

</script>

@endsection













