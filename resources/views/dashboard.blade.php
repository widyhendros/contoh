<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">Tahun Pelajaran : <b>{{ $title }}</b></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    
    <section class="section">
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="bi bi-123"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Rombel</h6>
                                <h6 class="font-extrabold mb-0">{{ $jumlahrombel }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Siswa</h6>
                                <h6 class="font-extrabold mb-0">{{ $jumlahsiswaaktif }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="iconly-boldAdd-User"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Siswa Mutasi</h6>
                                <h6 class="font-extrabold mb-0">{{ $jumlahsiswamutasi }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon red">
                                    <i class="iconly-boldBookmark"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Saved Post</h6>
                                <h6 class="font-extrabold mb-0">112</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kelas X</h4>
                    </div>
                    <div class="card-body">
                        @if($kelasx->count())
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">L</th>
                                <th scope="col">P</th>
                                <th scope="col">Jumlah</th>
                              </tr>
                            </thead>
                            @foreach($kelasx as $key=> $_kelasx)
                            <tbody>
                              <tr>
                                <th scope="row">{{ $key+1}}</th>
                                <td>{{ $_kelasx->nama_kelas }}</td>
                                <td>{{ $_kelasx->jumlahsiswalaki }}</td>
                                <td>{{ $_kelasx->jumlahsiswaperempuan }}</td>
                                <td>{{ $_kelasx->total_siswa }}</td>
                              </tr>
                            </tbody>
                            @endforeach
                        </table>
                        @else
                    <p>Belum Ada Data</p>
                    @endif
                    </div>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kelas XI</h4>
                    </div>
                    <div class="card-body">
                        @if($kelasxi->count())
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">L</th>
                                <th scope="col">P</th>
                                <th scope="col">Jumlah</th>
                              </tr>
                            </thead>
                            @foreach($kelasxi as $key=> $_kelasxi)
                            <tbody>
                              <tr>
                                <th scope="row">{{ $key+1}}</th>
                                <td>{{ $_kelasxi->nama_kelas }}</td>
                                <td>{{ $_kelasxi->jumlahsiswalaki }}</td>
                                <td>{{ $_kelasxi->jumlahsiswaperempuan }}</td>
                                <td>{{ $_kelasxi->total_siswa }}</td>
                              </tr>
                            </tbody>
                            @endforeach
                        </table>
                        @else
                        <p>Belum ada Data</p>
                    @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kelas XII</h4>
                    </div>
                    <div class="card-body">
                        @if($kelasxii->count())
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">L</th>
                                <th scope="col">P</th>
                                <th scope="col">Jumlah</th>
                              </tr>
                            </thead>
                            @foreach($kelasxii as $key=> $_kelasxii)
                            <tbody>
                              <tr>
                                <th scope="row">{{ $key+1}}</td></th>
                                <td>{{ $_kelasxii->nama_kelas }}</td>
                                <td>{{ $_kelasxii->jumlahsiswalaki }}</td>
                                <td>{{ $_kelasxii->jumlahsiswaperempuan }}</td>
                                <td>{{ $_kelasxii->total_siswa }}</td>
                              </tr>
                            </tbody>
                            @endforeach
                        </table>
                        @else
                        <p>Belum ada Data</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
            {{-- <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Siswa Mutasi</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Mutasi</th>
                            <th>Jenis Mutasi</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        @foreach($siswamutasi as $key=> $_siswamutasi)
                        <tbody>
                          <tr>
                            <th scope="row">{{ $key+1}}</td></th>
                            <td class="text-bold-500">{{$_siswamutasi->nis}}</td>
                            <td class="text-bold-500">{{$_siswamutasi->nisn }}</td>
                            <td class="text-bold-500">{{$_siswamutasi->nmlengkap }}</td>
                            <td class="text-bold-500">{{$_siswamutasi->tanggal}}</td>
                            <td class="text-bold-500">{{$_siswamutasi->jenis_mutasi}}</td>
                            <td class="text-bold-500">{{$_siswamutasi->catatan}}</td>
                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                </div>
            </div> --}}
        
    </section>
</x-app-layout>
