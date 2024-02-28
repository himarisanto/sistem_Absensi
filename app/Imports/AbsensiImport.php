<?php

namespace App\Imports;

use App\Models\Absensi;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsensiImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {


        // Periksa apakah record dengan "no_absen" yang sama sudah ada di database
        $existingRecord = Absensi::where('no_absen', $row['no_absen'])->first();

        // Jika record ada, perbarui record yang ada
        if ($existingRecord) {
            $existingRecord->update([
                'nama'   => $row['nama'],
                'cabang' => $row['cabang'],
                'posisi' => $row['posisi'],
                'hari1'  => $row['hari1'],
                'hari2'  => $row['hari2'],
                'hari3'  => $row['hari3'],
                'hari4'  => $row['hari4'],
                'hari5'  => $row['hari5'],
                'hari6'  => $row['hari6'],
                'hari7'  => $row['hari7'],
                'hari8'  => $row['hari8'],
                'hari9'  => $row['hari9'],
                'hari10' => $row['hari10'],
                'hari11' => $row['hari11'],
                'hari12' => $row['hari12'],
                'hari13' => $row['hari13'],
                'hari14' => $row['hari14'],
                'hari15' => $row['hari15'],
                'hari16' => $row['hari16'],
                'hari17' => $row['hari17'],
                'hari18' => $row['hari18'],
                'hari19' => $row['hari19'],
                'hari20' => $row['hari20'],
                'hari21' => $row['hari21'],
                'hari22' => $row['hari22'],
                'hari23' => $row['hari23'],
                'hari24' => $row['hari24'],
                'hari25' => $row['hari25'],
                'hari26' => $row['hari26'],
                'hari27' => $row['hari27'],
                'hari28' => $row['hari28'],
                'hari29' => $row['hari29'],
                'hari30' => $row['hari30'],
                'hari31' => $row['hari31'],

            ]);



            return null;
        }

        return new Absensi([
            'no_absen' => $row['no_absen'],
            'nama'     => $row['nama'],
            'cabang'   => $row['cabang'],
            'posisi'   => $row['posisi'],
            'hari1'    => $row['hari1'],
            'hari2'    => $row['hari2'],
            'hari3'    => $row['hari3'],
            'hari4'    => $row['hari4'],
            'hari5'    => $row['hari5'],
            'hari6'    => $row['hari6'],
            'hari7'    => $row['hari7'],
            'hari8'    => $row['hari8'],
            'hari9'    => $row['hari9'],
            'hari10'   => $row['hari10'],
            'hari11'   => $row['hari11'],
            'hari12'   => $row['hari12'],
            'hari13'   => $row['hari13'],
            'hari14'   => $row['hari14'],
            'hari15'   => $row['hari15'],
            'hari16'   => $row['hari16'],
            'hari17'   => $row['hari17'],
            'hari18'   => $row['hari18'],
            'hari19'   => $row['hari19'],
            'hari20'   => $row['hari20'],
            'hari21'   => $row['hari21'],
            'hari22'   => $row['hari22'],
            'hari23'   => $row['hari23'],
            'hari24'   => $row['hari24'],
            'hari25'   => $row['hari25'],
            'hari26'   => $row['hari26'],
            'hari27'   => $row['hari27'],
            'hari28'   => $row['hari28'],
            'hari29'   => $row['hari29'],
            'hari30'   => $row['hari30'],
            'hari31'   => $row['hari31'],
        ]);
    }
}
