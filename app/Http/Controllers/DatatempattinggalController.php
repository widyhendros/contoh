<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datatempattinggal;
use App\Models\Users;
use Session;

class DatatempattinggalController extends Controller
{
    //
    public function index()
    {
        return view('page/siswa/siswa', ["title" => "Data Siswa", "siswas" => Siswa::get() ]);
    }

    public function tambah()
    {
        $siswa = Users::leftjoin('siswa','users.id','=','siswa.iduser')->where('iduser',Session::get('id'))->first();

        return view('page/siswa/tambahsiswa', ["title" => "Tambah Data Siswa",
                                               "alamat" => $alamat]);
    }

    public function siswabaru()
    {
        return view('page/siswa/siswabaru', ["title" => "Data Siswa Baru", "siswas" => Siswa::get() ]);
    }
    public function siswamutasi()
    {
        return view('page/siswa/siswamutasi', ["title" => "Mutasi Siswa", "siswas" => Siswa::get() ]);
    }


    public function inserttambahsiswa(Request $request)
    {

        $alamat = Siswa::where('iduser',Session::get('id'))->first();
        $alamat->jalan = $request->jalan;
        $alamat->rt = $request->rt;
        $alamat->rw = $request->rw;
        $alamat->kelurahan = $request->kelurahan;
        $alamat->kecamatan = $request->kecamatan;
        $alamat->kota = $request->kota;
        $alamat->kodepos = $request->kodepos;
        $alamat->jarak = $request->jarak;
        $alamat->wkttempuh = $request->wkttempuh;
        $alamat->transportasi = $request->transportasi;
        $alamat->tlprumah = $request->tlprumah;
        $alamat->nohp = $request->nohp;

        $alamat->save();

        return redirect()->back();
    }
}
