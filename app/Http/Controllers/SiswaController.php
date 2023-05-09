<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use App\Models\Users;
use App\Models\Alamat;
use App\Models\Tandabadan;
use App\Models\Penyakit;
use App\Models\Datapendidikan;
use App\Models\Orangtuawali;
use App\Models\Hobidanminat;
use App\Models\Peminatan;
use App\Models\ExcelSiswa;
use App\Models\Prestasi;
use App\Models\fileberkas;
use App\Models\Thnpelajaran;
use App\Models\Kelas;
use App\Models\Mutasi;
use Session;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use PDF;
use Validator;

class SiswaController extends Controller
{
    // viewnya //
    public function index(Request $request)
    {
        
        if (isset($request->filter_ajaran)) {
            $filter_ajaran = $request->filter_ajaran;
        } else {
            $filter_ajaran = Thnpelajaran::where('status_thnpelajaran', 1)->first()->id;
        }

        // echo $request->filter_kelas;exit();
        return view('page/siswa/siswa', [
            "title" => "Data Siswa", 
            "kelas" => Kelas::join('thnpelajaran', 'kelas.id_thnpelajaran', '=', 'thnpelajaran.id')
                                ->select('kelas.*', 'thnpelajaran.nama_thnpelajaran')
                                ->where('kelas.id_thnpelajaran', $filter_ajaran)
                                ->get(),
            "ajaran"=>Thnpelajaran::get(),
            "request"=>$request,
            "siswas" => Siswa::leftJoin('alokasi_kelas', 'siswa.id', 'alokasi_kelas.id_siswa')
                            ->select('siswa.*')
                            ->where('status_siswa','=','active')
                            // ->where('alokasi_kelas.id_kelas', $request->filter_kelas)
                            ->filter(request(['search']))
                            ->filterkelas(request(['filter_kelas']))
                            ->orderBy('nmlengkap','asc')
                            ->paginate(10) 
            ]);
    }

    public function siswabaru(Request $request)
    {
        // $thnmasuk = DB::table('siswa')->distinct('thn_masuk')->get();
        // dd($thnmasuk);die;
        return view('page/siswa/siswabaru', [
            "title" => "Data Siswa Baru",
            "siswas" => Siswa::where('thn_masuk', $request->filter_siswabaru)->orderBy('nmlengkap','asc')->get(),
            "thnmasuk"=>Siswa::groupBy('thn_masuk')->get(),
            "request"=>$request,
        ]);
    }

    public function siswamutasi(Request $request)
    {
        return view('page/siswa/siswamutasi', [
            "title" => "Mutasi Siswa",
            "siswas" => Siswa::where('siswa.status_siswa','=','mutasi')
            ->leftjoin('mutasi','mutasi.idsiswa','=','siswa.id')
            ->orderBy('tanggal', 'desc')
            // ->filtermutasi(request(['filter_mutasi']))
            // // ->bulanmutasi(request(['filter_bulanmutasi']))
            // ->whereMonth('tanggal', '7')
            ->get(),
            "request"=>$request, ]);
    }

    public function cetak_pdf(Request $request)
    {
    	$mutasi = Mutasi::orderBy('tanggal', 'desc')->get();
 
    	$pdf = PDF::loadview('/page/siswa/mutasi_pdf',['mutasi'=>$mutasi]);
    	$pdf ->setPaper('a4');
        return $pdf ->stream('laporan-mutasi-pdf',array("Attachment" => false));
    }
    //


