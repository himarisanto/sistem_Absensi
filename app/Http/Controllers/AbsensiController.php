<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\AbsensiExport;
use App\Imports\AbsensiImport;
use App\Models\Absensi;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\LengthAwarePaginator;


class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::paginate(11);
        return view('absensi.index', compact('absensis'));
    }
    public function create()
    {
        return view('absensi.create');
    }
    public function edit($id)
    {
        $absensi = Absensi::find($id);
        return view('absensi.edit', compact('absensi'));
    }
    public function update(Request $request, $id)
    {
        $absensi = Absensi::find($id);

        if (!$absensi) {
            return redirect()->route('absensi.edit', ['id' => $id])->with('error', 'Absensi not found');
        }
        $absensi->update([
            'no_absen' => $request->input('no_absen'),
            'nama'     => $request->input('nama'),
            'cabang'   => $request->input('cabang'),
            'posisi'   => $request->input('posisi'),
        ]);
        return redirect()->route('absensi.index')->with('status', 'Absensi Updated Successfully');
    }
    public function updateHariValue(Request $request)
    {
        try {
            $absensiId = $request->input('absensi_id');
            $hariIndex = $request->input('hari_index');
            $newValue  = $request->input('new_value');
            $absensi   = Absensi::find($absensiId);
            if (!$absensi) {
                return response()->json(['error' => 'Absensi error'], 404);
            }
            // Update the hari value
            // $hariArray             = $absensi->hari;
            // $hariArray[$hariIndex] = $newValue;
            $absensi['hari' . $hariIndex] = $newValue;
            $absensi->save();

            return response()->json(['success' => true, 'message' => 'Hari value updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating Hari value', 'message' => $e->getMessage()], 500);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'no_absen' => 'required',
            'nama'     => 'required',
            'cabang'   => 'required',
            'posisi'   => 'required',
        ]);
        $absensi           = new Absensi();
        $absensi->no_absen = $request->no_absen;
        $absensi->nama     = $request->nama;
        $absensi->cabang   = $request->cabang;
        $absensi->posisi   = $request->posisi;

        for ($i = 1; $i <= 31; $i++) {
            $absensi->{'hari' . $i} = $request->{'tgl' . $i};
        }
        $absensi->save();
        return redirect()->route('absensi.index');
    }
    public function export()
    {
        $absensis = Absensi::all();

        return Excel::download(new AbsensiExport($absensis), 'absensi.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        $file = $request->file('file');
        try {
            Excel::import(new AbsensiImport, $file);
            return redirect()->route('absensi.index')->with('status', 'Import successful');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Import failed. Error: ' . $e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $cabang = $request->input('cabang');
        $nama   = $request->input('nama');

        $query = Absensi::query();

        if ($cabang) {
            $query->where('cabang', $cabang);
        }

        if ($nama) {
            $query->where('nama', 'LIKE', "%$nama%");
        }

        $absensis = $query->paginate(11)->appends(request()->query());

        if ($absensis instanceof LengthAwarePaginator && $absensis->count() > 0) {
            return view('absensi.index', compact('absensis'))->with('query', compact('cabang', 'nama'));
        } else {
            return view('selamatdatang')->with('message', 'Detail tidak ditemukan. Coba cari lagi!');
        }
    }


    // public function show($id)
    // {
    //     $absensi = Absensi::findOrFail($id);

    //     return view('absensi.show', compact('absensi'));
    // }

    // public function absen(Absensi $absensi)
    // {
    //     return view('absensi.absen', compact('absensi'));
    // }
    public function destroy($id)
    {
        $absensi = Absensi::find($id);
        if (!$absensi) {
            return redirect()->back()->with('error', 'Absensi not found');
        }
        $absensi->delete();
        return redirect()->back()->with('status', 'Absensi deleted successfully');
    }

}
