<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="mb-3">Detail Kelas</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">Alokasi Kelas</li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Kelas</li>
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
                            <div class="mb-2 row mt-4">
                                <label for="nis" class="col-sm-3 col-form-label">Tahun Pelajaran</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="nis" value="{{ $kelas->nama_thnpelajaran}}" disabled>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="nis" class="col-sm-3 col-form-label">Nama Kelas</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="nis" value="{{ $kelas->nama_kelas}}" disabled >
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="nis" class="col-sm-3 col-form-label">Wali Kelas</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="nis" value="{{ $kelas->walikelas}}" disabled >
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="nis" class="col-sm-3 col-form-label">Jurusan</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="nis" value="{{ $kelas->jurusan}}" disabled>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="nis" class="col-sm-3 col-form-label">Tingkat</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="nis" value="{{ $kelas->tingkat}}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3 mt-5 justify-content-between">
                                {{-- <div class="col-md-3">
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" placeholder="Cari Siswa ...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-search"></i>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-4">
                                    <div class="mb-2 row ">
                                        <label for="nis" class="col-sm-5 col-form-label">Jumlah Siswa</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" id="nis" value="{{ $kelas->jumlahsiswa}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="bg-secondary text-white">
                                        <tr>
                                            
                                            <th>NIS</th>
                                            <th>NISN</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jurusan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($siswa as $row)
                                                <tr>
                                                   
                                                    <td class="text-bold-500">{{$row->nis}}</td>
                                                    <td class="text-bold-500">{{$row->nisn}}</td>
                                                    <td class="text-bold-500">{{$row->nmlengkap}}</td>
                                                    <td class="text-bold-500">{{$row->nmjurusan}}</td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                {{-- <button type="button" class="btn icon icon-left btn-success col-md-3"
                                        data-bs-toggle="modal" data-bs-target="#inlineForm"><i class="bi bi-plus"></i>
                                        Simpan
                                    </button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>