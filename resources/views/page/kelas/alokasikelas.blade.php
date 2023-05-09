<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="mb-3">Alokasi Kelas</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Alokasi Kelas</li>
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
                            <div class="row mb-3">
                                <form action="{{ route('alokasikelas') }}">
                                    <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control" placeholder="Cari Kelas ..." name="carikelas" value=" {{ request('carikelas') }}">
                                            <div class="form-control-icon">
                                                <i class="bi bi-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="filter_ajaran" name="filter_ajaran"
                                                onchange="this.form.submit()">
                                                @foreach($ajaran as $_ajaran)
                                                @php
                                                $selected = '';
                                                if (isset($request->filter_ajaran)) {
                                                    $selected = $request->filter_ajaran == $_ajaran->id ? 'selected' : '';
                                                } else {
                                                    $selected = ($_ajaran->status_thnpelajaran == 1) ? 'selected' : '';
                                                }
                                                
                                                @endphp
                                                <option value="{{ $_ajaran->id }}" {{ $selected }}>{{ $_ajaran->nama_thnpelajaran }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                </form>
                                <div class="col-md-3">
                                    <button type="button" class="btn icon icon-left btn-success" data-bs-toggle="modal"
                                        data-bs-target="#inlineForm"><i class="bi bi-plus"></i>
                                        Tambah Data Kelas
                                    </button>
                                </div>
                                </div>
                                <div class="modal fade text-left" id="inlineForm" tabindex="-1"
                                    aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">Tambah Data Kelas
                                                </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-x">
                                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <form enctype="multipart/form-data" action="{{route('admininsertkelas')}}"
                                                method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-0 row">
                                                        <label for="inputPassword" class="col-sm-3 col-form-label">Tahun
                                                            Pelajaran</label>
                                                        <div class="col-md-4">
                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="basicSelect"
                                                                    name="id_thnpelajaran">
                                                                    @foreach($ajaran as $_ajaran)
                                                                    <option value="{{ $_ajaran->id }}">
                                                                        {{ $_ajaran->nama_thnpelajaran }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 row">
                                                        <label for="nis" class="col-sm-3 col-form-label">Nama
                                                            Kelas</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="nis"
                                                                name="nama_kelas">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 row">
                                                        <label for="nis" class="col-sm-3 col-form-label">Wali
                                                            Kelas</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" id="nis"
                                                                name="walikelas">
                                                        </div>
                                                    </div>
                                                    {{-- <div class="mb-0 row">
                                                        <label for="inputPassword" class="col-sm-3 col-form-label">Wali
                                                            Kelas</label>
                                                        <div class="col-md-5">
                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="basicSelect">
                                                                    <option>[ PILIH ]</option>
                                                                    <option>Muhamad Taofik Setiawan, S.T</option>
                                                                    <option>Widy Hendro Saputro, S.T</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div> --}}
                                                    <div class="mb-0 row">
                                                        <label for="inputPassword"
                                                            class="col-sm-3 col-form-label">Jurusan</label>
                                                        <div class="col-md-5">
                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="basicSelect"
                                                                    name="jurusan">
                                                                    <option value="">[ PILIH ]</option>
                                                                    <option value="MIPA">MIPA</option>
                                                                    <option value="IPS">IPS</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="mb-0 row">
                                                        <label for="inputPassword"
                                                            class="col-sm-3 col-form-label">Tingkat</label>
                                                        <div class="col-md-5">
                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="basicSelect"
                                                                    name="tingkat">
                                                                    <option value="">[ PILIH ]</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success ml-1">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Submit</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Table with outer spacing -->
                            @if($kelas->count())
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th>Tahun Pelajaran</th>
                                            <th>Nama Kelas</th>
                                            <th>Wali Kelas</th>
                                            <th>Jurusan</th>
                                            <th>Tingkat</th>
                                            <th>Jumlah Siswa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach($kelas as $kls)
                                    <tbody>
                                        <tr>
                                            <td class="text-bold-500">{{ $kls->nama_thnpelajaran}}</td>
                                            <td class="text-bold-500">{{ $kls->nama_kelas}}</td>
                                            <td class="text-bold-500">{{ $kls->walikelas}}</td>
                                            <td class="text-bold-500">{{ $kls->jurusan}}</td>
                                            <td class="text-bold-500">{{ $kls->tingkat}}</td>
                                            <td class="text-bold-500">{{ $kls->jumlahsiswa}}</td>
                                            <td>
                                                <a href="{{ 'setkelas/'.$kls->id }}"
                                                    class="btn my-0 icon btn-primary"><i
                                                        class="bi bi-gear mb-0"></i></a>
                                                <a href="{{ 'detailkelas/'.$kls->id }}" class="btn icon btn-success"><i
                                                        class="bi bi-people"></i></a>
                                                {{-- <a href="#" class="btn my-0 icon btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#inlineForm"><i
                                                        class="bi bi-pencil mb-0"></i></a> --}}
                                                {{-- <a href="#" class="btn icon btn-danger"><i class="bi bi-x-lg"></i></a> --}}
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                            @else
                            <p>Data TIdak Ditemukan</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>