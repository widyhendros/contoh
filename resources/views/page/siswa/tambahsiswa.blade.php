<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>{{ $title }}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Siswa</li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Siswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="card border border-success border-3">
            <div class="card-header ">
                <h4 class="card-title">Selamat, Anda diterima di SMA Negeri 21 Bandung</h4>
            </div>
            <div class="card-body">
                <ul>
                    <li>Mohon Untuk melengkapi data dibawah ini dengan benar menggunakan <span
                            class="text-danger"><b>HURUF KAPITAL</b></span></li>
                    <li>Baca Petunjuk pengisian data pada kotak berwarna kuning dengan teliti</li>
                    <li>Data Pribadi Terkhusus Nama Siswa dan Nama Orang Ayah/ Ibu disesuaikan dengan <span
                            class="text-danger"><b>IJAZAH SMP atau AKTE KELAHIRAN atau KARTU KELUARGA</b></span></li>
                    <li>Tombol berwarna Merah adalah form yang anda harus isi,tombol yang sudah berwarna Hijau berarti
                        sudah anda isi</li>
                    <li>Update seputar kegiatan MPLS sekolah dapat dilihat di website sekolah <a
                            href="">www.sman21bandung.sch.id/ppdb</a></li>
                </ul>
            </div>
        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $page == 1 ? 'active' : '' }}" id="pills-datasiswa-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-datasiswa" type="button" role="tab" aria-controls="pills-datasiswa"
                    aria-selected="true"><span class="bi bi-person">
                    </span><span class="title">Data Pribadi Siswa / i</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $page == 2 ? 'active' : '' }}" id="pills-tempattinggal-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-tempattinggal" type="button" role="tab"
                    aria-controls="pills-tempattinggal" aria-selected="false"><span class="bi bi-house-door">
                    </span><span class="title">Data Tempat Tingal</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $page == 3 ? 'active' : '' }}" id="pills-tandabadan-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-tandabadan" type="button" role="tab"
                    aria-controls="pills-tandabadan" aria-selected="false"><span class="bi bi-heart-pulse">
                    </span><span class="title">Data Tanda Badan</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $page == 4 ? 'active' : '' }}" id="pills-pendidikan-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-pendidikan" type="button" role="tab"
                    aria-controls="pills-pendidikan" aria-selected="false"><span class="bi bi-book">
                    </span><span class="title">Data Pendidikan</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $page == 5 ? 'active' : '' }}" id="pills-orangtuawali-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-orangtuawali" type="button" role="tab"
                    aria-controls="pills-orangtuawali" aria-selected="false"><span class="bi bi-people">
                    </span><span class="title"> Data Orang tua / Wali</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $page == 6 ? 'active' : '' }}" id="pills-hobiminat-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-hobiminat" type="button" role="tab" aria-controls="pills-hobiminat"
                    aria-selected="false"><span class="bi bi-journal-check">
                    </span><span class="title"> Data Hobi & Minat</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $page == 7 ? 'active' : '' }}" id="pills-oeminatan-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-peminatan" type="button" role="tab" aria-controls="pills-peminatan"
                    aria-selected="false"><span class="bi bi-clipboard2-check">
                    </span><span class="title"> Data Peminatan</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $page == 8 ? 'active' : '' }}" id="pills-scanberkas-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-scanberkas" type="button" role="tab" aria-controls="pills-scanberkas"
                    aria-selected="false"><span class="bi bi-folder">
                    </span><span class="title"> Data Berkas</span></button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <!-- DATA PRIBADI SISWA  -->
            <div class="tab-pane fade {{ $page == 1 ? 'show active' : '' }}" id="pills-datasiswa" role="tabpanel"
                aria-labelledby="pills-datasiswa-tab">
                <form enctype="multipart/form-data" action="{{route('insertpribadisiswa')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-success">
                            <h4 class="card-title text-white  mb-0">Data Pribadi Siswa / Siswi</h4>
                        </div>
                        <div class="card-body px-12 border border-success">
                            <div class="row mt-4">
                                {{-- <div class="mb-0 row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Jenis Siswa Baru</label>
                                    <div class="col-md-3">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="jenissiswa">
                                                <option value="">[ PILIH ]</option>
                                                <option value="Siswa Baru" @if($siswa->jenissiswa == 'Siswa Baru')
                                                    selected="selected" @endif>Siswa Baru</option>
                                                <option value="Siswa Pindahan" @if($siswa->jenissiswa == 'Siswa
                                                    Pindahan') selected="selected" @endif>Siswa Pindahan</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div> --}}
                                {{-- <div class="mb-2 row mt-3">
                                    <label for="nis" class="col-sm-3 col-form-label">NIS</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control text-center" id="nis"
                                            value="@if(isset($siswa->nis)) {{$siswa->nis}} @endif" readonly>
                                    </div>
                                </div>
                                <hr class="mt-3"> --}}

                        <div class="mb-0 row " hidden>
                            <label for="inputPassword" class="col-sm-3 col-form-label">Jalur</label>
                            <div class="col-md-2">
                                <fieldset class="form-group" >
                                    <select class="form-select" id="jalurMasuk" name="jalurMasuk" readonly>
                                        <option value="">[ PILIH ]</option>
                                        <option value="ABK" @if($siswa->nmjalurmasuk == 'ABK')
                                            selected="selected" @endif>ABK</option>
                                        <option value="KETM" @if($siswa->nmjalurmasuk == 'KETM')
                                            selected="selected" @endif>KETM</option>
                                            <option value="Perpindahan" @if($siswa->nmjalurmasuk == 'Perpindahan')
                                                selected="selected" @endif>Perpindahan</option>
                                        <option value="Kondisi Tertentu" @if($siswa->nmjalurmasuk == 'Kondisi Tertentu')
                                            selected="selected" @endif>Kondisi Tertentu</option>
                                        <option value="Prestasi Kejuaraan" @if($siswa->nmjalurmasuk == 'Prestasi Kejuaraan')
                                            selected="selected" @endif>Prestasi Kejuaraan</option>
                                        <option value="Prestasi Rapor" @if($siswa->nmjalurmasuk == 'Prestasi Rapor')
                                            selected="selected" @endif>Prestasi Rapor</option>
                                        <option value="Zonasi" @if($siswa->nmjalurmasuk == 'Zonasi')
                                            selected="selected" @endif>Zonasi</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        {{--<div class="mb-0 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Jurusan</label>
                            <div class="col-md-2">
                                <fieldset class="form-group">
                                    <select class="form-select" id="jurusan" name="nmjurusan">
                                        <option value="">[ PILIH ]</option>
                                        <option value="MIPA" @if($siswa->nmjurusan == 'MIPA')
                                            selected="selected" @endif >MIPA</option>
                                        <option value="IPS" @if($siswa->nmjurusan == 'IPS') selected="selected"
                                            @endif>IPS</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <hr class="mt-3"> --}}
                                <div class="mb-0 row mt-3">
                                    <label for="namalengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-7">
                                        <input type="text"
                                            class="form-control @error('namaLengkap') is-invalid @enderror"
                                            id="namaLengkap" name="namaLengkap"
                                            value="@if(isset($siswa->nmlengkap)) {{$siswa->nmlengkap}} @endif" required>
                                    </div>
                                </div>
                                <div class="mb-0 row mt-3">
                                    <label for="panggilan" class="col-md-3 col-form-label">Nama Kecil /
                                        Panggilan</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="panggilan" name="panggilan"
                                            value="@if(isset($siswa->nmpanggilan)) {{$siswa->nmpanggilan}} @endif"
                                            required>

                                    </div>
                                </div>
                                <div class="mb-0 row mt-3">
                                    <label for="nisn" class="col-sm-3 col-form-label">NISN</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control text-center" id="nisn" name="nisn"
                                            maxlength="10" value="{{$siswa->nisn==null ?0:$siswa->nisn;}}"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            readonly>
                                        {{-- <input type="text" class="form-control" id="nisn"  readonly> --}}
                                    </div>
                                </div>
                                <div class="mb-0 row mt-3">
                                    <label for="nik" class="col-md-3 col-form-label">Nomor Induk
                                        Kependudukan</label>
                                    <div class="col-md-3">
                                        <input type="number"
                                            class="form-control text-center @error('nik') is-invalid @enderror"
                                            maxlength="16" id="nik" name="nik"
                                            value="{{$siswa->nik==null ?0:$siswa->nik;}}"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            required>
                                        @error('nik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-0 row mt-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-md-2">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="gender" name="jk" required>
                                                <option value="">[ PILIH ]</option>
                                                <option value="Laki-Laki" @if($siswa->jk == 'Laki-Laki')
                                                    selected="selected" @endif>Laki-laki</option>
                                                <option value="Perempuan" @if($siswa->jk == 'Perempuan')
                                                    selected="selected" @endif>Perempuan</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="mb-0 row">
                                    <label for="inputPassword" class="col-md-3 col-form-label">Status Anak dalam
                                        keluarga</label>
                                    <div class="col-md-2">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="statusanak" required>
                                                <option value="">[ PILIH ]</option>
                                                <option value="kandung" @if($siswa->statusanak == 'kandung')
                                                    selected="selected" @endif>Kandung</option>
                                                <option value="tiri" @if($siswa->statusanak == 'tiri')
                                                    selected="selected" @endif>Tiri</option>
                                                <option value="angkat" @if($siswa->statusanak == 'angkat')
                                                    selected="selected" @endif>Angkat</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="mb-0 row mt-3">
                                    <label for="anakke" class="col-sm-3 col-form-label">Anak Ke </label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" name="anakke" maxlength="2"
                                            value="{{$siswa->anakke}}" required
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                </div>
                                <div class="mb-0 row mt-3">
                                    <label for="jmlsudarakandung" class="col-md-3 col-form-label">Jumlah Saudara
                                        Kandung</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="kandung" name="jmlsaudarakandung"
                                            maxlength="3"
                                            value="{{$siswa->jmlsaudarakandung==null ?0:$siswa->jmlsaudarakandung;}}"
                                            required
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                </div>
                                <div class="mb-0 row mt-3">
                                    <label for="jmlsaudaratiri" class="col-md-3 col-form-label">Jumlah Saudara
                                        Tiri</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="tiri" name="jmlsaudaratiri"
                                            maxlength="3"
                                            value="{{$siswa->jmlsaudaratiri==null ?0:$siswa->jmlsaudaratiri;}}" required
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                </div>
                                <div class="mb-0 row mt-3">
                                    <label for="jmlsaudaraangkat" class="col-md-3 col-form-label">Jumlah Saudara
                                        Angkat</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="angkat" name="jmlsaudaraangkat"
                                            maxlength="3"
                                            value="{{$siswa->jmlsaudaraangkat==null ?0:$siswa->jmlsaudaraangkat;}}"
                                            required
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                </div>
                                <div class="mb-0 row mt-3">
                                    <label for="tmptlahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="tmplahir" name="tmplahir"
                                            value="@if(isset($siswa->tmplahir)) {{$siswa->tmplahir}} @endif" required>
                                    </div>
                                </div>
                                <div class="mb-0 row mt-3">
                                    <label for="tgllahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" id="tanggallahir" name="tanggallahir"
                                            required value=@if(isset($siswa->tanggallahir)) {{$siswa->tanggallahir}}
                                        @endif>
                                    </div>
                                </div>
                                <div class="mb-0 row mt-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-md-3">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="agama" required>
                                                <option value="">[ PILIH ]</option>
                                                <option value="Islam" @if($siswa->agama == 'Islam') selected="selected"
                                                    @endif>Islam</option>
                                                <option value="Kristen Protestan" @if($siswa->agama == 'Kristen
                                                    Protestan') selected="selected" @endif>Kristen Protestan</option>
                                                <option value="Kristen Katolik" @if($siswa->agama == 'Kristen Katolik')
                                                    selected="selected" @endif>Kristen Katolik</option>
                                                <option value="Hindu" @if($siswa->agama == 'Hindu') selected="selected"
                                                    @endif>Hindu</option>
                                                <option value="Budha" @if($siswa->agama == 'Budha') selected="selected"
                                                    @endif>Budha</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="mb-5 row mt-3">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-md-5">
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="@if(isset($siswa->email)) {{$siswa->email}} @endif" required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-success me-md-2" type="submit"><span><i class="bi bi-save"></i>
                                        SIMPAN</span></button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <!-- DATA TEMPAT TINGGAL  -->
            <div class="tab-pane fade {{ $page == 2 ? 'show active' : '' }}" id="pills-tempattinggal" role="tabpanel"
                aria-labelledby="pills-tempattinggal-tab">
                <form enctype="multipart/form-data" action="{{route('inserttempattinggal')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-success">
                            <h4 class="card-title text-white  mb-0">Data Tempat Tinggal</h4>
                        </div>
                        <div class="card-body px-12 border border-success">
                            <div class="row mt-4">
                                <div class="mb-2 row mt-3">
                                    <div class="col-sm-3">
                                        <label for="nis" class="col-form-label">Alamat Rumah</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div>
                                            <label for="nis" class="col-form-label">Jalan / Gg / Kp.</label>
                                        </div>
                                        <div>
                                            <input type="text" class="col-sm-12 form-control" id="jalan" name="jalan"
                                                value="@if(isset($alamat->jalan)) {{$alamat->jalan}} @endif" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <label for="nis" class="col-form-label">RT</label>
                                                </div>
                                                <div>
                                                    <input type="number" class="form-control" id="rt" name="rt"
                                                        maxlength="2" value="{{!isset($alamat->rt) ?"":$alamat->rt;}}"
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <label for="nis" class="col-form-label">RW</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="number" class="form-control" id="rw" name="rw"
                                                    maxlength="2"
                                                    value="{{!isset($alamat->rw) ?"":$alamat->rw;}}"
                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                    required>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="nis" class="col-form-label">Kelurahan / Desa</label>
                                        </div>
                                        <div>
                                            <input type="text" class="col-sm-12 form-control" id="kelurahan"
                                                name="kelurahan"
                                                value="@if(isset($alamat->kelurahan)) {{$alamat->kelurahan}} @endif"
                                                required>
                                        </div>
                                        <div>
                                            <label for="nis" class="col-form-label">Kecamatan</label>
                                        </div>
                                        <div>
                                            <input type="text" class="col-sm-12 form-control" id="kecamatan"
                                                name="kecamatan"
                                                value="@if(isset($alamat->kecamatan)) {{$alamat->kecamatan}} @endif"
                                                required>
                                        </div>
                                        <div>
                                            <label for="nis" class="col-form-label">Kabupaten / Kota</label>
                                        </div>
                                        <div>
                                            <input type="text" class="col-sm-12 form-control" id="kota" name="kota"
                                                value="@if(isset($alamat->kota)) {{$alamat->kota}} @endif" required>
                                        </div>
                                        <div>
                                            <label for="nis" class="col-form-label">Kode POS</label>
                                        </div>
                                        <div>
                                            <input type="number" class="form-control" id="kodepos" name="kodepos"
                                                maxlength="5"
                                                value="{{!isset($alamat->kodepos) ?"":$alamat->kodepos;}}"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                required>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <label for="nis" class="col-form-label">Jarak ke Sekolah</label>
                                                </div>
                                                <div class="input-group mb-0">
                                                    <input type="number" class="form-control"
                                                        aria-describedby="basic-addon2" name="jarak"
                                                        maxlength="6"
                                                        value="{{!isset($alamat->jarak) ?"":$alamat->jarak;}}"
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        required>
                                                    <span class="input-group-text" id="basic-addon2">Meter</span>
                                                    
                                                </div>
                                                <div class="row mt-0">
                                                    <div class="col-md-12">
                                                        <small class="text-danger">( Jarak dalam METER, Jika Jarak 1 KM, Masukan 1000 ( Hanya Angka) )</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <label for="nis" class="col-form-label">Waktu Tempuh</label>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control"
                                                        aria-describedby="basic-addon2" name="wkttempuh"
                                                        maxlength="3"
                                                        value="{{!isset($alamat->wkttempuh) ?"":$alamat->wkttempuh;}}"
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        required>
                                                    <span class="input-group-text" id="basic-addon2">Menit</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0 row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Moda Transportasi</label>
                                    <div class="col-sm-3">
                                        <fieldset class="form-group">
                                            <select class="form-select " id="basicSelect" name="transportasi" required>
                                                <option value="">[ PILIH ]</option>
                                                <option value="Mobil Pribadi" @if(isset($alamat->transportasi))
                                                    @if($alamat->transportasi == 'Mobil Pribadi') selected="selected"
                                                    @endif @endif>Mobil Pribadi</option>
                                                <option value="Sepedah Motor" @if(isset($alamat->transportasi))
                                                    @if($alamat->transportasi == 'Sepedah Motor') selected="selected"
                                                    @endif @endif>Sepeda Motor</option>
                                                <option value="Kendaraan Umum" @if(isset($alamat->transportasi))
                                                    @if($alamat->transportasi == 'Kendaraan Umum') selected="selected"
                                                    @endif @endif>Kendaraan Umum</option>
                                                <option value="Sepedah" @if(isset($alamat->transportasi))
                                                    @if($alamat->transportasi == 'Sepedah') selected="selected" @endif
                                                    @endif>Sepeda</option>
                                                <option value="Jalan Kaki" @if(isset($alamat->transportasi))
                                                    @if($alamat->transportasi == 'Jalan Kaki') selected="selected"
                                                    @endif @endif>Jalan Kaki</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <hr class="mt-3">
                                <div class="mb-0 row mt-3">
                                    <label for="telprumah" class="col-sm-3 col-form-label">Telepon Rumah</label>
                                    <div class="col-sm-5">
                                        <input type="number" class="form-control" id="telprumah" name="telprumah"
                                            maxlength="10" 
                                            value="{{!isset($alamat->telprumah) ?"":$alamat->telprumah;}}"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                </div>
                                <div class="mb-5 row mt-3">
                                    <label for="number" class="col-sm-3 col-form-label">Nomor HP</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="nohp" name="nohp" maxlength="13"
                                            value="{{!isset($alamat->nohp) ?"":$alamat->nohp;}}"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            required>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-success me-md-2" type="submit"><span><i
                                                class="bi bi-save"></i>
                                            SIMPAN</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- DATA TANDA BADAN  -->
            <div class="tab-pane fade {{ $page == 3 ? 'show active' : '' }}" id="pills-tandabadan" role="tabpanel"
                aria-labelledby="pills-tandabadan-tab">
                <form enctype="multipart/form-data" action="{{route('inserttandabadan')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-success">
                            <h4 class="card-title text-white  mb-0">Data Tanda Badan</h4>
                        </div>
                        <div class="card-body px-12 border border-success">
                            <div class="row mt-4">
                                <div class="mb-2 row mt-3">
                                    <div class="col-sm-3">
                                        <label for="nis" class="col-form-label">Tanda Badan</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <div>
                                                    <label for="nis" class="col-form-label">Berat Badan</label>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control text-center" id="berat"
                                                        name="berat" maxlength="3"
                                                        value="{{!isset($tandabadan->berat) ?"":$tandabadan->berat;}}"
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                         required>
                                                    <span class="input-group-text" id="basic-addon2">Kg</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div>
                                                    <label for="nis" class="col-form-label">Tinggi Badan</label>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control text-center" id="tinggi"
                                                        name="tinggi" maxlength="3"
                                                        value="{{!isset($tandabadan->tinggi) ?"":$tandabadan->tinggi;}}"
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        required>
                                                    <span class="input-group-text" id="basic-addon2">Cm</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div>
                                                    <label for="nis" class="col-form-label">Lingkar Kepala</label>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control text-center" id="lingkep"
                                                        name="lingkep" maxlength="3"
                                                        value="{{!isset($tandabadan->lingkep) ?"":$tandabadan->lingkep;}}"
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        required>
                                                    <span class="input-group-text" id="basic-addon2">Cm</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <label for="nis" class="col-form-label">Berkebutuhan Khusus</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <fieldset class="form-group">
                                                        <select class="form-select text-center" id="basicSelect"
                                                            name="kebutuhan">
                                                            <option value="">[ PILIH ]</option>
                                                            <option value="Netra" @if(isset($tandabadan->kebutuhan))
                                                                @if($tandabadan->kebutuhan == 'Netra')
                                                                selected="selected"
                                                                @endif @endif>Netra</option>
                                                            <option value="Rungu" @if(isset($tandabadan->kebutuhan))
                                                                @if($tandabadan->kebutuhan == 'Rungu')
                                                                selected="selected"
                                                                @endif @endif>Rungu</option>
                                                            <option value="Grahita Ringan" @if(isset($tandabadan->
                                                                kebutuhan))
                                                                @if($tandabadan->kebutuhan == 'Grahita Ringan')
                                                                selected="selected" @endif @endif>Grahita Ringan
                                                            </option>
                                                            <option value="Grahita Sedang" @if(isset($tandabadan->
                                                                kebutuhan))
                                                                @if($tandabadan->kebutuhan == 'Grahita Sedang')
                                                                selected="selected" @endif @endif>Grahita Sedang
                                                            </option>
                                                            <option value="Daksa Ringan" @if(isset($tandabadan->
                                                                kebutuhan))
                                                                @if($tandabadan->kebutuhan == 'Daksa Ringan')
                                                                selected="selected" @endif @endif>Daksa Ringan</option>
                                                            <option value="Daksa Sedang" @if(isset($tandabadan->
                                                                kebutuhan))
                                                                @if($tandabadan->kebutuhan == 'Daksa Sedang')
                                                                selected="selected" @endif @endif>Daksa Sedang</option>
                                                            <option value="Laras" @if(isset($tandabadan->kebutuhan))
                                                                @if($tandabadan->kebutuhan == 'Laras')
                                                                selected="selected"
                                                                @endif @endif>Laras</option>
                                                            <option value="Hyperaktif" @if(isset($tandabadan->
                                                                kebutuhan))
                                                                @if($tandabadan->kebutuhan == 'Hyperaktif')
                                                                selected="selected"
                                                                @endif @endif>Hyperaktif</option>
                                                            <option value="Cerdas Istimewa" @if(isset($tandabadan->
                                                                kebutuhan))
                                                                @if($tandabadan->kebutuhan == 'Cerdas Istimewa')
                                                                selected="selected" @endif @endif>Cerdas Istimewa
                                                            </option>
                                                            <option value="Bakat Istimewa" @if(isset($tandabadan->
                                                                kebutuhan))
                                                                @if($tandabadan->kebutuhan == 'Bakat Istimewa')
                                                                selected="selected" @endif @endif>Bakat Istimewa
                                                            </option>
                                                            <option value="Kesulitan Belajar" @if(isset($tandabadan->
                                                                kebutuhan))
                                                                @if($tandabadan->kebutuhan == 'Kesulitan Belajar')
                                                                selected="selected" @endif @endif>Kesulitan Belajar
                                                            </option>
                                                            <option value="Narkoba" @if(isset($tandabadan->kebutuhan))
                                                                @if($tandabadan->kebutuhan == 'Narkoba')
                                                                selected="selected"
                                                                @endif @endif>Narkoba</option>
                                                            <option value="Indigo" @if(isset($tandabadan->kebutuhan))
                                                                @if($tandabadan->kebutuhan == 'Indigo')
                                                                selected="selected"
                                                                @endif @endif>Indigo</option>
                                                            <option value="Down Syndrome" @if(isset($tandabadan->
                                                                kebutuhan))
                                                                @if($tandabadan->kebutuhan == 'Down Syndrome')
                                                                selected="selected" @endif @endif>Down Syndrome</option>
                                                            <option value="Autis" @if(isset($tandabadan->kebutuhan))
                                                                @if($tandabadan->kebutuhan == 'Autis')
                                                                selected="selected"
                                                                @endif @endif>Autis</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <label for="nis" class="col-form-label">Golongan Darah</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <fieldset class="form-group">
                                                        <select class="form-select text-center" id="basicSelect"
                                                            name="golongandarah" required>
                                                            <option value="">[ PILIH ]</option>
                                                            <option value="A" @if(isset($tandabadan->golongandarah))
                                                                @if($tandabadan->golongandarah == 'A')
                                                                selected="selected"
                                                                @endif @endif>A</option>
                                                            <option value="B" @if(isset($tandabadan->golongandarah))
                                                                @if($tandabadan->golongandarah == 'B')
                                                                selected="selected"
                                                                @endif @endif>B</option>
                                                            <option value="AB" @if(isset($tandabadan->golongandarah))
                                                                @if($tandabadan->golongandarah == 'AB')
                                                                selected="selected"
                                                                @endif @endif>AB</option>
                                                            <option value="O" @if(isset($tandabadan->golongandarah))
                                                                @if($tandabadan->golongandarah == 'O')
                                                                selected="selected"
                                                                @endif @endif>O</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-3">

                                <div class="card border border-warning border-3">
                                    <div class="card-header ">
                                        <h4 class="card-title text-warning">DATA PENYAKIT YANG PERNAH DIDERITA</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            <li>Jika tidak ada penyakit yang pernah diderita,data boleh tidak diisi</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mb-2 row mt-1">
                                    <div class="col-sm-3">
                                        <label for="nis" class="col-form-label">Penyakit yang pernah diderita</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="nis" class="col-form-label">Penyakit</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="nis" class="col-form-label">Tahun</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="nis" class="col-form-label">Lamanya</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4 mb-md-3">
                                                <label for="nis" class="col-form-label">Hepatitis</label>
                                                <input name="nama1" value="hepatitis" hidden>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="year" class="form-control" name="tahun1"
                                                    value="@if(array_search('hepatitis', $arraypenyakit) !="") {{$penyakit[array_search('hepatitis', $arraypenyakit)]->tahun }} @endif">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        aria-label="Text input with dropdown button" name="lama1"
                                                        value="@if(array_search('hepatitis', $arraypenyakit) !="") {{$penyakit[array_search('hepatitis', $arraypenyakit)]->lamanya }} @endif">
                                                    <select class="form-select" id="basicSelect" name="waktu1">
                                                        <option value="">[ PILIH ]</option>
                                                        <option value="hari" @if(array_search('hepatitis',
                                                            $arraypenyakit) !="" )
                                                            @if($penyakit[array_search('hepatitis', $arraypenyakit)]->
                                                            waktu == 'hari') selected="selected" @endif @endif>Hari
                                                        </option>
                                                        <option value="bulan" @if(array_search('hepatitis',
                                                            $arraypenyakit) !="" )
                                                            @if($penyakit[array_search('hepatitis', $arraypenyakit)]->
                                                            waktu == 'bulan') selected="selected" @endif @endif>Bulan
                                                        </option>
                                                        <option value="tahun" @if(array_search('hepatitis',
                                                            $arraypenyakit) !="" )
                                                            @if($penyakit[array_search('hepatitis', $arraypenyakit)]->
                                                            waktu == 'tahun') selected="selected" @endif @endif>Tahun
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <label for="nis" class="col-form-label">Malaria</label>
                                                <input name="nama2" value="malaria" hidden>

                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="tahun2"
                                                    value="@if(array_search('malaria', $arraypenyakit) !="") {{$penyakit[array_search('malaria', $arraypenyakit)]->tahun }} @endif">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        aria-label="Text input with dropdown button" name="lama2"
                                                        value="@if(array_search('malaria', $arraypenyakit) !="") {{$penyakit[array_search('malaria', $arraypenyakit)]->lamanya }} @endif">
                                                    <select class="form-select" id="basicSelect" name="waktu2">
                                                        <option value="">[ PILIH ]</option>
                                                        <option value="hari" @if(array_search('malaria', $arraypenyakit)
                                                            !="" ) @if($penyakit[array_search('malaria',
                                                            $arraypenyakit)]->
                                                            waktu == 'hari') selected="selected"
                                                            @endif @endif>Hari</option>
                                                        <option value="bulan" @if(array_search('malaria',
                                                            $arraypenyakit) !="" ) @if($penyakit[array_search('malaria',
                                                            $arraypenyakit)]->
                                                            waktu == 'bulan') selected="selected"
                                                            @endif @endif>Bulan</option>
                                                        <option value="tahun" @if(array_search('malaria',
                                                            $arraypenyakit) !="" ) @if($penyakit[array_search('malaria',
                                                            $arraypenyakit)]->
                                                            waktu == 'tahun') selected="selected"
                                                            @endif @endif>Tahun</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <label for="nis" class="col-form-label">Chotipa</label>
                                                <input name="nama3" value="chotipa" hidden>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="panggilan" name="tahun3"
                                                    value="@if((array_search('chotipa', $arraypenyakit) !="")) {{$penyakit[array_search('chotipa', $arraypenyakit)]->tahun }} @endif">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        aria-label="Text input with dropdown button" name="lama3"
                                                        value="@if((array_search('chotipa', $arraypenyakit) !="")) {{$penyakit[array_search('chotipa', $arraypenyakit)]->lamanya }} @endif">
                                                    <select class="form-select" id="basicSelect" name="waktu3">
                                                        <option value="">[ PILIH ]</option>
                                                        <option value="hari" @if(array_search('chotipa', $arraypenyakit)
                                                            !="" ) @if($penyakit[array_search('chotipa',
                                                            $arraypenyakit)]->
                                                            waktu == 'hari') selected="selected"
                                                            @endif @endif>Hari</option>
                                                        <option value="bulan" @if(array_search('chotipa',
                                                            $arraypenyakit) !="" ) @if($penyakit[array_search('chotipa',
                                                            $arraypenyakit)]->
                                                            waktu == 'bulan') selected="selected"
                                                            @endif @endif>Bulan</option>
                                                        <option value="tahun" @if(array_search('chotipa',
                                                            $arraypenyakit) !="" ) @if($penyakit[array_search('chotipa',
                                                            $arraypenyakit)]->
                                                            waktu == 'tahun') selected="selected"
                                                            @endif @endif>Tahun</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <label for="nis" class="col-form-label">Demam Berdarah</label>
                                                <input name="nama4" value="demam berdarah" hidden>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="panggilan" name="tahun4"
                                                    value="@if(array_search('demam berdarah', $arraypenyakit) !="") {{$penyakit[array_search('demam berdarah', $arraypenyakit)]->tahun }} @endif">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        aria-label="Text input with dropdown button" name="lama4"
                                                        value="@if(array_search('demam berdarah', $arraypenyakit) !="") {{$penyakit[array_search('demam berdarah', $arraypenyakit)]->lamanya }} @endif">
                                                    <select class="form-select" id="basicSelect" name="waktu4">
                                                        <option value="">[ PILIH ]</option>
                                                        <option value="hari" @if(array_search('demam berdarah',
                                                            $arraypenyakit) !="" ) @if($penyakit[array_search('demam
                                                            berdarah', $arraypenyakit)]->waktu == 'hari')
                                                            selected="selected" @endif @endif>Hari</option>
                                                        <option value="bulan" @if(array_search('demam berdarah',
                                                            $arraypenyakit) !="" ) @if($penyakit[array_search('demam
                                                            berdarah', $arraypenyakit)]->waktu == 'bulan')
                                                            selected="selected" @endif @endif>Bulan</option>
                                                        <option value="tahun" @if(array_search('demam berdarah',
                                                            $arraypenyakit) !="" ) @if($penyakit[array_search('demam
                                                            berdarah', $arraypenyakit)]->waktu == 'tahun')
                                                            selected="selected" @endif @endif>Tahun</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <label for="nis" class="col-form-label">Flu Burung</label>
                                                <input name="nama5" value="flu burung" hidden>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="panggilan" name="tahun5"
                                                    value="@if(array_search('flu burung', $arraypenyakit) !="") {{$penyakit[array_search('flu burung', $arraypenyakit)]->tahun }} @endif">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        aria-label="Text input with dropdown button" name="lama5"
                                                        value="@if(array_search('flu burung', $arraypenyakit) !="") {{$penyakit[array_search('flu burung', $arraypenyakit)]->lamanya }} @endif">
                                                    <select class="form-select" id="basicSelect" name="waktu5">
                                                        <option value="">[ PILIH ]</option>
                                                        <option value="hari" @if(array_search('flu burung',
                                                            $arraypenyakit) !="" ) @if($penyakit[array_search('flu
                                                            burung', $arraypenyakit)]->waktu == 'hari')
                                                            selected="selected" @endif @endif>Hari</option>
                                                        <option value="bulan" @if(array_search('flu burung',
                                                            $arraypenyakit) !="" ) @if($penyakit[array_search('flu
                                                            burung', $arraypenyakit)]->waktu == 'bulan')
                                                            selected="selected" @endif @endif>Bulan</option>
                                                        <option value="tahun" @if(array_search('flu burung',
                                                            $arraypenyakit) !="" ) @if($penyakit[array_search('flu
                                                            burung', $arraypenyakit)]->waktu == 'tahun')
                                                            selected="selected" @endif @endif>Tahun</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <label for="nis" class="col-form-label">Asmatis</label>
                                                <input name="nama6" value="asmatis" hidden>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="panggilan" name="tahun6"
                                                    value="@if(array_search('asmatis', $arraypenyakit) !="") {{$penyakit[array_search('asmatis', $arraypenyakit)]->tahun }} @endif">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        aria-label="Text input with dropdown button" name="lama6"
                                                        value="@if(array_search('asmatis', $arraypenyakit) !="") {{$penyakit[array_search('asmatis', $arraypenyakit)]->lamanya }} @endif">
                                                    <select class="form-select" id="basicSelect" name="waktu6">
                                                        <option value="">[ PILIH ]</option>
                                                        <option value="hari" @if(array_search('asmatis', $arraypenyakit)
                                                            !="" ) @if($penyakit[array_search('asmatis',
                                                            $arraypenyakit)]->
                                                            waktu == 'hari') selected="selected"
                                                            @endif @endif>Hari</option>
                                                        <option value="bulan" @if(array_search('asmatis',
                                                            $arraypenyakit) !="" ) @if($penyakit[array_search('asmatis',
                                                            $arraypenyakit)]->
                                                            waktu == 'bulan') selected="selected"
                                                            @endif @endif>Bulan</option>
                                                        <option value="tahun" @if(array_search('asmatis',
                                                            $arraypenyakit) !="" ) @if($penyakit[array_search('asmatis',
                                                            $arraypenyakit)]->
                                                            waktu == 'tahun') selected="selected"
                                                            @endif @endif>Tahun</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <label for="nis" class="col-form-label">Jantung</label>
                                                <input name="nama7" value="jantung" hidden>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="panggilan" name="tahun7"
                                                    value="@if(array_search('jantung', $arraypenyakit) !="") {{$penyakit[array_search('jantung', $arraypenyakit)]->tahun }} @endif">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        aria-label="Text input with dropdown button" name="lama7"
                                                        value="@if(array_search('jantung', $arraypenyakit) !="") {{$penyakit[array_search('jantung', $arraypenyakit)]->lamanya }} @endif">
                                                    <select class="form-select" id="basicSelect" name="waktu7">
                                                        <option value="">[ PILIH ]</option>
                                                        <option value="hari" @if(array_search('jantung', $arraypenyakit)
                                                            !="" ) @if($penyakit[array_search('jantung',
                                                            $arraypenyakit)]->
                                                            waktu == 'hari') selected="selected"
                                                            @endif @endif>Hari</option>
                                                        <option value="bulan" @if(array_search('jantung',
                                                            $arraypenyakit) !="" ) @if($penyakit[array_search('jantung',
                                                            $arraypenyakit)]->
                                                            waktu == 'bulan') selected="selected"
                                                            @endif @endif>Bulan</option>
                                                        <option value="tahun" @if(array_search('jantung',
                                                            $arraypenyakit) !="" ) @if($penyakit[array_search('jantung',
                                                            $arraypenyakit)]->
                                                            waktu == 'tahun') selected="selected"
                                                            @endif @endif>Tahun</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <label for="nis" class="col-form-label">Epilepsi / Ayan</label>
                                                <input name="nama8" value="epilepsi" hidden>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="panggilan" name="tahun8"
                                                    value="@if(array_search('epilepsi', $arraypenyakit) !="") {{$penyakit[array_search('epilepsi', $arraypenyakit)]->tahun }} @endif">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        aria-label="Text input with dropdown button" name="lama8"
                                                        value="@if(array_search('epilepsi', $arraypenyakit) !="") {{$penyakit[array_search('epilepsi', $arraypenyakit)]->lamanya }} @endif">
                                                    <select class="form-select" id="basicSelect" name="waktu8">
                                                        <option value="">[ PILIH ]</option>
                                                        <option value="hari" @if(array_search('epilepsi',
                                                            $arraypenyakit) !="" )
                                                            @if($penyakit[array_search('epilepsi', $arraypenyakit)]->
                                                            waktu == 'hari') selected="selected" @endif @endif>Hari
                                                        </option>
                                                        <option value="bulan" @if(array_search('epilepsi',
                                                            $arraypenyakit) !="" )
                                                            @if($penyakit[array_search('epilepsi', $arraypenyakit)]->
                                                            waktu == 'bulan') selected="selected" @endif @endif>Bulan
                                                        </option>
                                                        <option value="tahun" @if(array_search('epilepsi',
                                                            $arraypenyakit) !="" )
                                                            @if($penyakit[array_search('epilepsi', $arraypenyakit)]->
                                                            waktu == 'tahun') selected="selected" @endif @endif>Tahun
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <label for="nis" class="col-form-label">Ginjal</label>
                                                <input name="nama9" value="ginjal" hidden>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="panggilan" name="tahun9"
                                                    value="@if(array_search('ginjal', $arraypenyakit) !="") {{$penyakit[array_search('ginjal', $arraypenyakit)]->tahun }} @endif">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        aria-label="Text input with dropdown button" name="lama9"
                                                        value="@if(array_search('ginjal', $arraypenyakit) !="") {{$penyakit[array_search('ginjal', $arraypenyakit)]->lamanya }} @endif">
                                                    <select class="form-select" id="basicSelect" name="waktu9">
                                                        <option value="">[ PILIH ]</option>
                                                        <option value="hari" @if(array_search('ginjal', $arraypenyakit)
                                                            !="" ) @if($penyakit[array_search('ginjal',
                                                            $arraypenyakit)]->waktu
                                                            == 'hari') selected="selected"
                                                            @endif @endif>Hari</option>
                                                        <option value="bulan" @if(array_search('ginjal', $arraypenyakit)
                                                            !="" ) @if($penyakit[array_search('ginjal',
                                                            $arraypenyakit)]->
                                                            waktu == 'bulan') selected="selected"
                                                            @endif @endif>Bulan</option>
                                                        <option value="tahun" @if(array_search('ginjal', $arraypenyakit)
                                                            !="" ) @if($penyakit[array_search('ginjal',
                                                            $arraypenyakit)]->
                                                            waktu == 'tahun') selected="selected"
                                                            @endif @endif>Tahun</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-success me-md-2" type="submit"><span><i
                                                class="bi bi-save"></i>
                                            SIMPAN</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- DATA PENDIDIKAN  -->
            <div class="tab-pane fade {{ $page == 4 ? 'show active' : '' }}" id="pills-pendidikan" role="tabpanel"
                aria-labelledby="pills-pendidikan-tab">
                <form enctype="multipart/form-data" action="{{route('insertdatapendidikan')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-success">
                            <h4 class="card-title text-white  mb-0">Data Pendidikan</h4>
                        </div>
                        <div class="card-body px-12 border border-success">
                            <div class="row mt-4">
                                <div class="card border border-warning border-3">
                                    <div class="card-header ">
                                        <h4 class="card-title text-warning">DATA PENDIDIKAN</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            <P class="fw-bold">DATA PAUD</P>
                                            <li>PAUD Formal ( <b>Taman Kanak-Kanak</b> )</li>
                                            <li>PAUD Non-Formal ( <b>Kelompok Bermain</b>, <b>Taman Penitipan Anak</b>,
                                                <b>atau Satuan PAUD Sejenis</b> )</li>
                                        </ul>
                                        <hr>
                                        <ul>
                                            <P class="fw-bold">DATA PENDIDIKAN SMP</P>
                                            <li>Isi Tanggal,Tanggal Ijasah,Nomor Ijasah, dan Nomor SKHUN sesuai dengan
                                                yang
                                                tertera pada dokumen aslinya</li>
                                            <li>Apabila Ijasah UN SMP atau SKHUN SMP belum ada, silahkan isi dengan
                                                DN-00-DI-0000000 dan isi tanggal dengan tanggal sekarang</li>
                                            <li>Apabila Ijasah UN MTS Atau MI belum ada, silahkan isi dengan MTs-00
                                                000000000 MI-00 000000000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h3>Detail PAUD</h3>
                                </div>
                                <div class="mb-2 row mt-3">
                                    <div class="col-sm-3">
                                        <label for="nis" class="col-form-label">Data Peminatan</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div>
                                                    <label class="col-form-label">Apakah pernah PAUD Formal ?</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <fieldset class="form-group">
                                                        <select class="form-select text-center" id="basicSelect"
                                                            name="paudformal" required>
                                                            <option value="">[ PILIH ]</option>
                                                            <option value="Ya" @if(isset($datapendidikan->paudformal))
                                                                @if($datapendidikan->paudformal == 'Ya')
                                                                selected="selected" @endif @endif>Ya</option>
                                                            <option value="Tidak" @if(isset($datapendidikan->
                                                                paudformal))
                                                                @if($datapendidikan->paudformal == 'Tidak')
                                                                selected="selected"
                                                                @endif @endif>Tidak</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div>
                                                    <label class="col-form-label">Apakah pernah PAUD Non-Formal
                                                        ?</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <fieldset class="form-group">
                                                        <select class="form-select text-center" id="basicSelect"
                                                            name="paudnonformal" required>
                                                            <option value="">[ PILIH ]</option>
                                                            <option value="Ya" @if(isset($datapendidikan->
                                                                paudnonformal))
                                                                @if($datapendidikan->paudnonformal == 'Ya')
                                                                selected="selected" @endif @endif>Ya</option>
                                                            <option value="Tidak" @if(isset($datapendidikan->
                                                                paudnonformal))
                                                                @if($datapendidikan->paudnonformal == 'Tidak')
                                                                selected="selected"
                                                                @endif @endif>Tidak</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <h3>Detail SMP / MTs</h3>
                                </div>
                                <div class="mb-0 row mt-3">
                                    <label for="smpmts" class="col-sm-3 col-form-label">Nama SMP / MTs</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-center" id="smpmts" name="namasmp"
                                            value="@if(isset($datapendidikan->namasmp)) {{$datapendidikan->namasmp}} @endif"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-0 row mt-3">
                                    <label for="smpmts" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-center" id="smpmts" name="alamat"
                                            value="@if(isset($datapendidikan->alamat)) {{$datapendidikan->alamat}} @endif"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-0 row mt-3">
                                    <label for="smpmts" class="col-sm-3 col-form-label">Kota</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control text-center" id="smpmts" name="kota"
                                            value="@if(isset($datapendidikan->kota)) {{$datapendidikan->kota}} @endif"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-0 row mt-3">
                                    <label for="smpmts" class="col-sm-3 col-form-label">Tanggal Ijazah</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control text-center" id="smpmts" name="tglijazah"
                                            value=@if(isset($datapendidikan->tglijazah))
                                        {{$datapendidikan->tglijazah}} @endif>
                                    </div>
                                </div>
                                <div class="mb-5 row mt-3">
                                    <label for="smpmts" class="col-sm-3 col-form-label">Nomor Ijazah</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control text-center" id="smpmts" name="noijazah"
                                            value="@if(isset($datapendidikan->noijazah)) {{$datapendidikan->noijazah}} @endif">
                                    </div>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-success me-md-2" type="submit"><span><i
                                                class="bi bi-save"></i>
                                            SIMPAN</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- DATA ORANG TUA / WALI  -->
            <div class="tab-pane fade {{ $page == 5 ? 'show active' : '' }}" id="pills-orangtuawali" role="tabpanel"
                aria-labelledby="pills-orangtuawali-tab">
                <form enctype="multipart/form-data" action="{{route('insertorangtuawali')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-success">
                            <h4 class="card-title text-white  mb-0">Data Orangtua / Wali</h4>
                        </div>
                        <div class="card-body px-12 border border-success">
                            <div class="row mt-4">
                                <div class="card border border-warning border-3">
                                    <div class="card-header ">
                                        <h4 class="card-title text-warning">DATA ORANG TUA & WALI</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            <P class="fw-bold">DATA BAPAK & IBU</P>
                                            <li>isian Form Bapak dan Ibu hanya diisi dengan STATUS bapak dan Ibu
                                                <b>KANDUNG</b></li>
                                            <li>Isi Data Bapak dan Ibu dengan lengkap sesuai dokumen yang SAH ( <b>AKTE
                                                    KELAHIRAN</b>, <b>KARTU KELUARGA</b>, <b>IJAZAH</b>, <b>KTP</b>)
                                            </li>
                                            <li>Jika alamat Bapak atau Ibu sama dengan alamat siswa, maka klik tombol
                                                <b>Alamat sama dengan alamat siswa</b> yang berwarna <b
                                                    class="text-primary">biru</b></li>
                                        </ul>
                                        <hr>
                                        <ul>
                                            <P class="fw-bold">DATA WALI</P>
                                            <li>Jika Ananda tinggal bersama WALI ( <b>KAKEK ATAU NENEK</b>, <b>PAMAN
                                                    ATAU BIBI</b>, <b>KAKAK</b>, <b>AYAH ATAU IBU TIRI</b>, <b>FAMILI
                                                    LAIN</b> ) silahkah isi data dengan sesuai</li>
                                            <li>Jika alamat wali sama dengan alamat siswa, maka klik tombol <b>Alamat
                                                    sama dengan alamat siswa</b> yang berwarna <b
                                                    class="text-primary">biru</b></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mb-0 row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Tinggal Bersama</label>
                                    <div class="col-sm-3">
                                        <fieldset class="form-group">
                                            <select class="form-select text-center" id="tinggalbersama"
                                                name="tinggalbersama" required>
                                                <option value="">[ PILIH ]</option>
                                                <option value="orang tua" @if(isset($orangtuawali->tinggalbersama))
                                                    @if($orangtuawali->tinggalbersama == 'orang tua')
                                                    selected="selected" @endif @endif>Orangtua</option>
                                                <option value="wali" @if(isset($orangtuawali->tinggalbersama))
                                                    @if($orangtuawali->tinggalbersama == 'wali') selected="selected"
                                                    @endif @endif>Wali</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <hr class="mt-3 mb-3">
                                <div id="div_orangtua" style="display: none">
                                    <div class="col-12 mt-3 ">
                                        <h3>DATA BAPAK</h3>
                                    </div>
                                    <div class="mb-2 row mt-3">
                                        <label for="nis" class="col-sm-3 col-form-label">Nama Lengkap Bapak</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control text-center" id="nis" name="nmbapak"
                                                value="@if(isset($orangtuawali->nmbapak)) {{$orangtuawali->nmbapak}} @endif"
                                                required>
                                        </div>
                                    </div>
                                    <div class="mb-0 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Keadaan</label>
                                        <div class="col-sm-3">
                                            <fieldset class="form-group">
                                                <select class="form-select text-center" id="keadaanbapak"
                                                    name="keadaanbpk" required>
                                                    <option value="">[ PILIH ]</option>
                                                    <option value="hidup" @if(isset($orangtuawali->keadaanbpk))
                                                        @if($orangtuawali->keadaanbpk == 'hidup') selected="selected"
                                                        @endif @endif>Hidup</option>
                                                    <option value="meninggal" @if(isset($orangtuawali->keadaanbpk))
                                                        @if($orangtuawali->keadaanbpk == 'meninggal')
                                                        selected="selected" @endif @endif>Meninggal</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="mb-2 row mt-3">
                                        <label for="nis" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control text-center" id="tpmtlahirbpk"
                                                name="tmptlahirbpk"
                                                value="@if(isset($orangtuawali->tmptlahirbpk)) {{$orangtuawali->tmptlahirbpk}} @endif">
                                        </div>
                                    </div>
                                    <div class="mb-2 row mt-3">
                                        <label for="nis" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-2">
                                            <input type="date" class="form-control text-center" id="nis" required
                                                name="tgllahirbpk" value=@if(isset($orangtuawali->tgllahirbpk))
                                            {{$orangtuawali->tgllahirbpk}} @endif>
                                        </div>
                                    </div>
                                    <div class="mb-0 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Pendidikan
                                            Tertinggi</label>
                                        <div class="col-sm-3">
                                            <fieldset class="form-group">
                                                <select class="form-select text-center" id="basicSelect"
                                                    name="pendidikantertinggibpk" required>
                                                    <option value="">[ PILIH ]</option>
                                                    <option value="taman kanak kanak" @if(isset($orangtuawali->pendidikantertinggibpk))
                                                        @if($orangtuawali->pendidikantertinggibpk == 'taman kanak kanak') selected="selected" @endif @endif>Taman Kanak-kanak
                                                    </option>
                                                    <option value="sd sederajat" @if(isset($orangtuawali->pendidikantertinggibpk))
                                                        @if($orangtuawali->pendidikantertinggibpk == 'sd sederajat')
                                                        selected="selected" @endif @endif>SD Sederajat</option>
                                                    <option value="smp sederajat" @if(isset($orangtuawali->pendidikantertinggibpk))
                                                        @if($orangtuawali->pendidikantertinggibpk == 'smp sederajat')
                                                        selected="selected" @endif @endif>SMP Sederajat</option>
                                                    <option value="sma sederajat" @if(isset($orangtuawali->pendidikantertinggibpk))
                                                        @if($orangtuawali->pendidikantertinggibpk == 'sma sederajat')
                                                        selected="selected" @endif @endif>SMA Sederajat</option>
                                                    <option value="diploma 1" @if(isset($orangtuawali->pendidikantertinggibpk))
                                                        @if($orangtuawali->pendidikantertinggibpk == 'diploma 1')
                                                        selected="selected" @endif @endif>Diploma I</option>
                                                    <option value="diploma 2" @if(isset($orangtuawali->pendidikantertinggibpk))
                                                        @if($orangtuawali->pendidikantertinggibpk == 'diploma 2')
                                                        selected="selected" @endif @endif>Diploma II</option>
                                                    <option value="diploma 3" @if(isset($orangtuawali->pendidikantertinggibpk))
                                                        @if($orangtuawali->pendidikantertinggibpk == 'diploma 3')
                                                        selected="selected" @endif @endif>Diploma III</option>
                                                    <option value="diploma 4" @if(isset($orangtuawali->pendidikantertinggibpk))
                                                        @if($orangtuawali->pendidikantertinggibpk == 'diploma 4')
                                                        selected="selected" @endif @endif>Diploma IV</option>
                                                    <option value="strata 1" @if(isset($orangtuawali->pendidikantertinggibpk))
                                                        @if($orangtuawali->pendidikantertinggibpk == 'strata 1')
                                                        selected="selected" @endif @endif>Strata I</option>
                                                    <option value="strata 2" @if(isset($orangtuawali->pendidikantertinggibpk))
                                                        @if($orangtuawali->pendidikantertinggibpk == 'strata 2')
                                                        selected="selected" @endif @endif>Strata II</option>
                                                    <option value="strata 3" @if(isset($orangtuawali->pendidikantertinggibpk))
                                                        @if($orangtuawali->pendidikantertinggibpk == 'strata 3')
                                                        selected="selected" @endif @endif>Strata III</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <hr class="mt-3">
                                    <div class="mb-2 row mt-3">
                                        <div class="col-sm-3">
                                            <label for="nis" class="col-form-label">Alamat Rumah</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="row mb-3 col-sm-4">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="copyalamatbpk()">Alamat sama dengan Siswa</button>
                                            </div>
                                            <div class="col-md-12 row mb-3">
                                                <div>
                                                    <label for="nis" class="col-form-label">Jalan / Gg / Kp.</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="col-sm-12 form-control" id="jalanbpk"
                                                        name="jalanbpk"
                                                        value="@if(isset($orangtuawali->jalanbpk)) {{$orangtuawali->jalanbpk}} @endif"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="nis" class="col-form-label">RT</label>
                                                    </div>
                                                    <div>
                                                        <input type="number" class="form-control" id="rtbpk" name="rtbpk"
                                                            value="{{!isset($orangtuawali->rtbpk) ?"":$orangtuawali->rtbpk;}}"
                                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            maxlength="2"  required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="nis" class="col-form-label">RW</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="number" class="form-control" id="rwbpk" name="rwbpk"
                                                            maxlength="2" 
                                                            value="{{!isset($orangtuawali->rwbpk) ?"":$orangtuawali->rwbpk;}}"
                                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div>
                                                    <label for="nis" class="col-form-label">Kelurahan</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="col-sm-12 form-control" id="kelurahanbpk"
                                                        name="kelurahanbpk"
                                                        value="@if(isset($orangtuawali->kelurahanbpk)) {{$orangtuawali->kelurahanbpk}} @endif"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div>
                                                    <label for="nis" class="col-form-label">Kecamatan</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="col-sm-12 form-control" id="kecamatanbpk"
                                                        name="kecamatanbpk"
                                                        value="@if(isset($orangtuawali->kecamatanbpk)) {{$orangtuawali->kecamatanbpk}} @endif"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div>
                                                    <label for="nis" class="col-form-label">Kota / Kabupaten</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="col-sm-12 form-control" id="kotabpk"
                                                        name="kotabpk"
                                                        value="@if(isset($orangtuawali->kotabpk)) {{$orangtuawali->kotabpk}} @endif"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div>
                                                    <label for="nis" class="col-form-label">Kode POS</label>
                                                </div>
                                                <div>
                                                    <input type="number" class="form-control" id="posbpk"
                                                        name="kodeposbpk" maxlength="5"
                                                        value="{{!isset($orangtuawali->kodeposbpk) ?"":$orangtuawali->kodeposbpk;}}"
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-0 row mt-3">
                                        <label for="telprumah" class="col-sm-3 col-form-label">Telepon Rumah</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="telprumahbpk"
                                                name="telprumahbpk"
                                                value="{{!isset($orangtuawali->telprumahbpk) ?"":$orangtuawali->telprumahbpk;}}"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                maxlength="10" >
                                        </div>
                                    </div>
                                    <div class="mb-5 row mt-3">
                                        <label for="nohp" class="col-sm-3 col-form-label">Nomor HP</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="nohpbpk" name="nohpbpk" maxlength="13"
                                            value="{{!isset($orangtuawali->nohpbpk) ?"":$orangtuawali->nohpbpk;}}"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            required>
                                        </div>
                                    </div>
                                    <div class="mb-0 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Profesi</label>
                                        <div class="col-sm-3">
                                            <fieldset class="form-group">
                                                <select class="form-select text-center" id="profesibapak"
                                                    name="profesibpk" required>
                                                    <option value="">[ PILIH ]</option>
                                                    <option value="tidak bekerja" @if(isset($orangtuawali->profesibpk))
                                                        @if($orangtuawali->profesibpk == 'tidak bekerja')
                                                        selected="selected"
                                                        @endif @endif>TIdak Bekerja</option>
                                                    <option value="nelayan" @if(isset($orangtuawali->profesibpk))
                                                        @if($orangtuawali->profesibpk == 'nelayan') selected="selected"
                                                        @endif @endif>Nelayan</option>
                                                    <option value="petani" @if(isset($orangtuawali->profesibpk))
                                                        @if($orangtuawali->profesibpk == 'petani') selected="selected"
                                                        @endif @endif>Petani</option>
                                                    <option value="peternak" @if(isset($orangtuawali->profesibpk))
                                                        @if($orangtuawali->profesibpk == 'peternak') selected="selected"
                                                        @endif @endif>Peternak</option>
                                                    <option value="pns/tni/polri" @if(isset($orangtuawali->profesibpk))
                                                        @if($orangtuawali->profesibpk == 'pns/tni/polri')
                                                        selected="selected"
                                                        @endif @endif>PNS/TNI/POLRI</option>
                                                    <option value="karyawan swasta" @if(isset($orangtuawali->
                                                        profesibpk))
                                                        @if($orangtuawali->profesibpk == 'karyawan swasta')
                                                        selected="selected"
                                                        @endif @endif>Karyawan Swasta</option>
                                                    <option value="pedagang kecil" @if(isset($orangtuawali->profesibpk))
                                                        @if($orangtuawali->profesibpk == 'pedagang kecil')
                                                        selected="selected"
                                                        @endif @endif>Pedagang Kecil</option>
                                                    <option value="pedagang besar" @if(isset($orangtuawali->profesibpk))
                                                        @if($orangtuawali->profesibpk == 'pedagang besar')
                                                        selected="selected"
                                                        @endif @endif>Pedagang Besar</option>
                                                    <option value="wiraswasta" @if(isset($orangtuawali->profesibpk))
                                                        @if($orangtuawali->profesibpk == 'wiraswasta')
                                                        selected="selected"
                                                        @endif @endif>Wiraswasta</option>
                                                    <option value="warausaha" @if(isset($orangtuawali->profesibpk))
                                                        @if($orangtuawali->profesibpk == 'warausaha')
                                                        selected="selected"
                                                        @endif @endif>Wirausaha</option>
                                                    <option value="buruh" @if(isset($orangtuawali->profesibpk))
                                                        @if($orangtuawali->profesibpk == 'buruh') selected="selected"
                                                        @endif @endif>Buruh</option>
                                                    <option value="pensiunan" @if(isset($orangtuawali->profesibpk))
                                                        @if($orangtuawali->profesibpk == 'pensiunan')
                                                        selected="selected"
                                                        @endif @endif>Pensiunan</option>
                                                    <option value="tenaga kerja indonesia" @if(isset($orangtuawali->
                                                        profesibpk))
                                                        @if($orangtuawali->profesibpk == 'tenaga kerja indonesia')
                                                        selected="selected"
                                                        @endif @endif>Tenaga Kerja Indonesia</option>
                                                    <option value="karyawan bumn" @if(isset($orangtuawali->profesibpk))
                                                        @if($orangtuawali->profesibpk == 'karyawan bumn')
                                                        selected="selected"
                                                        @endif @endif>Karyawan BUMN</option>
                                                    <option value="tidak dapat diterapkan" @if(isset($orangtuawali->
                                                        profesibpk))
                                                        @if($orangtuawali->profesibpk == 'tidak dapat diterapkan')
                                                        selected="selected"
                                                        @endif @endif>Tidak dapat diterapkan</option>
                                                    <option value="lainnya" @if(isset($orangtuawali->profesibpk))
                                                        @if($orangtuawali->profesibpk == 'lainnya') selected="selected"
                                                        @endif @endif>Lainnya</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="mb-0 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Penghasilan</label>
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <select class="form-select text-center" id="penghasilanbapak"
                                                    name="penghasilanbpk" required>
                                                    <option value="">[ PILIH ]</option>
                                                    <option value="Tidak Berpenghasilan" @if(isset($orangtuawali->penghasilanbpk))
                                                        @if($orangtuawali->penghasilanbpk == 'Tidak Berpenghasilan')
                                                        selected="selected" @endif @endif>Tidak Berpenghasilan</option>
                                                    <option value="Kurang dari Rp. 500.000" @if(isset($orangtuawali->penghasilanbpk))
                                                        @if($orangtuawali->penghasilanbpk == 'Kurang dari Rp. 500.000')
                                                        selected="selected" @endif @endif>Kurang dari
                                                        Rp. 500.000</option>
                                                    <option value="Rp. 500.000 - Rp. 999.000" @if(isset($orangtuawali->penghasilanbpk))
                                                        @if($orangtuawali->penghasilanbpk == 'Rp. 500.000 - Rp. 999.000') selected="selected" @endif @endif>Rp.
                                                        500.000 - Rp. 999.000</option>
                                                    <option value="Rp. 1.000.000 - Rp. 1.999.000"
                                                        @if(isset($orangtuawali->penghasilanbpk))
                                                        @if($orangtuawali->penghasilanbpk == 'Rp. 1.000.000 - Rp. 1.999.000') selected="selected" @endif @endif>Rp. 1.000.000 -
                                                        Rp. 1.999.000</option>
                                                    <option value="Rp. 2.000.000 - Rp. 4.999.000"
                                                        @if(isset($orangtuawali->penghasilanbpk))
                                                        @if($orangtuawali->penghasilanbpk == 'Rp. 2.000.000 - Rp. 4.999.000') selected="selected" @endif @endif>Rp. 2.000.000 -
                                                        Rp. 4.999.000</option>
                                                    <option value="Rp. 5.000.000 - Rp. 19.999.000"
                                                        @if(isset($orangtuawali->penghasilanbpk))
                                                        @if($orangtuawali->penghasilanbpk == 'Rp. 5.000.000 - Rp. 19.999.000') selected="selected" @endif @endif>Rp. 5.000.000 -
                                                        Rp. 19.999.000</option>
                                                    <option value="Diatas Rp. 20.000.000" @if(isset($orangtuawali->penghasilanbpk)) @if($orangtuawali->penghasilanbpk == 'Diatas Rp. 20.000.000') selected="selected" @endif @endif>Diatas Rp.
                                                        20.000.000</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <hr class="mt-3 mb-4">
                                    <div class="col-12 mt-3 ">
                                        <h3>DATA IBU</h3>
                                    </div>
                                    <div class="mb-2 row mt-3">
                                        <label for="nis" class="col-sm-3 col-form-label">Nama Lengkap Ibu</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control text-center" id="nis" name="nmibu"
                                                value="@if(isset($orangtuawali->nmibu)) {{$orangtuawali->nmibu}} @endif"
                                                required>
                                        </div>
                                    </div>
                                    <div class="mb-0 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Keadaan</label>
                                        <div class="col-sm-3">
                                            <fieldset class="form-group">
                                                <select class="form-select text-center" id="keadaanibu"
                                                    name="keadaanibu" required>
                                                    <option value="">[ PILIH ]</option>
                                                    <option value="hidup" @if(isset($orangtuawali->keadaanibu))
                                                        @if($orangtuawali->keadaanibu == 'hidup') selected="selected"
                                                        @endif @endif>Hidup</option>
                                                    <option value="meninggal" @if(isset($orangtuawali->keadaanibu))
                                                        @if($orangtuawali->keadaanibu == 'meninggal')
                                                        selected="selected" @endif @endif>Meninggal</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    {{-- <div class="mb-0 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Hubungan dengan
                                            Siswa</label>
                                        <div class="col-sm-3">
                                            <fieldset class="form-group">
                                                <select class="form-select text-center" id="basicSelect"
                                                    name="hubungandgnsiswaibu" required>
                                                    <option value="">[ PILIH ]</option>
                                                    <option value="kandung" @if(isset($orangtuawali->
                                                        hubungandgnsiswaibu)) @if($orangtuawali->hubungandgnsiswaibu ==
                                                        'kandung') selected="selected" @endif @endif>Kandung</option>
                                                    <option value="angkat" @if(isset($orangtuawali->
                                                        hubungandgnsiswaibu)) @if($orangtuawali->hubungandgnsiswaibu ==
                                                        'angkat') selected="selected" @endif @endif>Angkat</option>
                                                    <option value="tiri" @if(isset($orangtuawali->hubungandgnsiswaibu))
                                                        @if($orangtuawali->hubungandgnsiswaibu == 'tiri')
                                                        selected="selected" @endif @endif>Tiri</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div> --}}
                                    <div class="mb-2 row mt-3">
                                        <label for="nis" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control text-center" id="nis"
                                                name="tmptlahiribu"
                                                value="@if(isset($orangtuawali->tmptlahiribu)) {{$orangtuawali->tmptlahiribu}} @endif"
                                                required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row mt-3">
                                        <label for="nis" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-2">
                                            <input type="date" class="form-control text-center" id="nis" required
                                                name="tgllahiribu" value=@if(isset($orangtuawali->tgllahiribu))
                                            {{$orangtuawali->tgllahiribu}} @endif>
                                        </div>
                                    </div>
                                    <div class="mb-0 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Pendidikan
                                            Tertinggi</label>
                                        <div class="col-sm-3">
                                            <fieldset class="form-group">
                                                <select class="form-select text-center" id="basicSelect"
                                                    name="pendidikantertinggiibu" required>
                                                    <option value="">[ PILIH ]</option>
                                                    <option value="taman kanak kanak" @if(isset($orangtuawali->pendidikantertinggiibu))
                                                        @if($orangtuawali->pendidikantertinggiibu == 'taman kanak
                                                        kanak') selected="selected" @endif @endif>Taman Kanak-kanak
                                                    </option>
                                                    <option value="sd sederajat" @if(isset($orangtuawali->pendidikantertinggiibu))
                                                        @if($orangtuawali->pendidikantertinggiibu == 'sd sederajat')
                                                        selected="selected" @endif @endif>SD Sederajat</option>
                                                    <option value="smp sederajat" @if(isset($orangtuawali->pendidikantertinggiibu))
                                                        @if($orangtuawali->pendidikantertinggiibu == 'smp sederajat')
                                                        selected="selected" @endif @endif>SMP Sederajat</option>
                                                    <option value="sma sederajat" @if(isset($orangtuawali->pendidikantertinggiibu))
                                                        @if($orangtuawali->pendidikantertinggiibu == 'sma sederajat')
                                                        selected="selected" @endif @endif>SMA Sederajat</option>
                                                    <option value="diploma 1" @if(isset($orangtuawali->pendidikantertinggiibu))
                                                        @if($orangtuawali->pendidikantertinggiibu == 'diploma 1')
                                                        selected="selected" @endif @endif>Diploma I</option>
                                                    <option value="diploma 2" @if(isset($orangtuawali->pendidikantertinggiibu))
                                                        @if($orangtuawali->pendidikantertinggiibu == 'diploma 2')
                                                        selected="selected" @endif @endif>Diploma II</option>
                                                    <option value="diploma 3" @if(isset($orangtuawali->pendidikantertinggiibu))
                                                        @if($orangtuawali->pendidikantertinggiibu == 'diploma 3')
                                                        selected="selected" @endif @endif>Diploma III</option>
                                                    <option value="diploma 4" @if(isset($orangtuawali->pendidikantertinggiibu))
                                                        @if($orangtuawali->pendidikantertinggiibu == 'diploma 4')
                                                        selected="selected" @endif @endif>Diploma IV</option>
                                                    <option value="strata 1" @if(isset($orangtuawali->pendidikantertinggiibu))
                                                        @if($orangtuawali->pendidikantertinggiibu == 'strata 1')
                                                        selected="selected" @endif @endif>Strata I</option>
                                                    <option value="strata 2" @if(isset($orangtuawali->pendidikantertinggiibu))
                                                        @if($orangtuawali->pendidikantertinggiibu == 'strata 2')
                                                        selected="selected" @endif @endif>Strata II</option>
                                                    <option value="strata 3" @if(isset($orangtuawali->pendidikantertinggiibu))
                                                        @if($orangtuawali->pendidikantertinggiibu == 'strata 3')
                                                        selected="selected" @endif @endif>Strata III</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <hr class="mt-3">
                                    <div class="mb-2 row mt-3">
                                        <div class="col-sm-3">
                                            <label for="nis" class="col-form-label">Alamat Rumah</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="row mb-3 col-sm-4">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="copyalamatibu()">Alamat sama dengan Siswa</button>
                                            </div>
                                            <div class="col-md-12 row mb-3">
                                                <div>
                                                    <label for="nis" class="col-form-label">Jalan / Gg / Kp.</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="col-sm-12 form-control" id="jalanibu"
                                                        name="jalanibu"
                                                        value="@if(isset($orangtuawali->jalanibu)) {{$orangtuawali->jalanibu}} @endif"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="nis" class="col-form-label">RT</label>
                                                    </div>
                                                    <div>
                                                        <input type="number" class="form-control" id="rtibu" name="rtibu"
                                                        value="{{!isset($orangtuawali->rtibu) ?"":$orangtuawali->rtibu;}}"
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="2" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="nis" class="col-form-label">RW</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="number" class="form-control" id="rwibu" name="rwibu"
                                                        value="{{!isset($orangtuawali->rwibu) ?"":$orangtuawali->rwibu;}}"
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="2" 
                                                        required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div>
                                                    <label for="nis" class="col-form-label">Kelurahan</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="col-sm-12 form-control" id="kelurahanibu"
                                                        name="kelurahanibu"
                                                        value="@if(isset($orangtuawali->kelurahanibu)) {{$orangtuawali->kelurahanibu}} @endif"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div>
                                                    <label for="nis" class="col-form-label">Kecamatan</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="col-sm-12 form-control" id="kecamatanibu"
                                                        name="kecamatanibu"
                                                        value="@if(isset($orangtuawali->kecamatanibu)) {{$orangtuawali->kecamatanibu}} @endif"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div>
                                                    <label for="nis" class="col-form-label">Kota / Kabupaten</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="col-sm-12 form-control" id="kotaibu"
                                                        name="kotaibu"
                                                        value="@if(isset($orangtuawali->kotaibu)) {{$orangtuawali->kotaibu}} @endif"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div>
                                                    <label for="nis" class="col-form-label">Kode POS</label>
                                                </div>
                                                <div>
                                                    <input type="number" class="form-control" id="posibu"
                                                        name="kodeposibu"
                                                        value="{{!isset($orangtuawali->kodeposibu) ?"":$orangtuawali->kodeposibu;}}"
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            maxlength="5" 
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-0 row mt-3">
                                        <label for="telprumah" class="col-sm-3 col-form-label">Telepon Rumah</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="telprumahibu"
                                                name="telprumahibu"
                                                value="{{!isset($orangtuawali->telprumahibu) ?"":$orangtuawali->telprumahibu;}}"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                maxlength="10" 
                                               >
                                        </div>
                                    </div>
                                    <div class="mb-5 row mt-3">
                                        <label for="nohp" class="col-sm-3 col-form-label">Nomor HP</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="nohpibu" name="nohpibu"
                                            value="{{!isset($orangtuawali->nohpibu) ?"":$orangtuawali->nohpibu;}}"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                maxlength="13" 
                                                required>
                                        </div>
                                    </div>
                                    <div class="mb-0 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Profesi</label>
                                        <div class="col-sm-3">
                                            <fieldset class="form-group">
                                                <select class="form-select text-center" id="profesiibu"
                                                    name="profesiibu" required>
                                                    <option value="">[ PILIH ]</option>
                                                    <option value="tidak bekerja" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'tidak bekerja')
                                                        selected="selected"
                                                        @endif @endif>TIdak Bekerja</option>
                                                    <option value="nelayan" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'nelayan') selected="selected"
                                                        @endif @endif>Nelayan</option>
                                                    <option value="petani" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'petani') selected="selected"
                                                        @endif @endif>Petani</option>
                                                    <option value="peternak" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'peternak') selected="selected"
                                                        @endif @endif>Peternak</option>
                                                    <option value="pns/tni/polri" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'pns/tni/polri')
                                                        selected="selected"
                                                        @endif @endif>PNS/TNI/POLRI</option>
                                                    <option value="karyawan swasta" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'karyawan swasta')
                                                        selected="selected"
                                                        @endif @endif>Karyawan Swasta</option>
                                                    <option value="pedagang kecil" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'pedagang kecil')
                                                        selected="selected"
                                                        @endif @endif>Pedagang Kecil</option>
                                                    <option value="pedagang besar" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'pedagang besar')
                                                        selected="selected"
                                                        @endif @endif>Pedagang Besar</option>
                                                    <option value="wiraswasta" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'wiraswasta')
                                                        selected="selected"
                                                        @endif @endif>Wiraswasta</option>
                                                    <option value="warausaha" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'warausaha')
                                                        selected="selected"
                                                        @endif @endif>Wirausaha</option>
                                                    <option value="buruh" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'buruh') selected="selected"
                                                        @endif @endif>Buruh</option>
                                                    <option value="pensiunan" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'pensiunan')
                                                        selected="selected"
                                                        @endif @endif>Pensiunan</option>
                                                    <option value="tenaga kerja indonesia" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'tenaga kerja indonesia')
                                                        selected="selected"
                                                        @endif @endif>Tenaga Kerja Indonesia</option>
                                                    <option value="karyawan bumn" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'karyawan bumn')
                                                        selected="selected"
                                                        @endif @endif>Karyawan BUMN</option>
                                                    <option value="tidak dapat diterapkan" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'tidak dapat diterapkan')
                                                        selected="selected"
                                                        @endif @endif>Tidak dapat diterapkan</option>
                                                    <option value="lainnya" @if(isset($orangtuawali->profesiibu))
                                                        @if($orangtuawali->profesiibu == 'lainnya') selected="selected"
                                                        @endif @endif>Lainnya</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="mb-0 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Penghasilan</label>
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <select class="form-select text-center" id="penghasilanibu"
                                                    name="penghasilanibu" required>
                                                    <option value="">[ PILIH ]</option>
                                                    <option value="Tidak Berpenghasilan" @if(isset($orangtuawali->penghasilanibu))
                                                        @if($orangtuawali->penghasilanibu == 'Tidak Berpenghasilan')
                                                        selected="selected" @endif @endif>Tidak Berpenghasilan</option>
                                                    <option value="Kurang dari Rp. 500.000" @if(isset($orangtuawali->penghasilanibu)) @if($orangtuawali->penghasilanibu == 'Kurang dari Rp. 500.000') selected="selected" @endif @endif>Kurang dari
                                                        Rp. 500.000</option>
                                                    <option value="Rp. 500.000 - Rp. 999.000" @if(isset($orangtuawali->penghasilanibu)) @if($orangtuawali->penghasilanibu == 'Rp. 500.000 - Rp. 999.000') selected="selected" @endif @endif>Rp.
                                                        500.000 - Rp. 999.000</option>
                                                    <option value="Rp. 1.000.000 - Rp. 1.999.000"
                                                        @if(isset($orangtuawali->penghasilanibu))
                                                        @if($orangtuawali->penghasilanibu == 'Rp. 1.000.000 - Rp. 1.999.000') selected="selected" @endif @endif>Rp. 1.000.000 -
                                                        Rp. 1.999.000</option>
                                                    <option value="Rp. 2.000.000 - Rp. 4.999.000"
                                                        @if(isset($orangtuawali->penghasilanibu))
                                                        @if($orangtuawali->penghasilanibu == 'Rp. 2.000.000 - Rp. 4.999.000') selected="selected" @endif @endif>Rp. 2.000.000 -
                                                        Rp. 4.999.000</option>
                                                    <option value="Rp. 5.000.000 - Rp. 19.999.000"
                                                        @if(isset($orangtuawali->penghasilanibu))
                                                        @if($orangtuawali->penghasilanibu == 'Rp. 5.000.000 - Rp. 19.999.000') selected="selected" @endif @endif>Rp. 5.000.000 -
                                                        Rp. 19.999.000</option>
                                                    <option value="Diatas Rp. 20.000.000" @if(isset($orangtuawali->penghasilanibu)) @if($orangtuawali->penghasilanibu == 'Diatas Rp. 20.000.000') selected="selected" @endif @endif>Diatas Rp.
                                                        20.000.000</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-3 mb-3">
                                <div id="div_wali" style="display: none">
                                    <div class="col-12 mt-3 ">
                                        <h3>DATA WALI</h3>
                                    </div>
                                    <div class="mb-2 row mt-3">
                                        <label for="nis" class="col-sm-3 col-form-label">Nama Lengkap Wali</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control text-center" id="nis"
                                                name="nmwali"
                                                value="@if(isset($orangtuawali->nmwali)) {{$orangtuawali->nmwali}} @endif">
                                        </div>
                                    </div>
                                    {{-- <div class="mb-0 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Keadaan</label>
                                        <div class="col-sm-3">
                                            <fieldset class="form-group">
                                                <select class="form-select input-group-text" id="basicSelect"
                                                    name="keadaanwali">
                                                    <option value="">[ PILIH ]</option>
                                                    <option value="hidup" @if(isset($orangtuawali->keadaanwali))
                                                        @if($orangtuawali->keadaanwali == 'hidup') selected="selected"
                                                        @endif @endif>Hidup</option>
                                                    <option value="meninggal" @if(isset($orangtuawali->keadaanwali))
                                                        @if($orangtuawali->keadaanwali == 'meninggal')
                                                        selected="selected" @endif @endif>Meninggal</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div> --}}
                                    <div class="mb-0 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Hubungan dengan
                                            Siswa</label>
                                        <div class="col-sm-3">
                                            <fieldset class="form-group">
                                                <select class="form-select text-center" id="basicSelect"
                                                    name="hubungandgnsiswawali">
                                                    <option value="">[ PILIH ]</option>
                                                    <option value="kakek" @if(isset($orangtuawali->hubungandgnsiswawali)) @if($orangtuawali->hubungandgnsiswawali == 'kakek') selected="selected" @endif @endif>Kakek</option>
                                                    <option value="nenek" @if(isset($orangtuawali->hubungandgnsiswawali)) @if($orangtuawali->hubungandgnsiswawali == 'nenek') selected="selected" @endif @endif>Nenek</option>
                                                    <option value="paman" @if(isset($orangtuawali->hubungandgnsiswawali))
                                                        @if($orangtuawali->hubungandgnsiswawali == 'paman')
                                                        selected="selected" @endif @endif>Paman</option>
                                                    <option value="bibi" @if(isset($orangtuawali->hubungandgnsiswawali))
                                                        @if($orangtuawali->hubungandgnsiswawali == 'bibi')
                                                        selected="selected" @endif @endif>Bibi</option>
                                                    <option value="kakak" @if(isset($orangtuawali->hubungandgnsiswawali))
                                                        @if($orangtuawali->hubungandgnsiswawali == 'kakak')
                                                        selected="selected" @endif @endif>Kakak</option>
                                                    <option value="ayah tiri" @if(isset($orangtuawali->hubungandgnsiswawali))
                                                        @if($orangtuawali->hubungandgnsiswawali == 'ayah tiri')
                                                        selected="selected" @endif @endif>Ayah Tiri</option>
                                                    <option value="ibu tiri" @if(isset($orangtuawali->hubungandgnsiswawali))
                                                        @if($orangtuawali->hubungandgnsiswawali == 'ibu tiri')
                                                        selected="selected" @endif @endif>Ibu Tiri</option>
                                                    <option value="famili lain" @if(isset($orangtuawali->hubungandgnsiswawali))
                                                        @if($orangtuawali->hubungandgnsiswawali == 'famili lain')
                                                        selected="selected" @endif @endif>Famili Lain</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="mb-2 row mt-3">
                                        <label for="nis" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control text-center" id="nis"
                                                name="tmptlahirwali"
                                                value="@if(isset($orangtuawali->tmptlahirwali)) {{$orangtuawali->tmptlahirwali}} @endif">
                                        </div>
                                    </div>
                                    <div class="mb-2 row mt-3">
                                        <label for="nis" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-2">
                                            <input type="date" class="form-control text-center" id="nis"
                                                name="tgllahirwali" value=@if(isset($orangtuawali->tgllahirwali))
                                            {{$orangtuawali->tgllahirwali}} @endif>
                                        </div>
                                    </div>
                                    <div class="mb-0 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Pendidikan
                                            Tertinggi</label>
                                        <div class="col-sm-3">
                                            <fieldset class="form-group">
                                                <select class="form-select text-center" id="basicSelect"
                                                    name="pendidikantertinggiwali">
                                                    <option value="">[ PILIH ]</option>
                                                    <option value="taman kanak kanak" @if(isset($orangtuawali->pendidikantertinggiwali))
                                                        @if($orangtuawali->pendidikantertinggiwali == 'taman kanak kanak') selected="selected" @endif @endif>Taman Kanak-kanak
                                                    </option>
                                                    <option value="sd sederajat" @if(isset($orangtuawali->pendidikantertinggiwali))
                                                        @if($orangtuawali->pendidikantertinggiwali == 'sd sederajat')
                                                        selected="selected" @endif @endif>SD Sederajat</option>
                                                    <option value="smp sederajat" @if(isset($orangtuawali->pendidikantertinggiwali))
                                                        @if($orangtuawali->pendidikantertinggiwali == 'smp sederajat')
                                                        selected="selected" @endif @endif>SMP Sederajat</option>
                                                    <option value="sma sederajat" @if(isset($orangtuawali->pendidikantertinggiwali))
                                                        @if($orangtuawali->pendidikantertinggiwali == 'sma sederajat')
                                                        selected="selected" @endif @endif>SMA Sederajat</option>
                                                    <option value="diploma 1" @if(isset($orangtuawali->pendidikantertinggiwali))
                                                        @if($orangtuawali->pendidikantertinggiwali == 'diploma 1')
                                                        selected="selected" @endif @endif>Diploma I</option>
                                                    <option value="diploma 2" @if(isset($orangtuawali->pendidikantertinggiwali))
                                                        @if($orangtuawali->pendidikantertinggiwali == 'diploma 2')
                                                        selected="selected" @endif @endif>Diploma II</option>
                                                    <option value="diploma 3" @if(isset($orangtuawali->pendidikantertinggiwali))
                                                        @if($orangtuawali->pendidikantertinggiwali == 'diploma 3')
                                                        selected="selected" @endif @endif>Diploma III</option>
                                                    <option value="diploma 4" @if(isset($orangtuawali->pendidikantertinggiwali))
                                                        @if($orangtuawali->pendidikantertinggiwali == 'diploma 4')
                                                        selected="selected" @endif @endif>Diploma IV</option>
                                                    <option value="strata 1" @if(isset($orangtuawali->pendidikantertinggiwali))
                                                        @if($orangtuawali->pendidikantertinggiwali == 'strata 1')
                                                        selected="selected" @endif @endif>Strata I</option>
                                                    <option value="strata 2" @if(isset($orangtuawali->pendidikantertinggiwali))
                                                        @if($orangtuawali->pendidikantertinggiwali == 'strata 2')
                                                        selected="selected" @endif @endif>Strata II</option>
                                                    <option value="strata 3" @if(isset($orangtuawali->pendidikantertinggiwali))
                                                        @if($orangtuawali->pendidikantertinggiwali == 'strata 3')
                                                        selected="selected" @endif @endif>Strata III</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <hr class="mt-3">
                                    <div class="mb-2 row mt-3">
                                        <div class="col-sm-3">
                                            <label for="nis" class="col-form-label">Alamat Rumah</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="row mb-3 col-sm-4">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="copyalamatwali()">Alamat sama dengan Siswa</button>
                                            </div>
                                            <div class="col-md-12 row mb-3">
                                                <div>
                                                    <label for="nis" class="col-form-label">Jalan / Gg / Kp.</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="col-sm-12 form-control" id="jalanwali"
                                                        name="jalanwali"
                                                        value="@if(isset($orangtuawali->jalanwali)) {{$orangtuawali->jalanwali}} @endif">
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="nis" class="col-form-label">RT</label>
                                                    </div>
                                                    <div>
                                                        <input type="number" class="form-control" id="rtwali"
                                                            name="rtwali"
                                                            value="{{!isset($orangtuawali->rtwali) ?"":$orangtuawali->rtwali;}}"
                                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            maxlength="2">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="nis" class="col-form-label">RW</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" id="rwwali"
                                                            name="rwwali"
                                                            value="{{!isset($orangtuawali->rwwali) ?"":$orangtuawali->rwwali;}}"
                                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            maxlength="2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div>
                                                    <label for="nis" class="col-form-label">Kelurahan</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="col-sm-12 form-control" id="kelurahanwali"
                                                        name="kelurahanwali"
                                                        value="@if(isset($orangtuawali->kelurahanwali)) {{$orangtuawali->kelurahanwali}} @endif">
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div>
                                                    <label for="nis" class="col-form-label">Kecamatan</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="col-sm-12 form-control" id="kecamatanwali"
                                                        name="kecamatanwali"
                                                        value="@if(isset($orangtuawali->kecamatanwali)) {{$orangtuawali->kecamatanwali}} @endif">
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div>
                                                    <label for="nis" class="col-form-label">Kota / Kabupaten</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="col-sm-12 form-control" id="kotawali"
                                                        name="kotawali"
                                                        value="@if(isset($orangtuawali->kotawali)) {{$orangtuawali->kotawali}} @endif">
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div>
                                                    <label for="nis" class="col-form-label">Kode POS</label>
                                                </div>
                                                <div>
                                                    <input type="number" class="col-sm-12 form-control" id="poswali"
                                                        name="kodeposwali"
                                                        value="{{!isset($orangtuawali->kodeposwali) ?"":$orangtuawali->kodeposwali;}}"
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-0 row mt-3">
                                        <label for="telprumah" class="col-sm-3 col-form-label">Telepon Rumah</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="telprumahwali"
                                                name="telprumahwali"
                                                value="{{!isset($orangtuawali->telprumahwali) ?"":$orangtuawali->telprumahwali;}}"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                maxlength="10">
                                        </div>
                                    </div>
                                    <div class="mb-5 row mt-3">
                                        <label for="nohp" class="col-sm-3 col-form-label">Nomor HP</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="nohp" name="nohpwali"
                                            value="{{!isset($orangtuawali->nohpwali) ?"":$orangtuawali->nohpwali;}}"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                maxlength="13">
                                        </div>
                                    </div>
                                    <div class="mb-0 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Profesi</label>
                                        <div class="col-sm-3">
                                            <fieldset class="form-group">
                                                <select class="form-select text-center" id="basicSelect"
                                                    name="profesiwali">
                                                    <option value="">[ PILIH ]</option>
                                                    <option value="tidak bekerja" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'tidak bekerja')
                                                        selected="selected"
                                                        @endif @endif>TIdak Bekerja</option>
                                                    <option value="nelayan" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'nelayan') selected="selected"
                                                        @endif @endif>Nelayan</option>
                                                    <option value="petani" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'petani') selected="selected"
                                                        @endif @endif>Petani</option>
                                                    <option value="peternak" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'peternak')
                                                        selected="selected"
                                                        @endif @endif>Peternak</option>
                                                    <option value="pns/tni/polri" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'pns/tni/polri')
                                                        selected="selected"
                                                        @endif @endif>PNS/TNI/POLRI</option>
                                                    <option value="karyawan swasta" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'karyawan swasta')
                                                        selected="selected"
                                                        @endif @endif>Karyawan Swasta</option>
                                                    <option value="pedagang kecil" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'pedagang kecil')
                                                        selected="selected"
                                                        @endif @endif>Pedagang Kecil</option>
                                                    <option value="pedagang besar" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'pedagang besar')
                                                        selected="selected"
                                                        @endif @endif>Pedagang Besar</option>
                                                    <option value="wiraswasta" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'wiraswasta')
                                                        selected="selected"
                                                        @endif @endif>Wiraswasta</option>
                                                    <option value="warausaha" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'warausaha')
                                                        selected="selected"
                                                        @endif @endif>Wirausaha</option>
                                                    <option value="buruh" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'buruh') selected="selected"
                                                        @endif @endif>Buruh</option>
                                                    <option value="pensiunan" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'pensiunan')
                                                        selected="selected"
                                                        @endif @endif>Pensiunan</option>
                                                    <option value="tenaga kerja indonesia" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'tenaga kerja indonesia')
                                                        selected="selected"
                                                        @endif @endif>Tenaga Kerja Indonesia</option>
                                                    <option value="karyawan bumn" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'karyawan bumn')
                                                        selected="selected"
                                                        @endif @endif>Karyawan BUMN</option>
                                                    <option value="tidak dapat diterapkan" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'tidak dapat diterapkan')
                                                        selected="selected"
                                                        @endif @endif>Tidak dapat diterapkan</option>
                                                    <option value="lainnya" @if(isset($orangtuawali->profesiwali))
                                                        @if($orangtuawali->profesiwali == 'lainnya') selected="selected"
                                                        @endif @endif>Lainnya</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="mb-0 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Penghasilan</label>
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <select class="form-select text-center" id="basicSelect"
                                                    name="penghasilanwali">
                                                    <option value="">[ PILIH ]</option>
                                                    <option value="Tidak Berpenghasilan" @if(isset($orangtuawali->penghasilanwali))
                                                        @if($orangtuawali->penghasilanwali == 'Tidak Berpenghasilan')
                                                        selected="selected" @endif @endif>Tidak Berpenghasilan</option>
                                                    <option value="Kurang dari Rp. 500.000" @if(isset($orangtuawali->penghasilanwali)) @if($orangtuawali->penghasilanwali == 'Kurang dari Rp. 500.000') selected="selected" @endif @endif>Kurang dari
                                                        Rp. 500.000</option>
                                                    <option value="Rp. 500.000 - Rp. 999.000" @if(isset($orangtuawali->penghasilanwali)) @if($orangtuawali->penghasilanwali == 'Rp. 500.000 - Rp. 999.000') selected="selected" @endif @endif>Rp.
                                                        500.000 - Rp. 999.000</option>
                                                    <option value="Rp. 1.000.000 - Rp. 1.999.000"
                                                        @if(isset($orangtuawali->penghasilanwali))
                                                        @if($orangtuawali->penghasilanwali == 'Rp. 1.000.000 - Rp. 1.999.000') selected="selected" @endif @endif>Rp. 1.000.000 -
                                                        Rp. 1.999.000</option>
                                                    <option value="Rp. 2.000.000 - Rp. 4.999.000"
                                                        @if(isset($orangtuawali->penghasilanwali))
                                                        @if($orangtuawali->penghasilanwali == 'Rp. 2.000.000 - Rp. 4.999.000') selected="selected" @endif @endif>Rp. 2.000.000 -
                                                        Rp. 4.999.000</option>
                                                    <option value="Rp. 5.000.000 - Rp. 19.999.000"
                                                        @if(isset($orangtuawali->penghasilanwali))
                                                        @if($orangtuawali->penghasilanwali == 'Rp. 5.000.000 - Rp. 19.999.000') selected="selected" @endif @endif>Rp. 5.000.000 -
                                                        Rp. 19.999.000</option>
                                                    <option value="Diatas Rp. 20.000.000" @if(isset($orangtuawali->penghasilanwali)) @if($orangtuawali->penghasilanwali == 'Diatas Rp. 20.000.000') selected="selected" @endif @endif>Diatas Rp.
                                                        20.000.000</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-success me-md-2" type="submit"><span><i
                                                class="bi bi-save"></i>
                                            SIMPAN</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- DATA HOBI DAN MINAT  -->
            <div class="tab-pane fade {{ $page == 6 ? 'show active' : '' }}" id="pills-hobiminat" role="tabpanel"
                aria-labelledby="pills-hobiminat-tab">
                <form enctype="multipart/form-data" action="{{route('inserthobidanminat')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-success">
                            <h4 class="card-title text-white  mb-0">Data Hobi dan Minat</h4>
                        </div>
                        <div class="card-body px-12 border border-success">
                            <div class="row mt-4">
                                <div class="card border border-warning border-3">
                                    <div class="card-header ">
                                        <h4 class="card-title text-warning">DATA HOBI, CITA - CITA & MINAT EKSKUL</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            <li>Data tidak boleh kosong, Isi minimal 1 <b>( SATU )</b></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mb-2 row mt-3">
                                    <div class="mb-2 row mt-3">
                                        <div class="col-sm-3">
                                            <label for="nis" class="col-form-label"><h3>Hobi</h3></label>
                                            <hr class="mt-0">
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="membaca" name="hobi[]" id="cb_membaca"
                                                        @if(in_array("membaca", $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Membaca
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" id="cb_menulis" value="menulis" name="hobi[]"
                                                        @if(in_array("menulis", $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Menulis
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" id="cb_menggambar" value="menggambar"
                                                        name="hobi[]" @if(in_array("menggambar", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Menggambar
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="mewarnai" id="cb_mewarnai"
                                                        name="hobi[]" @if(in_array("mewarnai", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Mewarnai
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="menjahit" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("menjahit", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Menjahit
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="bermain gitar" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("bermain gitar", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Bermain Gitar
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="bermain biola" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("bermain biola", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Bermain Biola
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="bermain piano" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("bermain piano", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Bermain Piano
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="kesenian" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("kesenian", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Kesenian
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="bermain musik lainnya"
                                                        id="flexCheckDefault" name="hobi[]" @if(in_array("bermain musik lainnya", $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Bermain Musik Lainnya
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="bermain bola" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("bermain bola", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Bermain Bola
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="bermain bulu tangkis"
                                                        id="flexCheckDefault" name="hobi[]" @if(in_array("bermain bulu tangkis", $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Bermain Bulu Tangkis
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="bermain bola tenis" id="flexCheckDefault"
                                                        name="hobi[] Tenis" @if(in_array("bermain bola tenis",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Bermain Bola Tenis
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="berlari" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("berlari", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Berlari
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="jogging" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("jogging", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Jogging
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="fitness" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("fitness", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Fitness
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="traveling" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("traveling", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Traveling
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="fotografi" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("fotografi", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Fotografi
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="berkemah" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("berkemah", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Berkemah
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="memancing" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("memancing", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Memancing
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="berselancar" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("berselancar", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Berselancar
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="belanja" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("belanja", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Belanja
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="makan" id="flexCheckDefault"
                                                        name="hobi[]" @if(in_array("makan", $arrayhobidanminat)) checked
                                                        @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Makan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-3">
                                    <div class="mb-2 row mt-3">
                                        <div class="col-sm-3">
                                            <label for="nis" class="col-form-label"><h3>Cita-Cita</h3></label>
                                            <hr class="mt-0">
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Pegawai Negeri Sipil"
                                                        id="flexCheckDefault" name="cita_cita[]" @if(in_array("Pegawai Negeri Sipil", $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Pegawai Negeri Sipil
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="TNI/Polri" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("TNI/Polri",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        TNI/Polri
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Guru/Dosen" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Guru/Dosen",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Guru/Dosen
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Dokter" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Dokter", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Dokter
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Politikus" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Politikus",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Politikus
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Wiraswasta" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Wiraswasta",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Wiraswasta
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Penghafal Al-Quran" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Penghafal Al-Quran",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Penghafal Al-Quran
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Dai/Ustadz" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Dai/Ustadz",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Dai/Ustadz
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Pendeta" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Pendeta", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Pendeta
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Pengacara" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Pengacara",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Pengacara
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Wartawan" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Wartawan", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Wartawan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Penulis" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Penulis", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Penulis
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Penyiar Radio" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Penyiar Radio",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Penyiar Radio
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Pembawa Acara/Master Ceremony"
                                                        id="flexCheckDefault" name="cita_cita[]" @if(in_array("Pembawa Acara/Master Ceremony", $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Pembawa Acara/Master Ceremony (MC)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Translator" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Translator",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Translator
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Content Creator" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Content Creator",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Content Creator
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Vlogger" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Vlogger", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Vlogger
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Enterntainer/Pekerja Seni"
                                                        id="flexCheckDefault" name="cita_cita[]"
                                                        @if(in_array("Enterntainer/Pekerja Seni", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Enterntainer/Pekerja Seni
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Atlet Olahraga" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Atlet Olahraga",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Atlet Olahraga
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Atlet E-sport Profesional"
                                                        id="flexCheckDefault" name="cita_cita[]" @if(in_array("Atlet E-sport Profesional", $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Atlet E-sport Profesional
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Pengusaha / Bisnismen"
                                                        id="flexCheckDefault" name="cita_cita[]"
                                                        @if(in_array("Pengusaha / Bisnismen", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Pengusaha / Bisnismen
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Pembalap" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Pembalap", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Pembalap
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Pilot" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Pilot", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Pilot
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Koki" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Koki", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Koki
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Pemadam Kebakaran" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Pemadam Kebakaran",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Pemadam Kebakaran
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Astronot" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Astronot", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Astronot
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Masinis" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Masinis", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Masinis
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Perawat/Suster" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Perawat/Suster",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Perawat/Suster
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Bidan" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Bidan", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Bidan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Designer" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Designer", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Designer
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Pelaut" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Pelaut", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Pelaut
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Arsitek" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Arsitek", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Arsitek
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Presiden" id="flexCheckDefault"
                                                        name="cita_cita[]" @if(in_array("Presiden", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Presiden
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-3">
                                    <div class="mb-2 row mt-3">
                                        <div class="col-sm-3">
                                            <label for="nis" class="col-form-label"><h3>Minat Ekskul</h3></label>
                                            <hr class="mt-0">
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="OSIS" name="minat_ekskul[]" id="cb_OSIS"
                                                        @if(in_array("OSIS", $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        OSIS
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Paskibra" name="minat_ekskul[]"
                                                        id="cb_Paskibra" @if(in_array("Paskibra", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Paskibra
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="PMR" name="minat_ekskul[]" id="cb_PMR"
                                                        @if(in_array("PMR", $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        PMR
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Pramuka" name="minat_ekskul[]"
                                                        id="cb_Pramuka" @if(in_array("Pramuka", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Pramuka
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Teater" name="minat_ekskul[]"
                                                        id="cb_Teater" @if(in_array("Teater", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Teater
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Paduan Suara" name="minat_ekskul[]"
                                                        id="cb_Paduan Suara" @if(in_array("Paduan Suara",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Paduan Suara
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Modern Dance" name="minat_ekskul[]"
                                                        id="cb_Modern Dance" @if(in_array("Modern Dance",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Modern Dance
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Degung" name="minat_ekskul[]"
                                                        id="cb_Degung" @if(in_array("Degung", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Degung
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Angklung" name="minat_ekskul[]"
                                                        id="cb_Angklung" @if(in_array("Angklung", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Angklung
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Japanese Club" name="minat_ekskul[]"
                                                        id="cb_Japanese Club" @if(in_array("Japanese Club",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Japanese Club
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Jurnalistik $ Broadcasting"
                                                        name="minat_ekskul[]" id="cb_Jurnalistik $ Broadcasting"
                                                        @if(in_array("Jurnalistik $ Broadcasting", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Jurnalistik & Broadcasting
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="DKM" name="minat_ekskul[]" id="cb_DKM"
                                                        @if(in_array("DKM", $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        DKM
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Karate" name="minat_ekskul[]"
                                                        id="cb_Karate" @if(in_array("Karate", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Karate
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Taekwondo" name="minat_ekskul[]"
                                                        id="cb_Taekwondo" @if(in_array("Taekwondo", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Taekwondo
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Pencak Silat" name="minat_ekskul[]"
                                                        id="cb_Pencak Silat" @if(in_array("Pencak Silat",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Pencak Silat
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Futsal" name="minat_ekskul[]"
                                                        id="cb_Futsal" @if(in_array("Futsal", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Futsal
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Softball" name="minat_ekskul[]"
                                                        id="cb_Softball" @if(in_array("Softball", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Softball
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Bulutangkis" name="minat_ekskul[]"
                                                        id="cb_Bulutangkis" @if(in_array("Bulutangkis",
                                                        $arrayhobidanminat)) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Bulutangkis
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input form-check-glow form-check-success"
                                                        type="checkbox" value="Basket" name="minat_ekskul[]"
                                                        id="cb_Basket" @if(in_array("Basket", $arrayhobidanminat))
                                                        checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Basket
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="mb-2 row mt-3">
                                        <div class="col-sm-3">
                                            <label for="nis" class="col-form-label">Prestasi</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="d-grid gap-2 d-md-block mb-4">
                                                <button class="btn btn-success" id="tambah_prestasi"
                                                    type="button">Tambah</button>
                                                <button class="btn btn-danger" id="hapus_prestasi"
                                                    type="button">Hapus</button>
                                            </div>
                                            <input type="text" id="no_prestasi" name="no_prestasi"
                                                value="@if(count($prestasi)==0){{1}}@else{{count($prestasi)}}@endif"
                                                hidden>


                                            @if($prestasi=='[]')
                                            <div id="div_field_prestasi1">
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">Nama
                                                        Prestasi</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="nama_prestasi1"
                                                            name="nama_prestasi1">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">Jenis
                                                        Prestasi</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="jenis_prestasi1"
                                                            name="jenis_prestasi1">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">Tahun
                                                        Prestasi</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="tahun_prestasi1"
                                                            name="tahun_prestasi1">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword"
                                                        class="col-sm-2 col-form-label">Penyelenggara</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="penyelenggara1"
                                                            name="penyelenggara1">
                                                    </div>
                                                </div>
                                                <br>
                                                <hr><br>
                                            </div>
                                            @else
                                            <?php $i=1; ?>
                                            @foreach($prestasi as $row)
                                            <div id="div_field_prestasi{{$i}}">
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">Nama
                                                        Prestasi</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="nama_prestasi{{$i}}"
                                                            name="nama_prestasi{{$i}}" value="{{$row->nama_prestasi}}">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">Jenis
                                                        Prestasi</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control"
                                                            id="jenis_prestasi{{$i}}" name="jenis_prestasi{{$i}}"
                                                            value="{{$row->jenis_prestasi}}">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">Tahun
                                                        Prestasi</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control"
                                                            id="tahun_prestasi{{$i}}" name="tahun_prestasi{{$i}}"
                                                            value="{{$row->tahun_prestasi}}">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword"
                                                        class="col-sm-2 col-form-label">Penyelenggara</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="penyelenggara{{$i}}"
                                                            name="penyelenggara{{$i++}}"
                                                            value="{{$row->penyelenggara}}">
                                                    </div>
                                                </div>
                                                <br>
                                                <hr><br>
                                            </div>
                                            @endforeach
                                            @endif
                                            <div id="div_tambah_field_prestasi"></div>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-success me-md-2" type="submit"><span><i
                                                    class="bi bi-save"></i>
                                                SIMPAN</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- DATA PEMINATAN  -->
            <div class="tab-pane fade {{ $page == 7 ? 'show active' : '' }}" id="pills-peminatan" role="tabpanel" aria-labelledby="pills-peminatan-tab">
                <form enctype="multipart/form-data" action="{{route('insertpeminatan')}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header bg-success">
                        <h4 class="card-title text-white  mb-0">Data Peminatan dan Rapor</h4>
                    </div>
                    <div class="card-body px-12 border border-success">
                        <div class="row mt-4">
                            <div class="card border border-warning border-3">
                                <div class="card-header ">
                                    <h4 class="card-title text-warning">DATA PEMINATAN & RAPOR</h4>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <P class="fw-bold">PEMINATAN</P>
                                        <li class="text-danger">WAJIB DIISI</li>
                                        <li>Dibawah ini terdapat beberapa pilihan form peminatan beserta lintas
                                            minatnya
                                        </li>
                                        <li>Jika pada peminatan pilihan 1 ananda memilih <b class="text-danger">"MIPA"</b>,
                                            maka pilihan lintas minatnya yang
                                            akan
                                            dipelajari merupakan mata pelajaran dari <b class="text-danger">IPS</b>
                                            seperti : <b class="text-info">Ekonomi, Sosiologi, Geografi</b></li>
                                        <li>Sebaliknya, Jika pada peminatan pilihan 1 ananda memilih <b
                                                class="text-danger">"IPS"</b>, maka pilihan lintas minatnya yang
                                            akan
                                            dipelajari merupakan mata pelajaran dari <b class="text-danger">MIPA</b>
                                            seperti : <b class="text-info">Fisika, Kimia, Biologi</b></li>
                                    </ul>
                                    <hr>
                                    <ul>
                                        <P class="fw-bold">RAPOR</P>
                                        <li class="text-danger">WAJIB DIISI</li>
                                        <li>Isi data nilai rapor dengan <b class="text-danger">nilai pengetahuan</b>
                                            dari <b class="text-danger">Semester 1</b> s/d <b class="text-danger">Semester
                                                5</b>
                                        </li>
                                    </ul>
                                    <small>Catatan :</small>
                                    <p class="text-danger fw-bold">Pilihan ananda tidak menentukan langsung apakah
                                        ananda masuk ke jurusan yang ananda pilih, tetapi untuk memudahkan tim
                                        Bimbingan
                                        Konseling dalam pengolahan data. Penetapan ananda masuk MIPA atau IPS
                                        diseleksi
                                        melalu nilai raport dan tes wawancara yang dilaksanakan oleh tim Bimbingan
                                        Konseling.</p>
                                </div>
                            </div>
                            <div class="mb-2 row mt-3">
                                <div class="col-sm-3">
                                    <label for="nis" class="col-form-label">Data Peminatan</label>
                                </div>
                                <input id="field1" hidden
                                    value="@if(isset($peminatan->pilminatsatu)){{$peminatan->pilminatsatu}}@endif">
                                <input id="field2" hidden
                                    value="@if(isset($peminatan->linminpilsatu)){{$peminatan->linminpilsatu}}@endif">
                                <input id="field3" hidden
                                    value="@if(isset($peminatan->pilminatdua)){{$peminatan->pilminatdua}}@endif">
                                <input id="field4" hidden
                                    value="@if(isset($peminatan->linminpildua)){{$peminatan->linminpildua}}@endif">
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div>
                                                <label class="col-form-label">Peminatan Pilihan 1</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <fieldset class="form-group">
                                                    <select class="form-select text-center" id="pilminatsatu"
                                                        name="pilminatsatu" required>
                                                        <option value="">[ PILIH ]</option>
                                                        <option value="MIPA">MIPA</option>
                                                        <option value="IPS">IPS</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div>
                                                <label class="col-form-label">Lintas Minat Pilihan Peminatan
                                                    1</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <fieldset class="form-group">
                                                    <select class="form-select text-center" id="linminpilsatu"
                                                        name="linminpilsatu" disabled required>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div>
                                                <label class="col-form-label">Peminatan Pilihan 2</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <fieldset class="form-group">
                                                    <select class="form-select text-center" id="pilminatdua"
                                                        name="pilminatdua" disabled required>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div>
                                                <label class="col-form-label">Lintas Minat Pilihan Peminatan
                                                    2</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <fieldset class="form-group">
                                                    <select class="form-select text-center" id="linminpildua"
                                                        name="linminpildua" disabled required>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-2 mb-3">
                            <div class="tabel">
                                <table class="table table-bordered  text-center">
                                    <tbody>
                                        <tr>
                                            <th rowspan="3"><b>No</b></th>
                                            <th rowspan="3"><b>Nama Mata Pelajaran</b></th>
                                            <th colspan="5"><b>Nilai Raport Kelas ( NILAI PENGETAHUAN )</b></th>
                                        </tr>
                                        <tr>
                                            <th colspan="2"><b>VII</b></th>
                                            <th colspan="2"><b>VIII</b></th>
                                            <th><b>IX</b></th>
                                        </tr>
                                        <tr>
                                            <th><b>1</b></th>
                                            <th><b>2</b></th>
                                            <th><b>3</b></th>
                                            <th><b>4</b></th>
                                            <th><b>5</b></th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><b>Bahasa Indonesia</b></td>
                                            <td>
                                                <center><input type="text" class="form-control text-center"
                                                        id="peminatan" name="bindosatu"
                                                        value="@if(isset($peminatan->bindosatu)) {{$peminatan->bindosatu}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="bindodua"
                                                        value="@if(isset($peminatan->bindodua)) {{$peminatan->bindodua}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="bindotiga"
                                                        value="@if(isset($peminatan->bindotiga)) {{$peminatan->bindotiga}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="bindoempat"
                                                        value="@if(isset($peminatan->bindoempat)) {{$peminatan->bindoempat}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="bindolima"
                                                        value="@if(isset($peminatan->bindolima)) {{$peminatan->bindolima}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><b>Bahasa Inggris</b></td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="bingsatu"
                                                        value="@if(isset($peminatan->bingsatu)) {{$peminatan->bingsatu}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="bingdua"
                                                        value="@if(isset($peminatan->bingdua)) {{$peminatan->bingdua}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="bingtiga"
                                                        value="@if(isset($peminatan->bingtiga)) {{$peminatan->bingtiga}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="bingempat"
                                                        value="@if(isset($peminatan->bingempat)) {{$peminatan->bingempat}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="binglima"
                                                        value="@if(isset($peminatan->binglima)) {{$peminatan->binglima}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><b>Matematika</b></td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="mtksatu"
                                                        value="@if(isset($peminatan->mtksatu)) {{$peminatan->mtksatu}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="mtkdua"
                                                        value="@if(isset($peminatan->mtkdua)) {{$peminatan->mtkdua}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="mtktiga"
                                                        value="@if(isset($peminatan->mtktiga)) {{$peminatan->mtktiga}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="mtkempat"
                                                        value="@if(isset($peminatan->mtkempat)) {{$peminatan->mtkempat}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="mtklima"
                                                        value="@if(isset($peminatan->mtklima)) {{$peminatan->mtklima}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><b>IPA</b></td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="ipasatu"
                                                        value="@if(isset($peminatan->ipasatu)) {{$peminatan->ipasatu}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="ipadua"
                                                        value="@if(isset($peminatan->ipadua)) {{$peminatan->ipadua}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="ipatiga"
                                                        value="@if(isset($peminatan->ipatiga)) {{$peminatan->ipatiga}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="ipaempat"
                                                        value="@if(isset($peminatan->ipaempat)) {{$peminatan->ipaempat}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="ipalima"
                                                        value="@if(isset($peminatan->ipalima)) {{$peminatan->ipalima}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><b>IPS</b></td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="ipssatu"
                                                        value="@if(isset($peminatan->ipssatu)) {{$peminatan->ipssatu}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="ipsdua"
                                                        value="@if(isset($peminatan->ipsdua)) {{$peminatan->ipsdua}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="ipstiga"
                                                        value="@if(isset($peminatan->ipstiga)) {{$peminatan->ipstiga}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="ipsempat"
                                                        value="@if(isset($peminatan->ipsempat)) {{$peminatan->ipsempat}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                            <td>
                                                <center><input type="text" class="form-control text-center" name="ipslima"
                                                        value="@if(isset($peminatan->ipslima)) {{$peminatan->ipslima}} @endif"
                                                        style="width: 60px" required></center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-success me-md-2" type="submit"><span><i class="bi bi-save"></i>
                                        SIMPAN</span></button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <!-- DATA SCAN BERKAS  -->
            <div class="tab-pane fade {{ $page == 8 ? 'show active' : '' }}" id="pills-scanberkas" role="tabpanel"
                aria-labelledby="pills-scanberkas-tab">
                <form enctype="multipart/form-data" action="{{route('insertfileberkas')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-success">
                            <h4 class="card-title text-white  mb-0">Data Scan Berkas</h4>
                        </div>
                        <div class="card-body px-12 border border-success">
                            <div class="row mt-4">
                                <div class="mb-3 row mt-3" id="berkasijazah">
                                    <div class="d-md-flex">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Ijazah SMP</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="file" id="ijasah" name="ijasah">
                                            <p><small class="text-danger">( File: .pdf maximal file 1Mb )</small></p>
                                        </div>
                                    </div>
                                    @if(isset($ijasah->nama))
                                    <a target="_blank" href="/files/ijasah/{{$ijasah->nama}}" class="btn btn-primary" style="width:150px">
                                        <h6 class="text-white mt-2 mx-auto"><i class="bi bi-eye"> Lihat Berkas</i></h6>
                                    </a>
                                    @endif
                                </div>
                                <hr class="mt-2 mb-3">
                                <div class="mb-3 row mt-3 " id="berkaskk">
                                    <div class="d-md-flex">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Kartu Keluarga</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="file" id="kartu_keluarga"
                                                name="kartu_keluarga">
                                            <p><small class="text-danger">( File: .pdf maximal file 1Mb )</small></p>
                                        </div>
                                    </div>
                                    @if(isset($kk->nama))
                                    <a target="_blank" href="/files/kartu keluarga/{{$kk->nama}}" class="btn btn-primary" style="width:150px">
                                        <h6 class="text-white mt-2 mx-auto"><i class="bi bi-eye"> Lihat Berkas</i></h6>
                                    </a>
                                    @endif
                                </div>
                                <hr class="mt-2 mb-3">
                                <div class="mb-3 row mt-3 " id="berkasakta">
                                    <div class="d-md-flex">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Akta Lahir</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="file" id="akta_lahir" name="akta_lahir">
                                            <p><small class="text-danger">( File: .pdf maximal file 1Mb )</small></p>
                                        </div>
                                    </div>
                                    @if(isset($akta->nama))
                                    <a target="_blank" href="/files/akta lahir/{{$akta->nama}}" class="btn btn-primary" style="width:150px">
                                        <h6 class="text-white mt-2 mx-auto"><i class="bi bi-eye"> Lihat Berkas</i></h6>
                                    </a>
                                    @endif
                                </div>
                                <hr class="mt-2 mb-3">
                                <div class="mb-3 row mt-3 " id="berkaskis" >
                                    <div class="d-md-flex">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Kartu Indonesia Sehat (
                                            KIS
                                            )</label>

                                        <div class="col-sm-5">
                                            <input class="form-control" type="file" id="kis" name="kis">
                                            <p><small class="text-danger">( File: .pdf maximal file 1Mb )</small></p>
                                        </div>
                                    </div>
                                    @if(isset($kis->nama))
                                    <a target="_blank" href="/files/kis/{{$kis->nama}}" class="btn btn-primary" style="width:150px">
                                        <h6 class="text-white mt-2 mx-auto"><i class="bi bi-eye"> Lihat Berkas</i></h6>
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="width: 60px"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M384 128h-128V0L384 128zM256 160H384v304c0 26.51-21.49 48-48 48h-288C21.49 512 0 490.5 0 464v-416C0 21.49 21.49 0 48 0H224l.0039 128C224 145.7 238.3 160 256 160zM255 295L216 334.1V232c0-13.25-10.75-24-24-24S168 218.8 168 232v102.1L128.1 295C124.3 290.3 118.2 288 112 288S99.72 290.3 95.03 295c-9.375 9.375-9.375 24.56 0 33.94l80 80c9.375 9.375 24.56 9.375 33.94 0l80-80c9.375-9.375 9.375-24.56 0-33.94S264.4 285.7 255 295z"/></svg> --}}
                                    </a>
                                    @endif
                                </div>
                                <hr class="mt-2 mb-3" id="garis1">
                                <div class="mb-3 row mt-3" id="berkaskip">
                                    <div class="d-md-flex">    
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Kartu Indonesia Pintar (
                                            KIP
                                            )</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="file" id="kip" name="kip">
                                            <p><small class="text-danger">( File: .pdf maximal file 1Mb )</small></p>
                                        </div>
                                    </div>    
                                    @if(isset($kip->nama))
                                    <a target="_blank" href="/files/kip/{{$kip->nama}}" class="btn btn-primary" style="width:150px">
                                        <h6 class="text-white mt-2 mx-auto"><i class="bi bi-eye"> Lihat Berkas</i></h6>
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="width: 60px"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M384 128h-128V0L384 128zM256 160H384v304c0 26.51-21.49 48-48 48h-288C21.49 512 0 490.5 0 464v-416C0 21.49 21.49 0 48 0H224l.0039 128C224 145.7 238.3 160 256 160zM255 295L216 334.1V232c0-13.25-10.75-24-24-24S168 218.8 168 232v102.1L128.1 295C124.3 290.3 118.2 288 112 288S99.72 290.3 95.03 295c-9.375 9.375-9.375 24.56 0 33.94l80 80c9.375 9.375 24.56 9.375 33.94 0l80-80c9.375-9.375 9.375-24.56 0-33.94S264.4 285.7 255 295z"/></svg> --}}
                                    </a>
                                    @endif
                                </div>
                                <hr class="mt-2 mb-3" id="garis2">
                                <div class="mb-3 row mt-3" id="berkaskks">
                                    <div class="d-md-flex">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Kartu Keluarga Sejahtera ( KKS )</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="file" id="kks" name="kks">
                                            <p><small class="text-danger">( File: .pdf maximal file 1Mb )</small></p>
                                        </div>
                                    </div>    
                                        @if(isset($kks->nama))
                                        <a target="_blank" href="/files/kks/{{$kks->nama}}" class="btn btn-primary" style="width:150px">
                                            <h6 class="text-white mt-2 mx-auto"><i class="bi bi-eye"> Lihat Berkas</i></h6>
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="width: 60px"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M384 128h-128V0L384 128zM256 160H384v304c0 26.51-21.49 48-48 48h-288C21.49 512 0 490.5 0 464v-416C0 21.49 21.49 0 48 0H224l.0039 128C224 145.7 238.3 160 256 160zM255 295L216 334.1V232c0-13.25-10.75-24-24-24S168 218.8 168 232v102.1L128.1 295C124.3 290.3 118.2 288 112 288S99.72 290.3 95.03 295c-9.375 9.375-9.375 24.56 0 33.94l80 80c9.375 9.375 24.56 9.375 33.94 0l80-80c9.375-9.375 9.375-24.56 0-33.94S264.4 285.7 255 295z"/></svg> --}}
                                        </a>
                                        @endif
                                    </div>
                                <hr class="mt-2 mb-3" id="garis3">
                                <div class="mb-3 row mt-3" id="berkaspkh">
                                    <div class="d-md-flex">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Kartu Program Keluarga
                                            Harapan ( PKH )</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="file" id="pkh" name="pkh">
                                            <p><small class="text-danger">( File: .pdf maximal file 1Mb )</small></p>
                                        </div>
                                    </div>    
                                    @if(isset($pkh->nama))
                                    <a target="_blank" href="/files/pkh/{{$pkh->nama}}" class="btn btn-primary" style="width:150px">
                                        <h6 class="text-white mt-2 mx-auto"><i class="bi bi-eye"> Lihat Berkas</i></h6>
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="width: 60px"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M384 128h-128V0L384 128zM256 160H384v304c0 26.51-21.49 48-48 48h-288C21.49 512 0 490.5 0 464v-416C0 21.49 21.49 0 48 0H224l.0039 128C224 145.7 238.3 160 256 160zM255 295L216 334.1V232c0-13.25-10.75-24-24-24S168 218.8 168 232v102.1L128.1 295C124.3 290.3 118.2 288 112 288S99.72 290.3 95.03 295c-9.375 9.375-9.375 24.56 0 33.94l80 80c9.375 9.375 24.56 9.375 33.94 0l80-80c9.375-9.375 9.375-24.56 0-33.94S264.4 285.7 255 295z"/></svg> --}}
                                    </a>
                                     @endif
                                    </div>
                                <hr class="mt-2 mb-3" id="garis4">
                                <div class="mb-3 row mt-3" id="berkaskbs">
                                    <div class="d-md-flex">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Kartu Beras Sejahtera (
                                            KBS
                                            )</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="file" id="kbs" name="kbs">
                                            <p><small class="text-danger">( File: .pdf maximal file 1Mb )</small></p>
                                        </div>
                                    </div>        
                                    @if(isset($kbs->nama))
                                    <a target="_blank" href="/files/kbs/{{$kbs->nama}}" class="btn btn-primary" style="width:150px">
                                        <h6 class="text-white mt-2 mx-auto"><i class="bi bi-eye"> Lihat Berkas</i></h6>
                                       {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="width: 60px"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M384 128h-128V0L384 128zM256 160H384v304c0 26.51-21.49 48-48 48h-288C21.49 512 0 490.5 0 464v-416C0 21.49 21.49 0 48 0H224l.0039 128C224 145.7 238.3 160 256 160zM255 295L216 334.1V232c0-13.25-10.75-24-24-24S168 218.8 168 232v102.1L128.1 295C124.3 290.3 118.2 288 112 288S99.72 290.3 95.03 295c-9.375 9.375-9.375 24.56 0 33.94l80 80c9.375 9.375 24.56 9.375 33.94 0l80-80c9.375-9.375 9.375-24.56 0-33.94S264.4 285.7 255 295z"/></svg> --}}
                                    </a>
                                     @endif
                                    </div>

                                <hr class="mt-2 mb-3" id="garis5">
                                <div class="mb-3 row mt-3" id="berkasksm">
                                    <div class="d-md-flex">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Kartu Semobako Murah (
                                            KSM
                                            )</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="file" id="ksm" name="ksm">
                                            <p><small class="text-danger">( File: .pdf maximal file 1Mb )</small></p>
                                        </div>
                                    </div>    
                                    @if(isset($ksm->nama))
                                    <a target="_blank" href="/files/ksm/{{$ksm->nama}}" class="btn btn-primary" style="width:150px">
                                        <h6 class="text-white mt-2 mx-auto"><i class="bi bi-eye"> Lihat Berkas</i></h6>
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="width: 60px"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M384 128h-128V0L384 128zM256 160H384v304c0 26.51-21.49 48-48 48h-288C21.49 512 0 490.5 0 464v-416C0 21.49 21.49 0 48 0H224l.0039 128C224 145.7 238.3 160 256 160zM255 295L216 334.1V232c0-13.25-10.75-24-24-24S168 218.8 168 232v102.1L128.1 295C124.3 290.3 118.2 288 112 288S99.72 290.3 95.03 295c-9.375 9.375-9.375 24.56 0 33.94l80 80c9.375 9.375 24.56 9.375 33.94 0l80-80c9.375-9.375 9.375-24.56 0-33.94S264.4 285.7 255 295z"/></svg> --}}
                                    </a>
                                    @endif
                                    </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-success me-md-2" type="submit"><span><i
                                                class="bi bi-save"></i>
                                            SIMPAN</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="{{ asset('/js/siswa.js') }}"></script>

    </section>
    @if(session()->has('pribadisiswa'))
    <div class="position-fixed top-0 start-50 translate-middle-x" style="z-index: 11">
        <div id="liveToast" class="toast showing " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <strong class="me-auto text-white">Pesan</strong>
            </div>
            <div class="toast-body">
                {{ session('pesan') }}
            </div>
        </div>
    </div>
    @endif
    @if(session()->has('alamatisiswa'))
    <div class="position-fixed top-0 start-50 translate-middle-x" style="z-index: 11">
        <div id="liveToast" class="toast showing " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <strong class="me-auto text-white">Pesan</strong>
            </div>
            <div class="toast-body">
                {{ session('pesan') }}
            </div>
        </div>
    </div>
    @endif
    @if(session()->has('tandabadan'))
    <div class="position-fixed top-0 start-50 translate-middle-x" style="z-index: 11">
        <div id="liveToast" class="toast showing " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <strong class="me-auto text-white">Pesan</strong>
            </div>
            <div class="toast-body">
                {{ session('pesan') }}
            </div>
        </div>
    </div>
    @endif
    @if(session()->has('pendidikan'))
    <div class="position-fixed top-0 start-50 translate-middle-x" style="z-index: 11">
        <div id="liveToast" class="toast showing " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <strong class="me-auto text-white">Pesan</strong>
            </div>
            <div class="toast-body">
                {{ session('pesan') }}
            </div>
        </div>
    </div>
    @endif
    @if(session()->has('orangtuawali'))
    <div class="position-fixed top-0 start-50 translate-middle-x" style="z-index: 11">
        <div id="liveToast" class="toast showing " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <strong class="me-auto text-white">Pesan</strong>
            </div>
            <div class="toast-body">
                {{ session('pesan') }}
            </div>
        </div>
    </div>
    @endif
    @if(session()->has('hobiminat'))
    <div class="position-fixed top-0 start-50 translate-middle-x" style="z-index: 11">
        <div id="liveToast" class="toast showing " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <strong class="me-auto text-white">Pesan</strong>
            </div>
            <div class="toast-body">
                {{ session('pesan') }}
            </div>
        </div>
    </div>
    @endif
    @if(session()->has('peminatan'))
    <div class="position-fixed top-0 start-50 translate-middle-x" style="z-index: 11">
        <div id="liveToast" class="toast showing " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <strong class="me-auto text-white">Pesan</strong>
            </div>
            <div class="toast-body">
                {{ session('pesan') }}
            </div>
        </div>
    </div>
    @endif
    @if(session()->has('fileberkas'))
    <div class="position-fixed top-0 start-50 translate-middle-x" style="z-index: 11">
        <div id="liveToast" class="toast showing " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <strong class="me-auto text-white">Pesan</strong>
            </div>
            <div class="toast-body">
                {{ session('pesan') }}
            </div>
        </div>
    </div>
    @endif
    @if(session()->has('gagal'))
    <div class="position-fixed top-0 start-50 translate-middle-x" style="z-index: 11">
        <div id="liveToast" class="toast showing " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <strong class="me-auto text-white">Pesan</strong>
            </div>
            <div class="toast-body">
                {{ session('pesan') }}
            </div>
        </div>
    </div>
    @endif
    <script>
        document.addEventListener('livewire:load', function () {
            setTimeout(function () {
                $('.toast').removeClass("showing");
            }, 3000);
        });

        function validateOnlyNumber(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /^\d*\.?\d*$/;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>
</x-app-layout>
