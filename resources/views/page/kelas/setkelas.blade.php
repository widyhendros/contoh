<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="mb-3">Set Kelas</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">Alokasi Kelas</li>
                        <li class="breadcrumb-item active" aria-current="page">Set Kelas</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">

                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="d-md-flex justify-content-md-end">
                                <a href="{{ '/page/kelas/alokasikelas' }}" class="btn btn-success  me-md-2"><i class="bi bi-arrow-left-square"></i> Back</a>
                            </div>
                            <form enctype="multipart/form-data" action="{{route('adminupdatekelas')}}" method="post">
                                @csrf
                                <div class="mb-0 row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Tahun
                                        Pelajaran</label>
                                    <div class="col-md-4">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="id_thnpelajaran">
                                                @foreach($ajaran as $_ajaran)
                                                <option value="{{ $_ajaran->id }}" @if(isset($kelas->id_thnpelajaran))
                                                    @if($kelas->id_thnpelajaran == $_ajaran->id) selected="selected"
                                                    @endif @endif>{{ $_ajaran->nama_thnpelajaran }}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{ $kelas->id }}">
                                <div class="mb-2 row">
                                    <label for="nis" class="col-sm-3 col-form-label">Nama Kelas</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="nis" name="nama_kelas"
                                            value="@if(isset($kelas->nama_kelas)) {{$kelas->nama_kelas}} @endif">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="nis" class="col-sm-3 col-form-label">Wali Kelas</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="nis" name="walikelas"
                                            value="{{ $kelas->walikelas}}">
                                    </div>
                                </div>
                                <div class="mb-0 row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Jurusan</label>
                                    <div class="col-md-3">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="jurusan">
                                                <option value="">[ PILIH ]</option>
                                                <option value="MIPA" @if($kelas->jurusan == 'MIPA')
                                                    selected="selected" @endif>MIPA</option>
                                                <option value="IPS" @if($kelas->jurusan == 'IPS')
                                                    selected="selected" @endif>IPS</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="mb-0 row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">TIngkat</label>
                                    <div class="col-md-3">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="tingkat">
                                                <option value="">[ PILIH ]</option>
                                                <option value="1" @if($kelas->tingkat == '1')
                                                    selected="selected" @endif>1</option>
                                                <option value="2" @if($kelas->tingkat == '2')
                                                    selected="selected" @endif>2</option>
                                                <option value="3" @if($kelas->tingkat == '3')
                                                    selected="selected" @endif>3</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <button class="btn btn-warning mt-3"><i class="bi bi-pencil"></i> Update Kelas</button>
                            </form>
                            {{-- <div class="mb-0 row">
                                <label for="inputPassword" class="col-sm-3 col-form-label">Jurusan Sebelumnya</label>
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect">
                                            <option>[ PILIH ]</option>
                                            <option>MIPA</option>
                                            <option>IPS</option>
                                        </select>
                                    </fieldset>
                                </div>
                            </div> --}}
                            <form action="" method="get">
                                <div class="row mb-3 mt-5 justify-content-between">
                                    {{-- <div class="col-md-3">
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control" placeholder="Cari Siswa ..." name="filter_siswakelas">
                                            <div class="form-control-icon">
                                                <i class="bi bi-search"></i>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-2">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="filter_thnmasuk" name="filter_thnmasuk"
                                                onchange="this.form.submit()">
                                                @foreach($thn_masuk as $_thn_masuk)
                                                @php
                                                $selected = '';
                                                if (isset($request->filter_thnmasuk)) {
                                                $selected = $request->filter_thnmasuk == $_thn_masuk->thn_masuk ?
                                                'selected' : '';
                                                }

                                                @endphp
                                                <option value="{{ $_thn_masuk->thn_masuk }}" {{ $selected }}>
                                                    {{ $_thn_masuk->thn_masuk }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-2">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="filter_jurusan" name="filter_jurusan"
                                                onchange="this.form.submit()">
                                                <option value="">[ PILIH ]</option>
                                            <option {{ $request->filter_jurusan == 'MIPA' ? 'selected' : '' }}>MIPA</option>
                                            <option {{ $request->filter_jurusan == 'IPS' ? 'selected' : '' }}>IPS</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2 row">
                                            <label for="nis" class="col-sm-5 col-form-label">Jumlah Siswa</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="nis" disabled
                                                    value="{{$kelas->jumlahsiswa}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <form enctype="multipart/form-data" action="{{route('kelasinsertsiswa')}}" method="post">
                                @csrf
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <input id="inputidsiswa" name="inputidsiswa" readonly hidden>
                                    <input id="idkelas" name="idkelas" value="{{$kelas->id}}" readonly hidden>
                                    <table class="table table-striped">
                                        <thead class="bg-secondary text-white">
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox"
                                                                class="form-check-input form-check-info form-check-glow"
                                                                name="customCheck" id="customColorCheck5">
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>NIS</th>
                                                <th>NISN</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jurusan</th>
                                                <th>Tahun Masuk</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodytable">
                                            @foreach($siswa as $row)
                                            <tr>
                                                <td class="text-bold-500">
                                                    <div class="form-check">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" data-id="{{$row->idsiswa}}"
                                                                class="form-check-input form-check-info form-check-glow checkboxkelas"
                                                                name="checkboxkelas" id="checkboxkelas"
                                                                @if($row->id_kelas == $kelas->id) checked="checked"
                                                            @endif>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-bold-500">{{$row->nis}}</td>
                                                <td class="text-bold-500">{{$row->nisn}}</td>
                                                <td class="text-bold-500">{{$row->nmlengkap}}</td>
                                                <td class="text-bold-500">{{$row->nmjurusan}}</td>
                                                <td class="text-bold-500">{{$row->thn_masuk}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn icon icon-left btn-success col-md-3"
                                        data-bs-toggle="modal" data-bs-target="#inlineForm"><i class="bi bi-save"></i>
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('/js/kelas.js') }}"></script>
    </section>
</x-app-layout>