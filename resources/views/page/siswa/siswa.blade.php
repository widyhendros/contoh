<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="mb-3">Data Induk Siswa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Siswa</li>
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
                                <div class="col-md-3">
                                    <form action="{{ 'siswa' }}">
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control" placeholder="Cari Siswa ..."
                                                name="search" value=" {{ request('search') }}">
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
                                            <option value="{{ $_ajaran->id }}" {{ $selected }}>
                                                {{ $_ajaran->nama_thnpelajaran }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-3">
                                    <fieldset class="form-group">
                                        <select class="form-select" id="filter_kelas" name="filter_kelas"
                                            onchange="this.form.submit()">
                                            <option value="">[Pilih]</option>
                                            @foreach($kelas as $_kelas)
                                            @php
                                            $selected = '';
                                            if (isset($request->filter_kelas)) {
                                            $selected = $request->filter_kelas == $_kelas->id ? 'selected' : '';
                                            }

                                            @endphp
                                            <option value="{{ $_kelas->id }}" {{ $selected }}>{{ $_kelas->nama_kelas }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                </form>
                                <div class="col-md-3">
                                    {{-- <a href="{{ 'tambahsiswa' }}" class="btn icon icon-left btn-success"><i
                                        class="bi bi-plus"></i>
                                    Tambah Data</a> --}}
                                    {{-- <input type="text" name="" id="thnbaru" value="2023"> --}}
                                    <a href="{{ '/export' }}" class="btn icon icon-left btn-success"><i
                                            class="bi bi-arrow-down-square"></i>
                                        Export Data Siswa</a>
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
                                            <th>Jurusan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach($siswas as $siswa)
                                    <tbody>
                                        <tr>
                                            <td class="text-bold-500">{{ $siswa->nis }}</td>
                                            <td class="text-bold-500">{{ $siswa->nisn }}</td>
                                            <td class="text-bold-500">{{ $siswa->nmlengkap }}</td>
                                            <td class="text-bold-500">{{ $siswa->nmjurusan }}</td>
                                            <td>
                                                {{-- reset --}}
                                                {{-- <a href="#" class="btn my-0 icon btn-primary"><i
                                                        class="bi bi-arrow-repeat mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Password" ></i></a> --}}

                                                {{-- edit --}}
                                                <a href="admintambahsiswa?nisn={{$siswa->nisn}}"
                                                    class="btn my-0 icon btn-warning"><i
                                                        class="bi bi-pencil mb-0"></i></a>

                                                {{-- mutasi --}}
                                                <a href="#" id="btn_mutasi" data-id="{{$siswa->id}}"
                                                    data-nis="{{$siswa->nis}}" data-nisn="{{$siswa->nisn}}"
                                                    data-name="{{$siswa->nmlengkap}}"
                                                    class="btn_mutasi btn icon btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#inlineForm"><i
                                                        class="bi bi-arrow-left-right"></i></a>
                                                <div class="modal fade text-left" id="inlineForm" tabindex="-1"
                                                    aria-labelledby="myModalLabel33" aria-hidden="true"
                                                    style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-success">
                                                                <h4 class="modal-title text-white" id="myModalLabel33">
                                                                    Mutasi Siswa
                                                                </h4>
                                                                <button type="button" class="close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-x">
                                                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <form enctype="multipart/form-data"
                                                                action="{{route('admininsertmutasi')}}" method="post">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="mb-0 row">
                                                                        <div class="col-md-6">
                                                                            <input id="mutasi_siswaid"
                                                                                name="mutasi_siswaid" hidden>
                                                                            <input id="mutasi_nisn" name="mutasi_nisn"
                                                                                hidden>
                                                                            <div class="mb-3">
                                                                                <label for="mutasi_nis"
                                                                                    class="form-label">NIS</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="mutasi_nis" name="mutasi_nis"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="mutasi_name"
                                                                                    class="form-label">Nama
                                                                                    Siswa</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="mutasi_name" name="mutasi_name"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="exampleFormControlInput1"
                                                                                    class="form-label">Jenis
                                                                                    Mutasi</label>
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-select"
                                                                                        id="jalurMasuk"
                                                                                        name="jenis_mutasi">
                                                                                        <option value="">[ Pilih Jenis
                                                                                            Mutasi ]</option>
                                                                                        <option value="pindah sekolah">
                                                                                            Pindah Sekolah</option>
                                                                                        <option
                                                                                            value="mengundurkan diri">
                                                                                            Mengundurkan Diri</option>
                                                                                        <option value="drop out">Drop
                                                                                            Out</option>
                                                                                        <option value="meninggal dunia">
                                                                                            Meninggal Dunia</option>
                                                                                    </select>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="exampleFormControlInput1"
                                                                                    class="form-label">Tanggal
                                                                                    Mutasi</label>
                                                                                <input type="date" class="form-control"
                                                                                    id="tanggal" name="tanggal"
                                                                                    value="{{date('Y-m-d')}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-0 row">
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1"
                                                                                class="form-label">Catatan</label>
                                                                            <textarea rows="3" class="form-control"
                                                                                name="catatan"></textarea>
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

                                                {{-- HAPUS --}}
                                                {{-- <a data-bs-toggle="modal" data-bs-target="#exampleModal"  --}}
                                                {{-- href="{{route('admindeletesiswa',[$siswa->nisn])}}"  --}}
                                                    {{-- class="btn icon btn-danger"><i class="bi bi-x-lg"></i> --}}
                                                {{-- </a> --}}
                                                <!-- Button trigger modal -->
                                                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Launch demo modal
                                                </button> --}}
                                                <a class="btn icon btn-danger btn-hapus" href="{{route('admindeletesiswa',[$siswa->nisn])}}"><i class="bi bi-x-lg" ></i></a>

                                                
                                                
                                            </td>
                                        </tr>

                                    </tbody>

                                    @endforeach
                                </table>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Perhatian</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <p>Apakah Anda yakin akan Menghapus Siswa ini ?</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <a href="" class="btn btn-danger link-hapus">Hapus</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <p>Data TIdak Ditemukan</p>
                            @endif
                            {{ $siswas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('/js/adminsiswa.js') }}"></script>
<script>
     $(".btn-hapus").on("click", function(e) {
        e.preventDefault()
        var linknya = $(this).attr("href")
        console.log(linknya)
        $(".link-hapus").attr("href", linknya)
        $("#exampleModal").modal("show")
        })
</script>
    </section>
</x-app-layout>
