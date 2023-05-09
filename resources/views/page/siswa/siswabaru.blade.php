<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="mb-3">Data Siswa Baru</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Siswa</li>
                        <li class="breadcrumb-item active" aria-current="page">Siswa Baru</li>
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
                                <div class="col-md-3 col-8">
                                    <form action="{{ 'siswabaru' }}">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="filter_siswabaru" name="filter_siswabaru"
                                                    onchange="this.form.submit()">
                                                    <option value="">[Pilih]</option>
                                                    @foreach($thnmasuk as $_siswas)
                                                    @php
                                                    $selected = '';
                                                    if (isset($request->filter_siswabaru)) {
                                                    $selected = $request->filter_siswabaru == $_siswas->thn_masuk ? 'selected' : '';
                                                    }

                                                    @endphp
                                                    @if($_siswas->thn_masuk == '')
                                                    <option value="{{ $_siswas->thn_masuk }}" {{ $selected }}>Belum Ada Tahun Masuk
                                                    </option>
                                                    @else
                                                    <option value="{{ $_siswas->thn_masuk }}" {{ $selected }}>{{ $_siswas->thn_masuk }}
                                                    </option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                    </form>
                                </div>
                                <div class="col-md-3 mb-2 col-4">
                                    <a href="#" id="btn-export" class="btn icon icon-left btn-success"><i
                                        class="bi bi-arrow-down-square"></i>
                                    Export Siswa Baru</a>
                                </div>
                                <div class="col-md-6">
                                    {{-- <a href="{{ 'tambahsiswa' }}" class="btn icon icon-left btn-success"><i
                                        class="bi bi-plus"></i>
                                    Tambah Data</a> --}}
                                    {{-- <input type="text" name="" id="thnmasuk"> --}}
                                    {{-- <a href="#" id="btn-export" class="btn icon icon-left btn-success"><i
                                            class="bi bi-arrow-down-square"></i>
                                        Export</a> --}}
                                    <form enctype="multipart/form-data" action="{{route('upload.content.with.package')}}" method="post">
                                        @csrf
                                        <div class="d-flex row gy-2">
                                            <fieldset class="col-md">
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" id="inputGroupFile04"
                                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                        <button class="btn btn-primary" type="submit"
                                                        id="inputGroupFileAddon04">Import</button>
                                                </div>
                                                <p><small class="text-muted">Import Migrasi NIS [Format .xls]</small></p>
                                            </fieldset>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                            <!-- Table with outer spacing -->
                            @if($siswas->count())
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-secondary text-white">
                                        <tr>
                                            <th>Tahun Masuk</th>
                                            <th>NIS</th>
                                            <th>NISN</th>
                                            <th>Nama Lengkap</th>
                                        </tr>
                                    </thead>
                                    @foreach($siswas as $siswa)
                                    <tbody>
                                        <tr>
                                            <td class="text-bold-500">{{ $siswa->thn_masuk == '' ? 'Belum Ada Tahun Masuk' : $siswa->thn_masuk }}</td>
                                            <td class="text-bold-500">{{ $siswa->nis }}</td>
                                            <td class="text-bold-500">{{ $siswa->nisn }}</td>
                                            <td class="text-bold-500">{{ $siswa->nmlengkap }}</td>
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
    <script>
        $('#btn-export').on('click',function(){
            window.location.href = '/exportBaru/'+$('#filter_siswabaru').val();
        });
    </script>
</x-app-layout>
