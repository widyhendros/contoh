<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;

use App\Models\Siswa;
use App\Models\Peminatan;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SiswaExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {        
        $siswa = Siswa::
            leftJoin('alamat', 'siswa.id', '=', 'alamat.idsiswa')
            ->leftJoin('tandabadan', 'siswa.id', '=', 'tandabadan.idsiswa')
            ->leftJoin('datapendidikan', 'siswa.id', '=', 'datapendidikan.idsiswa')
            ->leftJoin('orangtuawali', 'siswa.id', '=', 'orangtuawali.idsiswa')
            ->leftJoin('peminatan', 'siswa.id', '=', 'peminatan.idsiswa')
            ->select('*', \DB::raw("siswa.id as id"))
            ->with('hobidanminat')
            ->orderBy('nmlengkap','asc')
            ->get();

        return view('page.exports.siswa', [
            'siswa' => $siswa,
        ]);
    }
    
}
