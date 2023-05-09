<header class='mb-3'>
    <nav class="navbar navbar-expand navbar-light ">
        <div class="container-fluid">
            @if(Session::get('admin') =='1')
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @endif

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">Welcome, {{ Session::get('name') }}</h6>
                                <p class="mb-0 text-sm text-success">Online</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    <img src="{{ asset('/images/faces/1.jpg') }}">
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        {{-- <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i
                            class="icon-mid bi bi-person me-2"></i> My
                        Profile</a></li>
                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <li>
                            <a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                {{ __('API Tokens') }}
                            </a>
                        </li>
                        @endif --}}
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#updatepassword">
                                <i class="icon-mid bi bi-key me-2"></i>Change Password
                                {{-- {{ __('Logout') }} --}}
                            </a>
                            <form id="logout-form" action="{{ route('logoutuser') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route('logoutuser') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logoutuser') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="modal fade text-left" id="updatepassword" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Ganti Password
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <form enctype="multipart/form-data" action="{{route('change_password')}}" method="post">
                @csrf
                <input id="id" name="id" value="{{ Session::get('id') }}" readonly hidden>
                <div class="modal-body">
                    <div class="mb-2 row">
                        <label for="nis" class="col-sm-3 col-form-label">Password Baru</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="password" name="password">
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
@if(session()->has('changepassword'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
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