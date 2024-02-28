<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
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
        // 'shift1',
        // 'shift2',
        // 'LS',
        // 'OFF',
        // 'CT',
        // 'JM',
        // 'JT',


    ];



    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // Accessor Methods
    public function getFullNameAttribute()
    {
        return $this->nama;
    }
}
