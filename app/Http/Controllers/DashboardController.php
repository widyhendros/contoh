<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Thnpelajaran;


class DashboardController extends Controller
{
    public function index(){
        $thnajaran = Thnpelajaran::where('status_thnpelajaran','=','1')->first();
        return view('dashboard', ["title" => $thnajaran->nama_thnpelajaran,
                                    "thnajaran"=>$thnajaran,
                                    "jumlahrombel"=>Kelas::where('id_thnpelajaran','=',$thnajaran->id)->count(),
                                    "jumlahsiswaaktif" => Siswa::join('alokasi_kelas','alokasi_kelas.id_siswa','siswa.id')->join('kelas','kelas.id','alokasi_kelas.id_kelas')->where('status_siswa','=','active',)->where('id_thnpelajaran','=',$thnajaran->id)->count(), 
                                    "jumlahsiswamutasi"=>Siswa::where('status_siswa','=','mutasi')->count(),
                                    "kelasx"=>Kelas::select(
                                            \DB::raw('kelas.*'),
                                            \DB::raw('kelas.id as id'),
                                            \DB::raw('(sum(if(siswa.jk = "Laki-laki" and siswa.status_siswa != "mutasi", 1,0))) as jumlahsiswalaki'),
                                            \DB::raw('(sum(if(siswa.jk = "Perempuan" and siswa.status_siswa != "mutasi", 1,0))) as jumlahsiswaperempuan'),
                                            \DB::raw('(sum(if(siswa.status_siswa != "mutasi", 1,0))) as total_siswa'))
                                            ->leftJoin('alokasi_kelas','kelas.id','alokasi_kelas.id_kelas')
                                            ->leftJoin('siswa','alokasi_kelas.id_siswa','siswa.id')
                                            ->where('tingkat','=','1')
                                            ->where('id_thnpelajaran','=',$thnajaran->id)
                                            ->groupBy('kelas.id')
                                            ->get(),
                                    "kelasxi"=>Kelas::select(
                                        \DB::raw('kelas.*'),
                                        \DB::raw('kelas.id as id'),
                                        \DB::raw('(sum(if(siswa.jk = "Laki-laki" and siswa.status_siswa != "mutasi", 1,0))) as jumlahsiswalaki'),
                                        \DB::raw('(sum(if(siswa.jk = "Perempuan" and siswa.status_siswa != "mutasi", 1,0))) as jumlahsiswaperempuan'),
                                        \DB::raw('(sum(if(siswa.status_siswa != "mutasi", 1,0))) as total_siswa'))
                                        ->leftJoin('alokasi_kelas','kelas.id','alokasi_kelas.id_kelas')
                                        ->leftJoin('siswa','alokasi_kelas.id_siswa','siswa.id')
                                        ->where('tingkat','=','2')
                                        ->where('id_thnpelajaran','=',$thnajaran->id)
                                        ->groupBy('kelas.id')
                                        ->get(),
                                    "kelasxii"=>Kelas::select(
                                        \DB::raw('kelas.*'),
                                        \DB::raw('kelas.id as id'),
                                        \DB::raw('(sum(if(siswa.jk = "Laki-laki" and siswa.status_siswa != "mutasi", 1,0))) as jumlahsiswalaki'),
                                        \DB::raw('(sum(if(siswa.jk = "Perempuan" and siswa.status_siswa != "mutasi", 1,0))) as jumlahsiswaperempuan'),
                                        \DB::raw('(sum(if(siswa.status_siswa != "mutasi", 1,0))) as total_siswa'))
                                        ->leftJoin('alokasi_kelas','kelas.id','alokasi_kelas.id_kelas')
                                        ->leftJoin('siswa','alokasi_kelas.id_siswa','siswa.id')
                                        ->where('tingkat','=','3')
                                        ->where('id_thnpelajaran','=',$thnajaran->id)
                                        ->groupBy('kelas.id')
                                        ->get(),
                                    "siswamutasi"=>Siswa::where('status_siswa','=','mutasi')->leftjoin('mutasi','mutasi.idsiswa','=','siswa.id')->get(),
                                ]);
    }
}