    public function tambah($page = 1)
    {
        $siswa = Users::leftjoin('siswa','users.nisn','=','siswa.nisn')->where('users.nisn',Session::get('nisn'))->first();
        $alamat = Alamat::leftjoin('siswa','siswa.id','=','alamat.idsiswa')->where('siswa.id',Session::get('siswaid'))->first();
        $tandabadan = Tandabadan::leftjoin('siswa','siswa.id','=','tandabadan.idsiswa')->where('siswa.id',Session::get('siswaid'))->first();
        $datapendidikan = Datapendidikan::leftjoin('siswa','siswa.id','=','datapendidikan.idsiswa')->where('siswa.id',Session::get('siswaid'))->first();
        $orangtuawali = Orangtuawali::leftjoin('siswa','siswa.id','=','orangtuawali.idsiswa')->where('siswa.id',Session::get('siswaid'))->first();
        $prestasi = prestasi::leftjoin('siswa','siswa.id','=','prestasi.idsiswa')->where('siswa.id',Session::get('siswaid'))->get();
        $hobidanminat = Hobidanminat::leftjoin('siswa','siswa.id','=','hobidanminat.idsiswa')->where('siswa.id',Session::get('siswaid'))->get();
        $peminatan = Peminatan::leftjoin('siswa','siswa.id','=','peminatan.idsiswa')->where('siswa.id',Session::get('siswaid'))->first();
        $penyakit = Penyakit::leftjoin('siswa','siswa.id','=','penyakit.idsiswa')->where('siswa.id',Session::get('siswaid'))->get();
        $ijasah = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',Session::get('siswaid'))->where('fileberkas.type','ijasah')->first();
        $kk = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',Session::get('siswaid'))->where('fileberkas.type','kartu keluarga')->first();
        $akta = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',Session::get('siswaid'))->where('fileberkas.type','akta lahir')->first();
        $kis = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',Session::get('siswaid'))->where('fileberkas.type','kis')->first();
        $kip = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',Session::get('siswaid'))->where('fileberkas.type','kip')->first();
        $kks = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',Session::get('siswaid'))->where('fileberkas.type','kks')->first();
        $pkh = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',Session::get('siswaid'))->where('fileberkas.type','pkh')->first();
        $kbs = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',Session::get('siswaid'))->where('fileberkas.type','kbs')->first();
        $ksm = fileberkas::leftjoin('siswa','siswa.id','=','fileberkas.idsiswa')->where('siswa.id',Session::get('siswaid'))->where('fileberkas.type','ksm')->first();

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
        
        return view('page/siswa/tambahsiswa', [
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
        $siswa = Siswa::where('nisn',Session::get('nisn'))->first();
        $siswa->jenissiswa = $request->jenissiswa;
        $siswa->nmjalurmasuk = $request->jalurMasuk;
        $siswa->nmjurusan = $request->nmjurusan;
        $siswa->nisn = $request->nisn;
        $siswa->nmlengkap = $request->namaLengkap;
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

        return redirect('/page/siswa/tambahsiswa/2')->with(['pribadisiswa'=>true, 'pesan'=>'Data Pribadi Berhasil Disimpan']);
    }


    public function inserttempattinggal(Request $request)
    {
        $alamat = Alamat::where('idsiswa',Session::get('siswaid'))->first();
        if(!isset($alamat->id)){
            $alamat = new Alamat;
        }

        $alamat->idsiswa = Session::get('siswaid');
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

        return redirect('/page/siswa/tambahsiswa/3')->with(['pribadisiswa'=>true, 'pesan'=>'Data Alamat Berhasil Disimpan']);
    }
    
    public function inserttandabadan(Request $request)
    {
        $tandabadan = Tandabadan::where('idsiswa',Session::get('siswaid'))->first();
        if(!isset($tandabadan->id)){
            $tandabadan = new Tandabadan;
        }

        $tandabadan->idsiswa = Session::get('siswaid');
        $tandabadan->berat = $request->berat;
        $tandabadan->tinggi = $request->tinggi;
        $tandabadan->lingkep = $request->lingkep;
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
                $penyakit = Penyakit::where('idsiswa',Session::get('siswaid'))->where('penyakit',$request->$name)->first();
                if(!isset($penyakit->penyakit))
                {
                    $penyakit = new Penyakit;
                }
                $penyakit->idsiswa = Session::get('siswaid');
                $penyakit->penyakit = $request->$name;
                $penyakit->tahun = $request->$tahun;
                $penyakit->lamanya = $request->$lama;
                $penyakit->waktu = $request->$waktu;

                $penyakit->save();
            }
        }

        return redirect('/page/siswa/tambahsiswa/4')->with(['tandabadan'=>true, 'pesan'=>'Data Tanda Badan Berhasil Disimpan']);
    }

        public function insertdatapendidikan(Request $request)
    {
        $datapendidikan = Datapendidikan::where('idsiswa',Session::get('siswaid'))->first();
        if(!isset($datapendidikan->id)){
            $datapendidikan = new Datapendidikan;
        }

        $datapendidikan->idsiswa = Session::get('siswaid');
        $datapendidikan->paudformal = $request->paudformal;
        $datapendidikan->paudnonformal = $request->paudnonformal;
        $datapendidikan->namasmp = $request->namasmp;
        $datapendidikan->alamat = $request->alamat;
        $datapendidikan->kota = $request->kota;
        $datapendidikan->tglijazah = $request->tglijazah;
        $datapendidikan->noijazah = $request->noijazah;

        $datapendidikan->save();

        return redirect('/page/siswa/tambahsiswa/5')->with(['pendidikan'=>true, 'pesan'=>'Data Pendidikan Berhasil Disimpan']);
    }

