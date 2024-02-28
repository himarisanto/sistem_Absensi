<?php

namespace App\Exports;

use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsensiExport implements FromCollection, WithHeadings
{
    private $absensis;

    public function __construct(Collection $absensis)
    {
        $this->absensis = $absensis;
    }

    public function headings(): array
    {
        $baseHeadings = [
            'id',
            'No Absen',
            'Nama',
            'Cabang',
            'Posisi',
            'hari1',
            'hari2',
            'hari3',
            'hari4',
            'hari5',
            'hari6',
            'hari7',
            'hari8',
            'hari9',
            'hari10',
            'hari11',
            'hari12',
            'hari13',
            'hari14',
            'hari15',
            'hari16',
            'hari17',
            'hari18',
            'hari19',
            'hari20',
            'hari21',
            'hari22',
            'hari23',
            'hari24',
            'hari25',
            'hari26',
            'hari27',
            'hari28',
            'hari29',
            'hari30',
            'hari31',
        ];

        $shiftHeadings = [
            'Shift 1',
            'Shift 2',
            'LS',
            'OFF',
            'CT',
            'JM',
            'JT',
            'created_at',
            'updated_at',
        ];

        $additionalHeadings = ['created_at', 'updated_at'];

        return array_merge($baseHeadings, $shiftHeadings);
    }

    public function collection()
    {
        return $this->absensis->map(function ($absensi) {
            $dailyTotals = $this->calculateDailyTotals($absensi);

            $absensiValues = $absensi ? $absensi->only([
                'id',
                'no_absen',
                'nama',
                'cabang',
                'posisi',
                'hari1',
                'hari2',
                'hari3',
                'hari4',
                'hari5',
                'hari6',
                'hari7',
                'hari8',
                'hari9',
                'hari10',
                'hari11',
                'hari12',
                'hari13',
                'hari14',
                'hari15',
                'hari16',
                'hari17',
                'hari18',
                'hari19',
                'hari20',
                'hari21',
                'hari22',
                'hari23',
                'hari24',
                'hari25',
                'hari26',
                'hari27',
                'hari28',
                'hari29',
                'hari30',
                'hari31',
            ]) : [];

            return array_merge(
                $absensiValues,
                array_values($dailyTotals),
                [
                    $dailyTotals['total1'] + $dailyTotals['total2'] + $dailyTotals['totalLS'],
                    ($dailyTotals['total1'] * 7) + ($dailyTotals['total2'] * 7) + ($dailyTotals['totalLS'] * 8),
                    $absensi->created_at->format('Y-m-d H:i:s'),
                    $absensi->updated_at->format('Y-m-d H:i:s'),
                ]
            );
        });
    }
    private function calculateDailyTotals($absensi)
    {
        $dailyTotals = [
            'total1'   => 0,
            'total2'   => 0,
            'totalLS'  => 0,
            'totalOFF' => 0,
            'totalCT'  => 0,

        ];
        for ($day = 1; $day <= 31; $day++) {
            $hariValue = $absensi->{"hari{$day}"};

            switch ($hariValue) {
                case '1':
                    $dailyTotals['total1']++;
                    break;
                case '2':
                    $dailyTotals['total2']++;
                    break;
                case 'LS':
                    $dailyTotals['totalLS']++;
                    break;
                case 'OFF':
                    $dailyTotals['totalOFF']++;
                    break;
                case 'CT':
                    $dailyTotals['totalCT']++;
                    break;
                case 'JM':
                    $dailyTotals['totalJM']++;
                    break;
                case 'JT':
                    $dailyTotals['totalJT']++;
                    break;
            }
        }

        return $dailyTotals;
    }
}
