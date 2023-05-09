<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="mb-3">Tahun Pelajaran</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Tahun Pelajaran</li>
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
                                <div class="row justify-content-between">
                                    {{-- <div class="col-md-3">
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control" placeholder="Cari Siswa ...">
                                            <div class="form-control-icon">
                                                <i class="bi bi-search"></i>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-3">
                                        <button type="button" class="btn icon icon-left btn-success"
                                            data-bs-toggle="modal" data-bs-target="#inlineForm"><i
                                                class="bi bi-plus"></i>
                                            Tambah Data
                                        </button>
                                    </div>
                                </div>

                                {{-- modaltambah --}}
                                <div class="modal fade text-left" id="inlineForm" tabindex="-1"
                                    aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">Tambah Data Tahun Pelajaran
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
                                            <form enctype="multipart/form-data"
                                                action="{{route('admininsertthnpelajaran')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-2 row">
                                                        <label for="nis" class="col-sm-3 col-form-label">Tahun
                                                            Pelajaran</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="nis"
                                                                name="nama_thnpelajaran"
                                                                value="@if(isset($thnpelajaran->nama_thnpelajaran)) {{$thnpelajaran->nama_thnpelajaran}} @endif">
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

                                {{-- modalupdate --}}
                                <div class="modal fade text-left" id="updatepelajaran" tabindex="-1"
                                    aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">Edit Data Tahun Pelajaran
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
                                            <form enctype="multipart/form-data"
                                                action="{{route('adminupdatethnpelajaran')}}" method="post">
                                                @csrf
                                                <input type="hidden" id="idtahunpelajaran" class="idtahunpelajaran"
                                                    name="idtahunpelajaran" readonly>
                                                <div class="modal-body">
                                                    <div class="mb-2 row">
                                                        <label for="nis" class="col-sm-3 col-form-label">Tahun
                                                            Pelajaran</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control nama_thnpelajaran"
                                                                id="nama_thnpelajaran" name="nama_thnpelajaran">
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
                                </form>
                            </div>
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun Pelajaran</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach($pelajaran as $key=> $pljrn)
                                    <tbody>
                                        <tr>
                                            <td class="text-bold-500">{{ $key+1}}</td>
                                            <td class="text-bold-500">{{$pljrn->nama_thnpelajaran}}</td>
                                            <td class="text-bold-500">
                                                @if ($pljrn->status_thnpelajaran == 0)
                                                Tidak Aktif
                                                @else
                                                Aktif
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn my-0 icon btn-warning edit" data-bs-toggle="modal"
                                                    data-bs-target="#updatepelajaran" data-id="{{ $pljrn->id }}"
                                                    data-name="{{$pljrn->nama_thnpelajaran}}"><i
                                                        class="bi bi-pencil mb-0"></i></a>
                                                @if ($pljrn->status_thnpelajaran == 0)
                                                <a href="{{route('admininsetaktif',['id'=>$pljrn->id])}}"
                                                    class="btn my-0 icon btn-success"><i
                                                        class="bi bi-check-lg mb-0"></i></a>
                                                @endif
                                                {{-- <a href="{{route('admindeletethnpelajaran',[$pljrn->id])}}"
                                                class="btn icon btn-danger" onclick="return confirm('are you sure
                                                ?')"><i class="bi bi-x-lg"></i></a> --}}
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(session()->has('sukses'))
    <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 11">
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
    @if(session()->has('pesanedit'))
    <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 11">
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
        })

        $(document).on("click", ".edit", function () {
            const id = $(this).data('id');
            const nama_thnpelajaran = $(this).data('name');

            $('.idtahunpelajaran').val(id);
            $('.nama_thnpelajaran').val(nama_thnpelajaran);
        });
    </script>
</x-app-layout>