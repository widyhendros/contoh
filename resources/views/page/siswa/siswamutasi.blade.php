<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="mb-3">{{ $title }}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">Siswa</li>
                        <li class="breadcrumb-item active" aria-current="page">Siswa Mutasi</li>
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
                                {{-- <div class="col-md-3">
                                    <form action="{{ 'siswamutasi' }}">
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" placeholder="Cari Siswa ..." name="filter_mutasi">
                                        <div class="form-control-icon">
                                            <i class="bi bi-search"></i>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                <form action="{{ 'siswamutasi' }}">
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="month" class="form-control" placeholder="Bulan Mutasi" name="filter_bulanmutasi">
                                        <div class="form-control-icon">
                                            <i class="bi bi-calendar-date"></i>
                                        </div>
                                    </div>
                                </form>
                                </div> --}}
                                <div class="col-md-3">
                                    <a href="/page/siswa/siswamutasi/cetak_pdf" target="_blank" class="btn icon icon-left btn-success"><i class="bi bi-printer"></i>
                                        Cetak</a>
                                </div>
                            </div>
                            <!-- Table with outer spacing -->
                            @if($siswas->count())
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-secondary text-white">
                                        <tr>
                                            <th>NIS</th>
                                            <th>NISN</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tanggal Mutasi</th>
                                            <th>Jenis Mutasi</th>
                                            <th>Keterangan</th>
                                            {{-- <th>AKSI</th> --}}
                                        </tr>
                                    </thead>
                                    @foreach($siswas as $siswa)
                                    <tbody>
                                        <tr>
                                            <td class="text-bold-500">{{$siswa->nis}}</td>
                                            <td class="text-bold-500">{{ $siswa->nisn }}</td>
                                            <td class="text-bold-500">{{ $siswa->nmlengkap }}</td>
                                            <td class="text-bold-500">{{ date('d F Y', strtotime($siswa->tanggal)) }}</td>
                                            <td class="text-bold-500">{{$siswa->jenis_mutasi}}</td>
                                            <td class="text-bold-500">{{$siswa->catatan}}</td>
                                            {{-- <td>
                                                    <a href="#" data-id="{{$siswa->id}}" class="btn icon btn-danger"><i class="bi bi-x-lg"></i></a>
                                            </td> --}}
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
