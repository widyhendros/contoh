<x-guest-layout>

    <div id="auth-left">
        <div class="auth-logo d-flex justify-content-center">
            <a href="index.html"><img src="{{ asset('/images/logo/logo21.png') }}" alt="Logo"></a>
            <h2 class="ms-4 my-auto">Buku induk Siswa Digital</h2>
        </div>
        <h1 class="auth-title">Log in.</h1>

        @if (session()->has('alert'))
        <div class="mb-4 font-medium text-sm text-danger">
            {{ session('alert') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
        @endif
        <form action="{{ route('postlogin') }}" method="POST">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input class="form-control form-control-xl" type="text" name="email" placeholder="Username"
                    value="{{ old('email') }}" required>
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" name="password" placeholder="Password"
                    placeholder="Password" required>
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
        </form>
    </div>

</x-guest-layout>