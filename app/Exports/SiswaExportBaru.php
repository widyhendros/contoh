<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;

use App\Models\Siswa;
use App\Models\Peminatan;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SiswaExportBaru implements FromView
{
    private $thn_ajaran;

    public function __construct(int $thn_ajaran) 
    {
        $this->thn_ajaran = $thn_ajaran;
    }

    public function view(): View
    {
        // $array = array();
        // $siswa = Siswa::get();
        // $peminatan = Peminatan::leftjoin('siswa','siswa.id','=','peminatan.idsiswa')->where('siswa.id',Session::get('siswaid'))->first();

        $siswa = DB::table('siswa')
            ->leftJoin('peminatan', 'siswa.id', '=', 'peminatan.idsiswa')
            ->leftJoin('alamat', 'siswa.id', '=', 'alamat.idsiswa')
            ->select('*')->where('siswa.thn_masuk',$this->thn_ajaran)
            ->orderBy('nmlengkap','asc')
            ->get();

        // foreach($siswa as $siswa){

        //     $penyakit = penyakit::where('idsiswa','153')->get();
        //     foreach($penyakit as $penyakit){
        //         $siswa->penyakit = $siswa->penyakit.' '.$penyakit->penyakit; 
        //     }
             
        // }
        return view('page.exports.siswaBaru', [
            'siswa' => $siswa,
        ]);
    }
    
}
