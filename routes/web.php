<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;



Route::get('/', function () {
    return view('layouts.app');
});

Route::get('absensis', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('absensis/create', [AbsensiController::class, 'create'])->name('absensi.create');
Route::post('absensis', [AbsensiController::class, 'store'])->name('absensi.store');
Route::get('absensis/{absensi}absen', [AbsensiController::class, 'absen'])->name('absensi.absen');
Route::put('absensis/{absensi}', [AbsensiController::class, 'update'])->name('absensi.update');
Route::get('delete/{id}', [AbsensiController::class, 'destroy']);
Route::get('/absensis/{id}', [AbsensiController::class, 'show'])->name('absensi.show');
Route::get('absensi/edit/{id}', [AbsensiController::class, 'edit'])->name('absensi.edit');
Route::put('update-absensis/{id}', [AbsensiController::class, 'update'])->name('absensi.update');


Route::post('/update/hari', [AbsensiController::class, 'updateHariValue'])->name('update.hari');

Route::delete('delete/{id}', [AbsensiController::class, 'destroy']);
Route::get('/export-excel', [AbsensiController::class, 'export'])->name('absensi.export');

Route::post('/import', [AbsensiController::class, 'import'])->name('absensi.import');
Route::get('/absensi/search', [AbsensiController::class, 'search'])->name('absensi.search');
