<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Thnpelajaran;
use App\Models\Alokasikelas;


class KelasController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->filter_ajaran)) {
            $filter_ajaran = $request->filter_ajaran;
        } else {
            $filter_ajaran = Thnpelajaran::where('status_thnpelajaran', 1)->first()->id;
        }
        
        $kelas = Kelas::select(
            \DB::raw('kelas.*'),
            \DB::raw('thnpelajaran.*'),
            \DB::raw('kelas.id as id'),
            \DB::raw('(sum(if(siswa.status_siswa != "mutasi", 1,0))) as jumlahsiswa'))
            ->leftJoin('alokasi_kelas','kelas.id','alokasi_kelas.id_kelas')
            ->leftJoin('siswa','alokasi_kelas.id_siswa','siswa.id')
            ->join('thnpelajaran', 'kelas.id_thnpelajaran', '=', 'thnpelajaran.id')
            ->where('kelas.id_thnpelajaran','=',$filter_ajaran)->groupBy('kelas.id')->carikelas(request(['carikelas']))->get();
        return view('page/kelas/alokasikelas', [
            "title" => "Alokasi Kelas",
            "kelas" => $kelas,
            "ajaran"=>Thnpelajaran::get(),
            "request"=>$request ]);
    }

    public function setkelas(Request $request, $id)
    {
        $kelas = Kelas::select(\DB::raw('kelas.*'),
                                \DB::raw('kelas.id as id'),
                                \DB::raw('(sum(if(siswa.status_siswa != "mutasi", 1,0))) as jumlahsiswa'))
                                ->leftJoin('alokasi_kelas','kelas.id','alokasi_kelas.id_kelas')
                                ->leftJoin('siswa','alokasi_kelas.id_siswa','siswa.id')
                                ->where('kelas.id','=',$id)
                                ->groupBy('kelas.id')
                                ->first();

        $_alokasi = Alokasikelas::join('kelas','kelas.id','alokasi_kelas.id_kelas')
                                    ->where('id_thnpelajaran', $kelas->id_thnpelajaran)
                                    ->where('id_kelas', '!=', $id)
                                    ->get()
                                    ->pluck('id_siswa')
                                    ->toArray();

        $siswa = Siswa::select('siswa.id as idsiswa','siswa.nis','siswa.nisn','siswa.nmlengkap','siswa.nmjurusan', 'alokasi_kelas.id_kelas', 'siswa.thn_masuk')
                        ->leftjoin('alokasi_kelas','siswa.id', '=','alokasi_kelas.id_siswa')
                        ->where('status_siswa','!=','mutasi')
                        ->whereNotIn('siswa.id', $_alokasi)
                        ->filterthnmasuk(request(['filter_thnmasuk']))
                        ->filterjurusan(request(['filter_jurusan']))
                        ->filtersiswakelas(request(['filter_siswakelas']))
                        // ->orderBy('nmlengkap', 'asc')
                        ->get();

        $thn_masuk = Siswa::select('thn_masuk')
                    ->groupBy('thn_masuk')
                    ->orderBy('thn_masuk', 'asc')
                    ->get();

        return view('page/kelas/setkelas', ["title" => "Set Kelas", 
                                            "kelas"=>$kelas, 
                                            "siswa"=>$siswa,
                                            "ajaran"=>Thnpelajaran::get(),
                                            "thn_masuk"=>$thn_masuk,
                                            'request'=>$request
                                        ]);
    }

    public function detailkelas($id)
    {
        // $kelas = Kelas::findOrFail($id);
        $kelas = Kelas::select(\DB::raw('kelas.*,thnpelajaran.*,kelas.id as id,(sum(if(siswa.status_siswa != "mutasi", 1,0))) as jumlahsiswa'))
        ->leftJoin('alokasi_kelas','kelas.id','alokasi_kelas.id_kelas')
        ->leftJoin('siswa','alokasi_kelas.id_siswa','siswa.id')
        ->join('thnpelajaran','thnpelajaran.id','=','kelas.id_thnpelajaran')
        ->where('kelas.id','=',$id)
        ->groupBy('kelas.id')
        ->first();


        $thnpelajaran = Thnpelajaran::where('status_thnpelajaran', 1)->first()->id;

        $siswa = Siswa::select('siswa.id as idsiswa','siswa.nis','siswa.nisn','siswa.nmlengkap','siswa.nmjurusan', 'alokasi_kelas.id_kelas')
                        ->leftjoin('alokasi_kelas','siswa.id', '=','alokasi_kelas.id_siswa')
                        ->where('status_siswa','!=','mutasi')
                        ->where('alokasi_kelas.id_kelas', '=', $id)
                        ->get();
        
        return view('page/kelas/detailkelas', ["title" => "Detail Kelas", 
                                            "kelas"=>$kelas, 
                                            "siswa"=>$siswa,
                                        ]);
    }

    public function insertkelas(Request $request)
    {

        $kelas = new Kelas;
        $kelas->id_thnpelajaran = $request->id_thnpelajaran;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->walikelas = $request->walikelas;
        $kelas->jurusan = $request->jurusan;
        $kelas->tingkat = $request->tingkat;

        if($kelas->save()){
            return redirect()->back();
        }else{
            return redirect()->back();
        }

        // return redirect()->back();
    }

    public function updatekelas(Request $request)
    {

        $kelas = Kelas::where('id',$request->id)->first();
        $kelas->id_thnpelajaran = $request->id_thnpelajaran;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->walikelas = $request->walikelas;
        $kelas->jurusan = $request->jurusan;
        $kelas->tingkat = $request->tingkat;

        if($kelas->save()){
            return redirect()->back();
        }else{
            return redirect()->back();
        }

        // return redirect()->back();
    }
    

    public function kelasinsertsiswa(Request $request)
    {
        $id_kelas = $request->idkelas;
        $idsiswa = explode(',', $request->inputidsiswa);
        $_idsiswa = [];

        $siswa = Alokasikelas::where('id_kelas', $id_kelas)->WhereNotIn('id_siswa', $idsiswa)->delete();
        foreach ($idsiswa as $key => $value) {
            $_idsiswa[$key]['id_siswa'] = $value;
            $_idsiswa[$key]['id_kelas'] = $id_kelas;
        }
        \DB::table('alokasi_kelas')->insertOrIgnore($_idsiswa);

        $kelas = kelas::findorfail($request->idkelas);
        $kelas->total_siswa = count($idsiswa);
        $kelas->save();

        return back();
    }
}
