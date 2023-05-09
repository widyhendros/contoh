<table>
    <thead>
    <tr>
        <th colspan="16" align="center" bgcolor="red" style="color: white; borde: 3px solid blue">Pribadi Siswa</th>
        <th colspan="12" align="center" bgcolor="green" style="color: white">Tempat Tinggal Siswa</th>
        <th colspan="5" align="center" bgcolor="blue" style="color: white">Tanda Badan Siswa</th>
        <th colspan="4" align="center" bgcolor="yellow" style="color: white">Riwayat Pendidikan Siswa</th>
        <th colspan="48" align="center" bgcolor="red" style="color: white">Orang Tua / Wali Siswa</th>
        <th colspan="32" align="center" bgcolor="green" style="color: white">Peminatan Siswa</th>

    </tr>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">NISN</th>
        <th rowspan="2">NIS</th>
        <th rowspan="2">Nama Lengkap</th>
        <th rowspan="2">Nama Panggilan</th>
        <th rowspan="2">NIK</th>
        <th rowspan="2">Jenis Kelamin</th>
        <th rowspan="2">Status Anak</th>
        <th rowspan="2">Anak Ke</th>
        <th rowspan="2">Saudara Kandung</th>
        <th rowspan="2">Saudara Tiri</th>
        <th rowspan="2">Saudara Angkat</th>
        <th rowspan="2">Tempat Lahir</th>
        <th rowspan="2">Tanggal Lahir</th>
        <th rowspan="2">Agama</th>
        <th rowspan="2">Email</th>
        <th rowspan="2">Alamat</th>
        <th rowspan="2">RT</th>
        <th rowspan="2">RW</th>
        <th rowspan="2">Kelurahan</th>
        <th rowspan="2">Kecamatan</th>
        <th rowspan="2">Kota / Kabupaten</th>
        <th rowspan="2">Kode POS</th>
        <th rowspan="2">Jarak Tempuh</th>
        <th rowspan="2">Waktu Tempuh</th>
        <th rowspan="2">Transportasi</th>
        <th rowspan="2">Telepon Siswa</th>
        <th rowspan="2">No HP Siswa</th>
        <th rowspan="2">Tinggi Badan</th>
        <th rowspan="2">Berat Badan</th>
        <th rowspan="2">LIngkar Kepala</th>
        <th rowspan="2">Berkebutuhan Khusus</th>
        <th rowspan="2">Golongan Darah</th>
        <th rowspan="2">Paud Formal</th>
        <th rowspan="2">Paud Non-Formal</th>
        <th rowspan="2">Asal SMP</th>
        <th rowspan="2">No Ijazah</th>
        <th rowspan="2">Tinggal Bersama</th>
        <th colspan="16">Data Bapak</th>
        <th colspan="16">Data Ibu</th>
        <th colspan="15">Data Wali</th>
        <th rowspan="2">Pilihan Minat 1</th>
        <th rowspan="2">Pilihan Lintas Minat 1</th>
        <th rowspan="2">Pilihan Minat 2</th>
        <th rowspan="2">Pilihan Lintas Minat 2</th>
        <th colspan="5">Semester 1</th>
        <th colspan="5">Semester 2</th>
		<th colspan="5">Semester 3</th>
        <th colspan="5">Semester 4</th>
		<th colspan="5">Semester 5</th>
        <th rowspan="2">Hobi</th>
        <th rowspan="2">Cita Cita</th>
        <th rowspan="2">Minat Ekskul</th>
    </tr>
    <tr>
        {{-- bpk --}}
            <th>Nama</th>
            <th>Keadaan</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Pendidikan Terakhir</th>
            <th>Jalan</th>
            <th>RT</th>
            <th>RW</th>
            <th>Kelurahan</th>
            <th>Kecamatan</th>
            <th>Kota</th>
            <th>Kode POS</th>
            <th>Telepon</th>
            <th>No HP</th>
            <th>Profesi</th>
            <th>Penghasilan</th>
    
            {{--  --}}
            <th>Nama</th>
            <th>Keadaan</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Pendidikan Terakhir</th>
            <th>Jalan</th>
            <th>RT</th>
            <th>RW</th>
            <th>Kelurahan</th>
            <th>Kecamatan</th>
            <th>Kota</th>
            <th>Kode POS</th>
            <th>Telepon</th>
            <th>No HP</th>
            <th>Profesi</th>
            <th>Penghasilan</th>
            {{--  --}}
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Pendidikan Terakhir</th>
            <th>Jalan</th>
            <th>RT</th>
            <th>RW</th>
            <th>Kelurahan</th>
            <th>Kecamatan</th>
            <th>Kota</th>
            <th>Kode POS</th>
            <th>Telepon</th>
            <th>No HP</th>
            <th>Profesi</th>
            <th>Penghasilan</th>
            
            <th>Indonesia</th>
            <th>Inggris</th>
            <th>Matematika</th>
            <th>IPA</th>
            <th>IPS</th>
            
            <th>Indonesia</th>
            <th>Inggris</th>
            <th>Matematika</th>
            <th>IPA</th>
            <th>IPS</th>
            
            <th>Indonesia</th>
            <th>Inggris</th>
            <th>Matematika</th>
            <th>IPA</th>
            <th>IPS</th>
            
            <th>Indonesia</th>
            <th>Inggris</th>
            <th>Matematika</th>
            <th>IPA</th>
            <th>IPS</th>
            
            <th>Indonesia</th>
            <th>Inggris</th>
            <th>Matematika</th>
            <th>IPA</th>
            <th>IPS</th>
        </tr>
    </thead>
    <tbody>
    @foreach($siswa as $key=> $row)
        <tr>
            <td>{{ $key+1 }}</td>
            {{-- Siswa --}}
            <td>{{ $row->nisn }}</td>
            <td>{{ $row->nis }}</td>
            <td>{{ $row->nmlengkap }}</td>
            <td>{{ $row->nmpanggilan }}</td>
            <td>{{ $row->nik }}</td>
            <td>{{ $row->jk }}</td>
            <td>{{ $row->statusanak }}</td>
            <td>{{ $row->anakke }}</td>
            <td>{{ $row->jmlsaudarakandung }}</td>
            <td>{{ $row->jmlsaudaratiri }}</td>
            <td>{{ $row->jmlsaudaraangkat }}</td>
            <td>{{ $row->tmplahir }}</td>
            <td>{{ $row->tanggallahir }}</td>
            <td>{{ $row->agama }}</td>
            <td>{{ $row->email }}</td>
            {{-- alamat --}}
            <td>{{ $row->jalan }}</td>
            <td>{{ $row->rt }}</td>
            <td>{{ $row->rw }}</td>
            <td>{{ $row->kelurahan }}</td>
            <td>{{ $row->kecamatan }}</td>
            <td>{{ $row->kota }}</td>
            <td>{{ $row->kodepos }}</td>
            <td>{{ $row->jarak }}</td>
            <td>{{ $row->wkttempuh }}</td>
            <td>{{ $row->transportasi }}</td>
            <td>{{ $row->telprumah }}</td>
            <td>{{ $row->nohp }}</td>
            {{-- tanda badan --}}
            <td>{{ $row->tinggi }}</td>
            <td>{{ $row->berat }}</td>
            <td>{{ $row->lingkep }}</td>
            <td>{{ $row->kebutuhan }}</td>
            <td>{{ $row->golongandarah }}</td>
            {{-- pendidikan --}}
            <td>{{ $row->paudformal }}</td>
            <td>{{ $row->paudnonformal }}</td>
            <td>{{ $row->namasmp }}</td>
            <td>{{ $row->noijazah }}</td>
            {{-- orangtuawali --}}
            <td>{{ $row->tinggalbersama }}</td>
            {{-- bpk --}}
            <td>{{ $row->nmbapak }}</td>
            <td>{{ $row->keadaanbpk }}</td>
            <td>{{ $row->tmptlahirbpk }}</td>
            <td>{{ $row->tgllahirbpk }}</td>
            <td>{{ $row->pendidikantertinggibpk }}</td>
            <td>{{ $row->jalanbpk }}</td>
            <td>{{ $row->rtbpk }}</td>
            <td>{{ $row->rwbpk }}</td>
            <td>{{ $row->kelurahanbpk }}</td>
            <td>{{ $row->kecamatanbpk }}</td>
            <td>{{ $row->kotabpk }}</td>
            <td>{{ $row->kodeposbpk }}</td>
            <td>{{ $row->telprumahbpk }}</td>
            <td>{{ $row->nohpbpk }}</td>
            <td>{{ $row->profesibpk }}</td>
            <td>{{ $row->penghasilanbpk }}</td>
            {{-- ibu --}}
            <td>{{ $row->nmibu }}</td>
            <td>{{ $row->keadaanibu }}</td>
            <td>{{ $row->tmptlahiribu }}</td>
            <td>{{ $row->tgllahiribu }}</td>
            <td>{{ $row->pendidikantertinggiibu }}</td>
            <td>{{ $row->jalanibu }}</td>
            <td>{{ $row->rtibu }}</td>
            <td>{{ $row->rwibu }}</td>
            <td>{{ $row->kelurahanibu }}</td>
            <td>{{ $row->kecamatanibu }}</td>
            <td>{{ $row->kotaibu }}</td>
            <td>{{ $row->kodeposibu }}</td>
            <td>{{ $row->telprumahibu }}</td>
            <td>{{ $row->nohpibu }}</td>
            <td>{{ $row->profesiibu }}</td>
            <td>{{ $row->penghasilanibu }}</td>
            {{-- wali --}}
            <td>{{ $row->nmwali }}</td>
            <td>{{ $row->tmptlahirwali }}</td>
            <td>{{ $row->tgllahirwali }}</td>
            <td>{{ $row->pendidikantertinggiwali }}</td>
            <td>{{ $row->jalanwali }}</td>
            <td>{{ $row->rtwali }}</td>
            <td>{{ $row->rwwali }}</td>
            <td>{{ $row->kelurahanwali }}</td>
            <td>{{ $row->kecamatanwali }}</td>
            <td>{{ $row->kotawali }}</td>
            <td>{{ $row->kodeposwali }}</td>
            <td>{{ $row->telprumahwali }}</td>
            <td>{{ $row->nohpwali }}</td>
            <td>{{ $row->profesiwali }}</td>
            <td>{{ $row->penghasilanwali }}</td>
            {{-- Peminatan --}}
            <td>{{ $row->pilminatsatu }}</td>
            <td>{{ $row->linminpilsatu }}</td>
            <td>{{ $row->pilminatdua }}</td>
            <td>{{ $row->linminpildua }}</td>
            {{-- raport --}}
            <td>{{ $row->bindosatu }}</td>
            <td>{{ $row->bindodua }}</td>
            <td>{{ $row->bindotiga }}</td>
            <td>{{ $row->bindoempat }}</td>
            <td>{{ $row->bindolima }}</td>
            <td>{{ $row->bingsatu }}</td>
            <td>{{ $row->bingdua }}</td>
            <td>{{ $row->bingtiga }}</td>
            <td>{{ $row->bingempat }}</td>
            <td>{{ $row->binglima }}</td>
            <td>{{ $row->mtksatu }}</td>
            <td>{{ $row->mtkdua }}</td>
            <td>{{ $row->mtktiga }}</td>
            <td>{{ $row->mtkempat }}</td>
            <td>{{ $row->mtklima }}</td>
            <td>{{ $row->ipasatu }}</td>
            <td>{{ $row->ipadua }}</td>
            <td>{{ $row->ipatiga }}</td>
            <td>{{ $row->ipaempat }}</td>
            <td>{{ $row->ipalima }}</td>
            <td>{{ $row->ipssatu }}</td>
            <td>{{ $row->ipsdua }}</td>
            <td>{{ $row->ipstiga }}</td>
            <td>{{ $row->ipsempat }}</td>
            <td>{{ $row->ipslima }}</td>
            <td>
                @php
                    $cita = $row->hobidanminat->filter(function ($value, $key) {
                        return $value->tipe == "cita_cita";
                    });
                    $hobi = $row->hobidanminat->filter(function ($value, $key) {
                        return $value->tipe == "hobi";
                    });
                    $minat_ekskul = $row->hobidanminat->filter(function ($value, $key) {
                        return $value->tipe == "minat_ekskul";
                    });
                @endphp 
                @foreach ($cita as $item)
                    {{ $item->nama }},
                @endforeach
            </td>
            <td>
                @foreach ($hobi as $item)
                    {{ $item->nama }},
                @endforeach
            </td>
            <td>
                @foreach ($minat_ekskul as $item)
                    {{ $item->nama }},
                @endforeach
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