        public function insertorangtuawali(Request $request)
    {
        $orangtuawali = Orangtuawali::where('idsiswa',Session::get('siswaid'))->first();
        if(!isset($orangtuawali->id)){
            $orangtuawali = new Orangtuawali;
        }

        $orangtuawali->idsiswa = Session::get('siswaid');
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

        return redirect('/page/siswa/tambahsiswa/6')->with(['orangtuawali'=>true, 'pesan'=>'Data Orang Tua / Wali Berhasil Disimpan']);
    }

    public function inserthobidanminat(Request $request)
    {
        $hobidanminat = Hobidanminat::where('idsiswa',Session::get('siswaid'))->delete();
        if(isset($request->hobi[0])){
         
            foreach ($request->hobi as $key => $value) {
                $hobidanminat = new Hobidanminat;
                $hobidanminat->nama = $value;
                $hobidanminat->tipe = 'hobi';
                $hobidanminat->idsiswa = Session::get('siswaid');
                $hobidanminat->save();
            }
        }
        
        if(isset($request->cita_cita)){
            foreach ($request->cita_cita as $key => $value) {
                $hobidanminat = new Hobidanminat;
                $hobidanminat->nama = $value;
                $hobidanminat->tipe = 'cita_cita';
                $hobidanminat->idsiswa = Session::get('siswaid');
                $hobidanminat->save();
            }
        }

        if(isset($request->minat_ekskul)){
            foreach ($request->minat_ekskul as $key => $value) {
                $hobidanminat = new Hobidanminat;
                $hobidanminat->nama = $value;
                $hobidanminat->tipe = 'minat_ekskul';
                $hobidanminat->idsiswa = Session::get('siswaid');
                $hobidanminat->save();
            }
        }

        $prestasi = Prestasi::where('idsiswa',Session::get('siswaid'))->delete();

        for ($i=1; $i <= $request->no_prestasi; $i++) { 
            $nama_prestasi = "nama_prestasi".$i;
            $jenis_prestasi = "jenis_prestasi".$i;
            $tahun_prestasi = "tahun_prestasi".$i;
            $penyelenggara = "penyelenggara".$i;
            
            $prestasi = new Prestasi;
            $prestasi->idsiswa = Session::get('siswaid');
            $prestasi->nama_prestasi = $request->$nama_prestasi;
            $prestasi->jenis_prestasi = $request->$jenis_prestasi;
            $prestasi->tahun_prestasi = $request->$tahun_prestasi;
            $prestasi->penyelenggara = $request->$penyelenggara;

            $prestasi->save();

        }

        return redirect('/page/siswa/tambahsiswa/7')->with(['hobiminat'=>true, 'pesan'=>'Data Hobi & Minat Berhasil Disimpan']);
    }

    public function insertpeminatan(Request $request)
    {
        $peminatan = Peminatan::where('idsiswa',Session::get('siswaid'))->first();
        if(!isset($peminatan->id)){
            $peminatan = new Peminatan;
        }

        $peminatan->idsiswa = Session::get('siswaid');
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

        return redirect('/page/siswa/tambahsiswa/8')->with(['peminatan'=>true, 'pesan'=>'Data Peminatan Berhasil Disimpan']);
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

                $fileberkas = Fileberkas::where('idsiswa',Session::get('siswaid'))->where('type','ijasah')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = Session::get('siswaid');
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'ijasah';
                $fileberkas->save();
            }

            if($request->file('kartu_keluarga')!=''){
                $destination = 'files/kartu keluarga';
                $file = $request->file('kartu_keluarga');
                $fileName=  'KK-' . Session::get('id') . '.' . $file->getClientOriginalExtension();
    
                $fileberkas = Fileberkas::where('idsiswa',Session::get('siswaid'))->where('type','kartu keluarga')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = Session::get('siswaid');
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'kartu keluarga';
                $fileberkas->save();
            }

            if($request->file('akta_lahir')!=''){
                $destination = 'files/akta lahir';
                $file = $request->file('akta_lahir');
                $fileName=  'akta-' . Session::get('id') . '.' . $file->getClientOriginalExtension();

                $fileberkas = Fileberkas::where('idsiswa',Session::get('siswaid'))->where('type','akta lahir')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = Session::get('siswaid');
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'akta lahir';
                $fileberkas->save();
            }

