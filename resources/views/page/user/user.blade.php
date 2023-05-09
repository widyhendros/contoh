<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="mb-3">Data User</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    @php
        $admin = false;
        $petugas = false;
        $siswa = true;
        if(isset($request->page)){
            $admin = true;
            $petugas = false;
            $siswa = false;
        }

        if(isset($request->page)){
            $admin = false;
            $petugas = true;
            $siswa = false;
        }
        
        if(isset($request->page)){
            $admin = false;
            $petugas = false;
            $siswa = true;
        }
    @endphp
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row mb-3 justify-content-between">
                                <div class="col-md mb-1">
                                    <form enctype="multipart/form-data" action="{{route('upload.content.with.package')}}" method="post">
                                        @csrf
                                        <div class="d-flex row gy-2">
                                        <div class="col-md-3">
                                            <input class="form-control" type="text" name="thn_masuk" placeholder="Masukan Tahun Masuk">
                                        </div>
                                    <fieldset class="col-md-6">
                                        
                                        <div class="input-group">
                                            <input type="file" class="form-control" name="file" id="inputGroupFile04"
                                                aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                                            <button class="btn btn-primary" type="submit"
                                                id="inputGroupFileAddon04">Import</button>
                                        </div>
                                        <p><small class="text-muted">Import Data User disini [Format .xls]</small></p>
                                    </fieldset>
                                </div>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn icon icon-left btn-success" data-bs-toggle="modal"
                                        data-bs-target="#inlineForm"><i class="bi bi-plus"></i>
                                        Tambah Data User
                                    </button>
                                </div>

                                {{-- Modal Tambah User --}}
                                <div class="modal fade text-left" id="inlineForm" tabindex="-1"
                                    aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">Tambah Data User
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
                                            <form enctype="multipart/form-data" action="{{route('adduser')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-0 row" id="div_role">
                                                        <label for="inputPassword"
                                                            class="col-sm-3 col-form-label">Role</label>
                                                        <div class="col-md-5">
                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="roleuser" name="roleuser" required>
                                                                    <option value="">[ PILIH ]</option>
                                                                    <option value="1">Admin</option>
                                                                    <option value="2">Petugas</option>
                                                                    <option value="0">Siswa</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <p class="text_admin"><small class="text-muted">Untuk Petugas Masukan Email &
                                                            Password</small></p>
                                                    <div class="mb-2 row" id="div_email">
                                                        <label for="nis" class="col-sm-3 col-form-label">Email</label>
                                                        <div class="col-md-5">
                                                            <input type="email" class="form-control" id="email" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row" id="div_password">
                                                        <label for="password"
                                                            class="col-sm-3 col-form-label">Password</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" id="password" name="password">
                                                        </div>
                                                    </div>
                                                    <p class="text_nisn"><small class="text-muted">Untuk Siswa Masukan NISN</small></p>
                                                    <div class="mb-2 row" id="div_nisn">
                                                        <label for="nisn" class="col-sm-3 col-form-label">NISN</label>
                                                        <div class="col-md-4">
                                                            <input type="number" class="form-control" id="nis" name="nis">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 row" id="div_nama">
                                                        <label for="nmlengkap" class="col-sm-3 col-form-label">Nama
                                                            Lengkap</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" id="nmlengkap" name="nmlengkap">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success ml-1"
                                                        >
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Submit</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Modal Tambah User --}}

                                {{-- Modal Edit User --}}
                                <div class="modal fade text-left" id="edituser" tabindex="-1"
                                    aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">Edit Data User
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
                                            <form enctype="multipart/form-data" action="{{route('edituser')}}" method="post">
                                                @csrf
                                                <input type="hidden" id="iduser" class="iduser"
                                                    name="iduser" readonly>
                                                    <input type="hidden" id="siswaid" class="siswaid"
                                                    name="siswaid" readonly>
                                                <div class="modal-body">
                                                    <div class="mb-0 row" id="div_role">
                                                        <label for="inputPassword"
                                                            class="col-sm-3 col-form-label">Role</label>
                                                        <div class="col-md-5">
                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="roleuser" name="roleuser" required>
                                                                    <option value="">[ PILIH ]</option>
                                                                    <option value="1">Admin</option>
                                                                    <option value="2">Petugas</option>
                                                                    <option value="0">Siswa</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <p class="text_admin"><small class="text-muted">Untuk Petugas Masukan Email &
                                                            Password</small></p>
                                                    <div class="mb-2 row" id="div_email">
                                                        <label for="nis" class="col-sm-3 col-form-label">Email</label>
                                                        <div class="col-md-5">
                                                            <input type="email" class="form-control" id="email" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row" id="div_password">
                                                        <label for="password"
                                                            class="col-sm-3 col-form-label">Password</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" id="password" name="password">
                                                        </div>
                                                    </div>
                                                    <p class="text_nisn"><small class="text-muted">Untuk Siswa Masukan NISN</small></p>
                                                    <div class="mb-2 row" id="div_nisn">
                                                        <label for="nisn" class="col-sm-3 col-form-label">NISN</label>
                                                        <div class="col-md-4">
                                                            <input type="number" class="form-control" id="nis" name="nis">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 row" id="div_nama">
                                                        <label for="nmlengkap" class="col-sm-3 col-form-label">Nama
                                                            Lengkap</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" id="nmlengkap" name="nmlengkap">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success ml-1"
                                                        >
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Submit</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Modal Edit User --}}
                            </div>

                            <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                                @if(Session::get('admin') !='2' )
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $admin == true ? 'active' : '' }}" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="{{ $admin == true ? 'true' : 'false' }}">Admin</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $petugas == true ? 'active' : '' }}" id="pills-home-tab1" data-bs-toggle="pill"
                                        data-bs-target="#pills-home1" type="button" role="tab"
                                        aria-controls="pills-home1" aria-selected="{{ $petugas == true ? 'true' : 'false' }}">Petugas</button>
                                </li>
                                @endif
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $siswa == true ? 'active' : '' }}" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="{{ $siswa == true ? 'true' : 'false' }}">Siswa</button>
                                </li>
                                
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                @if(Session::get('admin') !='2' )
                                <div class="tab-pane fade {{ $admin == true ? 'show active' : '' }}  mb-4" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <h3>Data Admin</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Email</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            @foreach($admins as $admin)
                                            <tbody>
                                                <tr>
                                                    <td class="text-bold-500">{{ $admin->email }}</td>
                                                    <td class="text-bold-500">{{ $admin->name }}</td>
                                                    <td>
                                                        <a class="btn my-0 icon btn-warning edit"
                                                        data-bs-target="#edituser" data-id="{{ $admin->id }}"
                                                        data-name="{{$admin->name}}" data-email="{{$admin->email}}" data-tipe="1"><i
                                                                class="bi bi-pencil mb-0"></i></a>
                                                        <a href="{{route('deleteuser',[$admin->id])}}" class="btn icon btn-danger"><i
                                                                class="bi bi-x-lg"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                {{ $admins->links() }}
                                </div>

                                <div class="tab-pane fade {{ $petugas == true ? 'show active' : '' }}  mb-4" id="pills-home1" role="tabpanel"
                                    aria-labelledby="pills-home-tab1">
                                    <h3>Data Admin</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Email</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            @foreach($users as $user)
                                            <tbody>
                                                <tr>
                                                    <td class="text-bold-500">{{ $user->email }}</td>
                                                    <td class="text-bold-500">{{ $user->name }}</td>
                                                    <td>
                                                        <a class="btn my-0 icon btn-warning edit"
                                                        data-bs-target="#edituser" data-id="{{ $user->id }}"
                                                        data-name="{{$user->name}}" data-email="{{$user->email}}" data-tipe="2"><i
                                                                class="bi bi-pencil mb-0"></i></a>
                                                        {{-- <a href="{{route('deleteuser',[$user->id])}}" class="btn icon btn-danger"><i
                                                                class="bi bi-x-lg" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></a> --}}
                                                                <a  class="btn icon btn-danger"><i class="bi bi-x-lg" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></a>
                                                        <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> --}}
  
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                Apakah anda yakin untuk menghapus user ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                                <a href="{{route('deleteuser',[$user->id])}}" class="btn btn-danger">Delete</a>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                {{-- {{ $users->links() }} --}}
                                </div>
                                @endif

                                <div class="tab-pane fade {{ $siswa == true ? 'show active' : '' }}" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <h3>Data Siswa</h3>
                                    <form action="{{ 'user' }}">
                                        <div class="input-group mb-3 mr-4">
                                            <input type="text" class="form-control" placeholder="Search..." name="cari_user" value=" {{ request('cari_user') }}">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NISN</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Password</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            @foreach($siswas as $siswa)
                                            <tbody>
                                                <tr>
                                                    <td class="text-bold-500">{{ $siswa->nisn }}</td>
                                                    <td class="text-bold-500">{{ $siswa->name }}</td>
                                                    <td class="text-bold-500">{{ $siswa->password }}</td>
                                                    <td>
                                                        {{-- <a class="btn my-0 icon btn-warning edit"
                                                        data-bs-target="#edituser" data-id="{{ $siswa->id }}"
                                                        data-name="{{$siswa->name}}" data-nis="{{$siswa->nisn}}" data-email="{{$siswa->email}}" data-tipe="0"><i
                                                                class="bi bi-pencil mb-0"></i></a> --}}
                                                        <a href="{{route('resetpassword',[$siswa->id])}}" class="btn icon btn-danger"><i
                                                                class="bi bi-arrow-counterclockwise"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                            {{ $siswas->links() }}
                                </div>

                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">...</div>
                            </div>
                            
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script src="{{ asset('/js/user.js') }}"></script>

    </section>
    @if(session()->has('password'))
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
    @if(session()->has('pesanedit'))
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
    @if(session()->has('Deleteuser'))
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
    @if(session()->has('resetpassword'))
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
        })

        $(document).delegate(".edit", "click", function () {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const email = $(this).data('email');
            const tipe = $(this).data('tipe');
            const nis = $(this).data('nis');
            console.log(name)

            $('.iduser').val(id);
            $('#edituser input[name=nmlengkap]').val(name);
            $('#edituser input[name=email]').val(email);
            $('#edituser input[name=nis]').val(nis);
            $('#edituser select[name=roleuser]').val(tipe);
            $('#edituser select[name=roleuser]').change();

            $('#edituser').modal("show")

        });
    </script>
</x-app-layout>
