<?php

namespace App\Http\Controllers;

use Session;
use Validator;
use App\Models\Siswa;
use App\Models\Users;
use App\Models\Alamat;
use App\Models\Mutasi;
use App\Models\Penyakit;
use App\Models\Prestasi;
use App\Models\Peminatan;
use App\Models\ExcelSiswa;
use App\Models\fileberkas;
use App\Models\Tandabadan;
use App\Exports\SiswaExport;
use App\Exports\SiswaExportBaru;
use App\Imports\SiswaImport;
use App\Models\Hobidanminat;
use App\Models\Orangtuawali;
use Illuminate\Http\Request;
use App\Models\Datapendidikan;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class Adminsiswacontroller extends Controller
{
    public function tambah( Request $request, $page = 1, )
    {
        $siswaid = Siswa::where('nisn',$request->nisn)->first();

        $siswa = Users::leftjoin('siswa','users.nisn','=','siswa.nisn')->where('users.nisn',$request->nisn)->first();
        $alamat = Alamat::leftjoin('siswa','siswa.id','=','alamat.idsiswa')->where('siswa.id',$siswaid->id)->first();
        $tandabadan = Tandabadan::leftjoin('siswa','siswa.id','=','tandabadan.idsiswa')->where('siswa.id',$siswaid->id)->first();
        $datapendidikan = Datapendidikan::leftjoin('siswa','siswa.id','=','datapendidikan.idsiswa')->where('siswa.id',$siswaid->id)->first();
        $orangtuawali = Orangtuawali::leftjoin('siswa','siswa.id','=','orangtuawali.idsiswa')->where('siswa.id',$siswaid->id)->first();
        $prestasi = prestasi::leftjoin('siswa','siswa.id','=','prestasi.idsiswa')->where('siswa.id',$siswaid->id)->get();
        $hobidanminat = Hobidanminat::leftjoin('siswa','siswa.id','=','hobidanminat.idsiswa')->where('siswa.id',$siswaid->id)->get();
        $peminatan = Peminatan::leftjoin('siswa','siswa.id','=','peminatan.idsiswa')->where('siswa.id',$siswaid->id)->first();
        $mutasi = Mutasi::leftjoin('siswa','siswa.id','=','mutasi.idsiswa')->where('siswa.id',$siswaid->id)->first();
        $penyakit = Penyakit::leftjoin('siswa','siswa.id','=','penyakit.idsiswa')->where('siswa.id',$siswaid->id)->get();
        $ijasah = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',$siswaid->id)->where('fileberkas.type','ijasah')->first();
        $kk = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',$siswaid->id)->where('fileberkas.type','kartu keluarga')->first();
        $akta = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',$siswaid->id)->where('fileberkas.type','akta lahir')->first();
        $kis = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',$siswaid->id)->where('fileberkas.type','kis')->first();
        $kip = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',$siswaid->id)->where('fileberkas.type','kip')->first();
        $kks = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',$siswaid->id)->where('fileberkas.type','kks')->first();
        $pkh = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',$siswaid->id)->where('fileberkas.type','pkh')->first();
        $kbs = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',$siswaid->id)->where('fileberkas.type','kbs')->first();
        $ksm = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',$siswaid->id)->where('fileberkas.type','ksm')->first();
        
        ////////////////create array/////////////////////
        $arraypenyakit = array();
        $arrayhobidanminat = array();

        foreach ($penyakit as $row)
        {
            array_push($arraypenyakit,"$row->penyakit");
        }

        foreach ($hobidanminat as $row)
        {
            array_push($arrayhobidanminat,$row->nama);
        }
        
        return view('page/siswa/admintambahsiswa', [
            "title" => "Tambah Data Siswa",
            "siswa" => $siswa,
            "alamat" => $alamat,
            "tandabadan" => $tandabadan,
            "penyakit" => $penyakit,
            "arraypenyakit" => $arraypenyakit,
            "datapendidikan" => $datapendidikan,
            "orangtuawali" => $orangtuawali,
            "hobidanminat" => $hobidanminat,
            "arrayhobidanminat" => $arrayhobidanminat,
            "peminatan" => $peminatan,
            "prestasi" => $prestasi,
            "ijasah" => $ijasah,
            "kk" => $kk,
            "akta" => $akta,
            "kis" => $kis,
            "kip" => $kip,
            "kks" => $kks,
            "pkh" => $pkh,
            "kbs" => $kbs,
            "ksm" => $ksm,
            "page" => $page,
        ]);
    }
        public function insertpribadisiswa(Request $request)
    {

        $siswa = Siswa::where('id',$request->siswaid)->first();
        $user = Users::where('nisn', $siswa->nisn)->first();
        $siswa->thn_masuk = $request->thn_masuk;
        $siswa->nis = $request->nis;
        // $siswa->jenissiswa = $request->jenissiswa;
        $siswa->nmjalurmasuk = $request->jalurMasuk;
        $siswa->nmjurusan = $request->nmjurusan;
        $siswa->nmlengkap = $request->namaLengkap;
        $user->name = $request->namaLengkap;
        $siswa->nisn = $request->nisn;
        $user->nisn = $request->nisn;
        // $user->password = $request->nisn;
        $siswa->nmpanggilan = $request->panggilan;
        $siswa->nik = $request->nik;
        $siswa->jk = $request->jk;
        $siswa->statusanak = $request->statusanak;
        $siswa->anakke = $request->anakke;
        $siswa->jmlsaudarakandung = $request->jmlsaudarakandung;
        $siswa->jmlsaudaratiri = $request->jmlsaudaratiri;
        $siswa->jmlsaudaraangkat = $request->jmlsaudaraangkat;
        $siswa->tmplahir = $request->tmplahir;
        $siswa->tanggallahir = $request->tanggallahir;
        $siswa->agama = $request->agama;
        $siswa->email = $request->email;

        $siswa->save();
        $user->save();

        
        return redirect('/page/siswa/admintambahsiswa?nisn='.$request->nisn)->with(['pribadisiswa'=>true, 'pesan'=>'Data Pribadi Berhasil Diubah']);
    }

        public function inserttempattinggal(Request $request)
    {
        $alamat = Alamat::where('idsiswa',$request->siswaid)->first();
        if(!isset($alamat->id)){
            $alamat = new Alamat;
        }

        $alamat->idsiswa = $request->siswaid;
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
        $alamat->telprumah = $request->telprumah;
        $alamat->nohp = $request->nohp;

        $alamat->save();

        return redirect()->back()->with(['pribadisiswa'=>true, 'pesan'=>'Data Alamat Berhasil Diubah']);
    }

        public function inserttandabadan(Request $request)
    {
        $tandabadan = Tandabadan::where('idsiswa',$request->siswaid)->first();
        if(!isset($tandabadan->id)){
            $tandabadan = new Tandabadan;
        }

        $tandabadan->idsiswa = $request->siswaid;
        $tandabadan->berat = $request->berat;
        $tandabadan->tinggi = $request->tinggi;
        $tandabadan->kebutuhan = $request->kebutuhan;
        $tandabadan->golongandarah = $request->golongandarah;

        $tandabadan->save();

        for($i=1; $i<=9; $i++)
        {
            $name = 'nama'.$i;
            $tahun = 'tahun'.$i;
            $lama = 'lama'.$i;
            $waktu = 'waktu'.$i;
            if($request->$tahun != '' || $request->$lama != '' || $request->$waktu != '' )
            {
                $penyakit = Penyakit::where('idsiswa',$request->siswaid)->where('penyakit',$request->$name)->first();
                if(!isset($penyakit->penyakit))
                {
                    $penyakit = new Penyakit;
                }
                $penyakit->idsiswa = $request->siswaid;
                $penyakit->penyakit = $request->$name;
                $penyakit->tahun = $request->$tahun;
                $penyakit->lamanya = $request->$lama;
                $penyakit->waktu = $request->$waktu;

                $penyakit->save();
            }
        }

        return redirect()->back()->with(['tandabadan'=>true, 'pesan'=>'Data Tanda Badan Berhasil Diubah']);
    }

    public function insertdatapendidikan(Request $request)
    {
        $datapendidikan = Datapendidikan::where('idsiswa',$request->siswaid)->first();
        if(!isset($datapendidikan->id)){
            $datapendidikan = new Datapendidikan;
        }

        $datapendidikan->idsiswa = $request->siswaid;
        $datapendidikan->paudformal = $request->paudformal;
        $datapendidikan->paudnonformal = $request->paudnonformal;
        $datapendidikan->namasmp = $request->namasmp;
        $datapendidikan->alamat = $request->alamat;
        $datapendidikan->kota = $request->kota;
        $datapendidikan->tglijazah = $request->tglijazah;
        $datapendidikan->noijazah = $request->noijazah;

        $datapendidikan->save();

        return redirect()->back()->with(['pendidikan'=>true, 'pesan'=>'Data Pendidikan Berhasil Diubah']);
    }

    public function insertorangtuawali(Request $request)
    {
        $orangtuawali = Orangtuawali::where('idsiswa',$request->siswaid)->first();
        if(!isset($orangtuawali->id)){
            $orangtuawali = new Orangtuawali;
        }

        $orangtuawali->idsiswa = $request->siswaid;
        $orangtuawali->tinggalbersama = $request->tinggalbersama;
        $orangtuawali->nmbapak = $request->nmbapak;
        $orangtuawali->keadaanbpk = $request->keadaanbpk;
        $orangtuawali->hubungandgnsiswabpk = $request->hubungandgnsiswabpk;
        $orangtuawali->tmptlahirbpk = $request->tmptlahirbpk;
        $orangtuawali->tgllahirbpk = $request->tgllahirbpk;
        $orangtuawali->pendidikantertinggibpk = $request->pendidikantertinggibpk;
        $orangtuawali->jalanbpk = $request->jalanbpk;
        $orangtuawali->rtbpk = $request->rtbpk;
        $orangtuawali->rwbpk = $request->rwbpk;
        $orangtuawali->kelurahanbpk = $request->kelurahanbpk;
        $orangtuawali->kecamatanbpk = $request->kecamatanbpk;
        $orangtuawali->kotabpk = $request->kotabpk;
        $orangtuawali->kodeposbpk = $request->kodeposbpk;
        $orangtuawali->telprumahbpk = $request->telprumahbpk;
        $orangtuawali->nohpbpk = $request->nohpbpk;
        $orangtuawali->profesibpk = $request->profesibpk;
        $orangtuawali->penghasilanbpk = $request->penghasilanbpk;
        $orangtuawali->nmibu = $request->nmibu;
        $orangtuawali->keadaanibu = $request->keadaanibu;
        $orangtuawali->hubungandgnsiswaibu = $request->hubungandgnsiswaibu;
        $orangtuawali->tmptlahiribu = $request->tmptlahiribu;
        $orangtuawali->tgllahiribu = $request->tgllahiribu;
        $orangtuawali->pendidikantertinggiibu = $request->pendidikantertinggiibu;
        $orangtuawali->jalanibu = $request->jalanibu;
        $orangtuawali->rtibu = $request->rtibu;
        $orangtuawali->rwibu = $request->rwibu;
        $orangtuawali->kelurahanibu = $request->kelurahanibu;
        $orangtuawali->kecamatanibu = $request->kecamatanibu;
        $orangtuawali->kotaibu = $request->kotaibu;
        $orangtuawali->kodeposibu = $request->kodeposibu;
        $orangtuawali->telprumahibu = $request->telprumahibu;
        $orangtuawali->nohpibu = $request->nohpibu;
        $orangtuawali->profesiibu = $request->profesiibu;
        $orangtuawali->penghasilanibu = $request->penghasilanibu;
        $orangtuawali->nmwali = $request->nmwali;
        $orangtuawali->keadaanwali = $request->keadaanwali;
        $orangtuawali->hubungandgnsiswawali = $request->hubungandgnsiswawali;
        $orangtuawali->tmptlahirwali = $request->tmptlahirwali;
        $orangtuawali->tgllahirwali = $request->tgllahirwali;
        $orangtuawali->pendidikantertinggiwali = $request->pendidikantertinggiwali;
        $orangtuawali->jalanwali = $request->jalanwali;
        $orangtuawali->rtwali = $request->rtwali;
        $orangtuawali->rwwali = $request->rwwali;
        $orangtuawali->kelurahanwali = $request->kelurahanwali;
        $orangtuawali->kecamatanwali = $request->kecamatanwali;
        $orangtuawali->kotawali = $request->kotawali;
        $orangtuawali->kodeposwali = $request->kodeposwali;
        $orangtuawali->telprumahwali = $request->telprumahwali;
        $orangtuawali->nohpwali = $request->nohpwali;
        $orangtuawali->profesiwali = $request->profesiwali;
        $orangtuawali->penghasilanwali = $request->penghasilanwali;

        $orangtuawali->save();

        return redirect()->back()->with(['orangtuawali'=>true, 'pesan'=>'Data Orang Tua / Wali Berhasil Diubah']);
    }

    public function inserthobidanminat(Request $request)
    {
////////////////checkbox/////////////////////////

        // $hobidanminat = Hobidanminat::where('idsiswa',$request->siswaid)->where('nama','membaca')->first();
        // if(isset($hobidanminat->id)){
        //     if($request->cb_membaca == ''){
        //     $hobidanminat = Hobidanminat::where('idsiswa',$request->siswaid)->where('nama','membaca')->delete();

        //     }
        
        // }else{
        //     if($request->cb_membaca!='')
        //     {
        //         $hobidanminat = new Hobidanminat;
        //         $hobidanminat->nama = $request->cb_membaca;
        //         $hobidanminat->tipe = 'hobi';
        //         $hobidanminat->idsiswa = $request->siswaid;
        //         $hobidanminat->save();
        //     }
        // }
      


        // $hobidanminat = Hobidanminat::where('idsiswa',$request->siswaid)->where('nama','menulis')->first();
        // if(isset($hobidanminat->id)){
        //     if($request->cb_menulis == ''){
        //     $hobidanminat = Hobidanminat::where('idsiswa',$request->siswaid)->where('nama','menulis')->delete();
        //     }
        
        // }else{
        //     if($request->cb_menulis!='')
        //     {
        //         $hobidanminat = new Hobidanminat;
        //         $hobidanminat->nama = $request->cb_menulis;
        //         $hobidanminat->tipe = 'hobi';
        //         $hobidanminat->idsiswa = $request->siswaid;
        //         $hobidanminat->save();
        //     }
        // }



        // $hobidanminat = Hobidanminat::where('idsiswa',$request->siswaid)->where('nama','menggambar')->first();
        // if(isset($hobidanminat->id)){
        //     if($request->cb_menggambar == ''){
        //     $hobidanminat = Hobidanminat::where('idsiswa',$request->siswaid)->where('nama','menggambar')->delete();
        //     }
        
        // }else{
        //     if($request->cb_menggambar!='')
        //     {
        //         $hobidanminat = new Hobidanminat;
        //         $hobidanminat->nama = $request->cb_menggambar;
        //         $hobidanminat->tipe = 'hobi';
        //         $hobidanminat->idsiswa = $request->siswaid;
        //         $hobidanminat->save();
        //     }
        // }
/////////////////////////////////////////////////
        
        $hobidanminat = Hobidanminat::where('idsiswa',$request->siswaid)->delete();
        if(isset($request->hobi[0])){
         
            foreach ($request->hobi as $key => $value) {
                $hobidanminat = new Hobidanminat;
                $hobidanminat->nama = $value;
                $hobidanminat->tipe = 'hobi';
                $hobidanminat->idsiswa = $request->siswaid;
                $hobidanminat->save();
            }
        }
        
        if(isset($request->cita_cita)){
            foreach ($request->cita_cita as $key => $value) {
                $hobidanminat = new Hobidanminat;
                $hobidanminat->nama = $value;
                $hobidanminat->tipe = 'cita_cita';
                $hobidanminat->idsiswa = $request->siswaid;
                $hobidanminat->save();
            }
        }

        if(isset($request->minat_ekskul)){
            foreach ($request->minat_ekskul as $key => $value) {
                $hobidanminat = new Hobidanminat;
                $hobidanminat->nama = $value;
                $hobidanminat->tipe = 'minat_ekskul';
                $hobidanminat->idsiswa = $request->siswaid;
                $hobidanminat->save();
            }
        }

        // $prestasi = Prestasi::where('idsiswa',$request->siswaid)->first();
        // if(!isset($prestasi->id)){
        //     $prestasi = new Prestasi;
        // }
        $prestasi = Prestasi::where('idsiswa',$request->siswaid)->delete();

        for ($i=1; $i <= $request->no_prestasi; $i++) { 
            $nama_prestasi = "nama_prestasi".$i;
            $jenis_prestasi = "jenis_prestasi".$i;
            $tahun_prestasi = "tahun_prestasi".$i;
            $penyelenggara = "penyelenggara".$i;
            
            $prestasi = new Prestasi;
            $prestasi->idsiswa = $request->siswaid;
            $prestasi->nama_prestasi = $request->$nama_prestasi;
            $prestasi->jenis_prestasi = $request->$jenis_prestasi;
            $prestasi->tahun_prestasi = $request->$tahun_prestasi;
            $prestasi->penyelenggara = $request->$penyelenggara;


            $prestasi->save();

        }
        

        return redirect()->back()->with(['hobiminat'=>true, 'pesan'=>'Data Hobi & Minat Berhasil Diubah']);
    }

    public function insertpeminatan(Request $request)
    {
        $peminatan = Peminatan::where('idsiswa',$request->siswaid)->first();
        if(!isset($peminatan->id)){
            $peminatan = new Peminatan;
        }

        $peminatan->idsiswa = $request->siswaid;
        $peminatan->pilminatsatu = $request->pilminatsatu;
        $peminatan->linminpilsatu = $request->linminpilsatu;
        $peminatan->pilminatdua = $request->pilminatdua;
        $peminatan->linminpildua = $request->linminpildua;
        $peminatan->bindosatu = $request->bindosatu;
        $peminatan->bindodua = $request->bindodua;
        $peminatan->bindotiga = $request->bindotiga;
        $peminatan->bindoempat = $request->bindoempat;
        $peminatan->bindolima = $request->bindolima;
        $peminatan->bingsatu = $request->bingsatu;
        $peminatan->bingdua = $request->bingdua;
        $peminatan->bingtiga = $request->bingtiga;
        $peminatan->bingempat = $request->bingempat;
        $peminatan->binglima = $request->binglima;
        $peminatan->mtksatu = $request->mtksatu;
        $peminatan->mtkdua = $request->mtkdua;
        $peminatan->mtktiga = $request->mtktiga;
        $peminatan->mtkempat = $request->mtkempat;
        $peminatan->mtklima = $request->mtklima;
        $peminatan->ipasatu = $request->ipasatu;
        $peminatan->ipadua = $request->ipadua;
        $peminatan->ipatiga = $request->ipatiga;
        $peminatan->ipaempat = $request->ipaempat;
        $peminatan->ipalima = $request->ipalima;
        $peminatan->ipssatu = $request->ipssatu;
        $peminatan->ipsdua = $request->ipsdua;
        $peminatan->ipstiga = $request->ipstiga;
        $peminatan->ipsempat = $request->ipsempat;
        $peminatan->ipslima = $request->ipslima;

        $peminatan->save();

        return redirect()->back()->with(['peminatan'=>true, 'pesan'=>'Data Peminatan Berhasil Diubah']);
    }
    
    public function insertfileberkas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ijasah' => 'max:2000|mimes:pdf,doc,docx,jpg,png ',
            'kartu_keluarga' => 'max:2000|mimes:pdf,doc,docx,jpg,png ',
            'akta_lahir' => 'max:2000|mimes:pdf,doc,docx,jpg,png ',
            'kip' => 'max:2000|mimes:pdf,doc,docx,jpg,png ',
            'kis' => 'max:2000|mimes:pdf,doc,docx,jpg,png ',
            'kks' => 'max:2000|mimes:pdf,doc,docx,jpg,png ',
            'pkh' => 'max:2000|mimes:pdf,doc,docx,jpg,png ',
            'kbs' => 'max:2000|mimes:pdf,doc,docx,jpg,png ',
            'ksm' => 'max:2000|mimes:pdf,doc,docx,jpg,png ',
        ]);

        if ($validator->passes()){
            
            if($request->file('ijasah')!=''){
                $destination = 'files/ijasah';
                $file = $request->file('ijasah');
                $fileName=  'ijasah-' . Session::get('id') . '.' . $file->getClientOriginalExtension();

                $fileberkas = Fileberkas::where('idsiswa',$request->siswaid)->where('type','ijasah')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = $request->siswaid;
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'ijasah';
                $fileberkas->save();
            }

            if($request->file('kartu_keluarga')!=''){
                $destination = 'files/kartu keluarga';
                $file = $request->file('kartu_keluarga');
                $fileName=  'KK-' . Session::get('id') . '.' . $file->getClientOriginalExtension();
    
                $fileberkas = Fileberkas::where('idsiswa',$request->siswaid)->where('type','kartu keluarga')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = $request->siswaid;
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'kartu keluarga';
                $fileberkas->save();
            }

            if($request->file('akta_lahir')!=''){
                $destination = 'files/akta lahir';
                $file = $request->file('akta_lahir');
                $fileName=  'akta-' . Session::get('id') . '.' . $file->getClientOriginalExtension();

                $fileberkas = Fileberkas::where('idsiswa',$request->siswaid)->where('type','akta lahir')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = $request->siswaid;
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'akta lahir';
                $fileberkas->save();
            }

            if($request->file('kis')!=''){
                $destination = 'files/kis';
                $file = $request->file('kis');
                $fileName=  'kis-' . Session::get('id') . '.' . $file->getClientOriginalExtension();

                $fileberkas = Fileberkas::where('idsiswa',$request->siswaid)->where('type','kis')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = $request->siswaid;
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'kis';
                $fileberkas->save();
            }

            if($request->file('kip')!=''){
                $destination = 'files/kip';
                $file = $request->file('kip');
                $fileName=  'kip-' . Session::get('id') . '.' . $file->getClientOriginalExtension();

                $fileberkas = Fileberkas::where('idsiswa',$request->siswaid)->where('type','kip')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = $request->siswaid;
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'kip';
                $fileberkas->save();
            }


            if($request->file('kks')!=''){
                $destination = 'files/kks';
                $file = $request->file('kks');
                $fileName=  'kks-' . Session::get('id') . '.' . $file->getClientOriginalExtension();

                $fileberkas = Fileberkas::where('idsiswa',$request->siswaid)->where('type','kks')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = $request->siswaid;
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'kks';
                $fileberkas->save();
            }

            if($request->file('pkh')!=''){
                $destination = 'files/pkh';
                $file = $request->file('pkh');
                $fileName=  'pkh-' . Session::get('id') . '.' . $file->getClientOriginalExtension();

                $fileberkas = Fileberkas::where('idsiswa',$request->siswaid)->where('type','pkh')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = $request->siswaid;
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'pkh';
                $fileberkas->save();
            }

            if($request->file('kbs')!=''){
                $destination = 'files/kbs';
                $file = $request->file('kbs');
                $fileName=  'kbs-' . Session::get('id') . '.' . $file->getClientOriginalExtension();

                $fileberkas = Fileberkas::where('idsiswa',$request->siswaid)->where('type','kbs')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = $request->siswaid;
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'kbs';
                $fileberkas->save();
            }

            if($request->file('ksm')!=''){
                $destination = 'files/ksm';
                $file = $request->file('ksm');
                $fileName=  'ksm-' . Session::get('id') . '.' . $file->getClientOriginalExtension();

                $fileberkas = Fileberkas::where('idsiswa',$request->siswaid)->where('type','ksm')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = $request->siswaid;
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'ksm';
                $fileberkas->save();
            }

            return back()->with(['fileberkas'=>true, 'pesan'=>'File Berkas Berhasil Diubah']); 

        }else{
            $errors = $validator->errors();
            echo $errors;
            return back()->with('gagal', 'File harus format pdf, doc, jpg, png'); 
        }
 
    }

    public function deletesiswa(Request $request)
    {
        $siswa = Siswa::where('nisn',$request->nisn)->first();
        $user = Users::where('nisn',$request->nisn)->first();
        $alamat = Alamat::where('idsiswa',$siswa->id)->get();
        $tandabadan = Tandabadan::where('idsiswa',$siswa->id)->get();
        $penyakit = Penyakit::where('idsiswa',$siswa->id)->get();
        $datapendidikan = Datapendidikan::where('idsiswa',$siswa->id)->get();
        $orangtuawali = Orangtuawali::where('idsiswa',$siswa->id)->get();
        $prestasi = Prestasi::where('idsiswa',$siswa->id)->get();
        $hobidanminat = Hobidanminat::where('idsiswa',$siswa->id)->get();
        $peminatan = Peminatan::where('idsiswa',$siswa->id)->get();
        $fileberkas = fileberkas::where('idsiswa',$siswa->id)->get();
        
      
        if(isset($alamat[0]->idsiswa)){
            $alamat = Alamat::where('idsiswa',$siswa->id)->delete();
        }
        if(isset($tandabadan[0]->idsiswa)){
            $tandabadan = Tandabadan::where('idsiswa',$siswa->id)->delete();
        }
        if(isset($penyakit[0]->idsiswa)){
            $penyakit = Penyakit::where('idsiswa',$siswa->id)->delete();

        }
        if(isset($datapendidikan[0]->idsiswa)){
                $datapendidikan = Datapendidikan::where('idsiswa',$siswa->id)->delete();
        }
        if(isset($orangtuawali[0]->idsiswa)){
            $orangtuawali = Orangtuawali::where('idsiswa',$siswa->id)->delete();
        }
        if(isset($prestasi[0]->idsiswa)){
            $prestasi = Prestasi::where('idsiswa',$siswa->id)->delete();
        }
        if(isset($hobidanminat[0]->idsiswa)){
            $hobidanminat = Hobidanminat::where('idsiswa',$siswa->id)->delete();
        }
        if(isset($peminatan[0]->idsiswa)){
            $peminatan = Peminatan::where('idsiswa',$siswa->id)->delete();
        }
        if(isset($fileberkas[0]->idsiswa)){

            foreach($fileberkas as $row){
            $name = $row->nama;
            $type = $row->type;
            if($type == "ijasah"){
                $destination = 'files/ijasah';
            }else if($type == "kartu keluarga"){
                $destination = 'files/kartu keluarga';
            }else if($type == "akta lahir"){
                $destination = 'files/akta lahir';
            }
            unlink($destination.'/'.$row->nama);
        }

             $fileberkas = fileberkas::where('idsiswa',$siswa->id)->delete();
        }


        if(isset($siswa->id)){
            $siswa = Siswa::where('nisn',$request->nisn)->delete();
        }
        if(isset($user->id)){
            $user = Users::where('nisn',$request->nisn)->delete();
        }


        return back();
    }

    public function insertmutasi(Request $request)
    {
        $siswa = siswa::where('id',$request->mutasi_siswaid)->first();
        $siswa->status_siswa = 'mutasi';
        $siswa->save();

        $mutasi = Mutasi::where('idsiswa',$request->mutasi_siswaid)->first();

        if(!isset($mutasi->id)){
            $mutasi = new Mutasi;
        }

        $mutasi->idsiswa = $request->mutasi_siswaid;
        $mutasi->nis = $request->mutasi_nis;
        $mutasi->nisn = $request->mutasi_nisn;
        $mutasi->nama = $request->mutasi_name;
        $mutasi->jenis_mutasi = $request->jenis_mutasi;
        $mutasi->tanggal = $request->tanggal;
        $mutasi->catatan = $request->catatan;

        if($mutasi->save()){
            $siswa = Siswa::where('id',$request->mutasi_siswaid)->first();
            $siswa->status_siswa = 'mutasi';
            $siswa->save();
        }

        return redirect()->back();
    }

   public function export_excel() 
    {
        return Excel::download(new SiswaExport, 'Data Siswa.xlsx');
        
        // $siswa = Siswa::
        // leftJoin('alamat', 'siswa.id', '=', 'alamat.idsiswa')
        // ->leftJoin('tandabadan', 'siswa.id', '=', 'tandabadan.idsiswa')
        // ->leftJoin('datapendidikan', 'siswa.id', '=', 'datapendidikan.idsiswa')
        // ->leftJoin('orangtuawali', 'siswa.id', '=', 'orangtuawali.idsiswa')
        // ->leftJoin('peminatan', 'siswa.id', '=', 'peminatan.idsiswa')
        // ->select('*', \DB::raw("siswa.id as id"))
        // ->with('hobidanminat')
        // ->get();
        
        // return view('page.exports.siswa', [
        //     'siswa' => $siswa,
        // ]);
    }

    public function exportBaru_excel($thn_masuk) 
    {
        return Excel::download(new SiswaExportBaru($thn_masuk), 'Migrasi NIS '.$thn_masuk.' .xlsx');
    }
}