            if($request->file('kip')!=''){
                $destination = 'files/kip';
                $file = $request->file('kip');
                $fileName=  'kip-' . Session::get('id') . '.' . $file->getClientOriginalExtension();

                $fileberkas = Fileberkas::where('idsiswa',Session::get('siswaid'))->where('type','kip')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = Session::get('siswaid');
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'kip';
                $fileberkas->save();
            }

            if($request->file('kis')!=''){
                $destination = 'files/kis';
                $file = $request->file('kis');
                $fileName=  'kis-' . Session::get('id') . '.' . $file->getClientOriginalExtension();

                $fileberkas = Fileberkas::where('idsiswa',Session::get('siswaid'))->where('type','kis')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = Session::get('siswaid');
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'kis';
                $fileberkas->save();
            }

            if($request->file('kks')!=''){
                $destination = 'files/kks';
                $file = $request->file('kks');
                $fileName=  'kks-' . Session::get('id') . '.' . $file->getClientOriginalExtension();

                $fileberkas = Fileberkas::where('idsiswa',Session::get('siswaid'))->where('type','kks')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = Session::get('siswaid');
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'kks';
                $fileberkas->save();
            }

            if($request->file('pkh')!=''){
                $destination = 'files/pkh';
                $file = $request->file('pkh');
                $fileName=  'pkh-' . Session::get('id') . '.' . $file->getClientOriginalExtension();

                $fileberkas = Fileberkas::where('idsiswa',Session::get('siswaid'))->where('type','pkh')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = Session::get('siswaid');
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'pkh';
                $fileberkas->save();
            }

            if($request->file('kbs')!=''){
                $destination = 'files/kbs';
                $file = $request->file('kbs');
                $fileName=  'kbs-' . Session::get('id') . '.' . $file->getClientOriginalExtension();

                $fileberkas = Fileberkas::where('idsiswa',Session::get('siswaid'))->where('type','kbs')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = Session::get('siswaid');
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'kbs';
                $fileberkas->save();
            }

            if($request->file('ksm')!=''){
                $destination = 'files/ksm';
                $file = $request->file('ksm');
                $fileName=  'ksm-' . Session::get('id') . '.' . $file->getClientOriginalExtension();

                $fileberkas = Fileberkas::where('idsiswa',Session::get('siswaid'))->where('type','ksm')->first();
                if(!isset($fileberkas->id)){
                    $fileberkas = new Fileberkas;
                }else{
                    unlink($destination.'/'.$fileberkas->nama);
                }
                $file->move($destination,$fileName);

                $fileberkas->idsiswa = Session::get('siswaid');
                $fileberkas->nama = $fileName;
                $fileberkas->format = $file->getClientOriginalExtension();
                $fileberkas->type = 'ksm';
                $fileberkas->save();
            }

            return redirect('/page/siswa/tambahsiswa/8')->with(['fileberkas'=>true, 'pesan'=>'File Berkas Berhasil Disimpan']); 

        }else{
            $errors = $validator->errors();
            echo $errors;
            return redirect('/page/siswa/tambahsiswa/8')->with('gagal', 'File harus format pdf, doc, jpg, png'); 
        }
 
    }


    public function import_excel(Request $request)
	{
		if ($request->file) {
            $file = $request->file;
            $extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
            $fileSize = $file->getSize(); //Get size of uploaded file in bytes
            //Checks to see that the valid file types and sizes were uploaded
            $this->checkUploadedFileProperties($extension, $fileSize);
            // $import = new SiswaExport();
            Excel::import(new SiswaImport($request->thn_masuk), $request->file,'sdadsa');
           
            // dd($import);
            // foreach ($import->data as $user) {
            // //sends email to all users
            // $this->sendEmail($user->email, $user->name);
            // }
            //Return a success response with the number if records uploaded
            //  echo 'records successfully uploaded';
            return redirect()->back();
        } else {
            throw new \Exception('No file was uploaded', Response::HTTP_BAD_REQUEST);
        }
	}

    public function checkUploadedFileProperties($extension, $fileSize) : void
    {
        $valid_extension = array("csv", "xlsx"); //Only want csv and excel files
        $maxFileSize = 2097152; // Uploaded file size limit is 2mb
        if (in_array(strtolower($extension), $valid_extension)) {
            if ($fileSize <= $maxFileSize) {
            } else {
            throw new \Exception('No file was uploaded', Response::HTTP_REQUEST_ENTITY_TOO_LARGE); //413 error
            }
        } else {
            throw new \Exception('Invalid file extension', Response::HTTP_UNSUPPORTED_MEDIA_TYPE); //415 error
        }
    }
}
