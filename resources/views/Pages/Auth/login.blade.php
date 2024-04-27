@extends('Pages.Auth.master')


@section('auth-content')
    @push('title')
        Login
    @endpush
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        {{-- <a href="/"><img src="assets/static/images/logo/logo.svg" alt="Logo"></a> --}}
                        <h2 class="">Sawit Digital</h2>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Login Gagal
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('onlogin') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" id="email" name="email" class="form-control form-control-xl"
                                placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-xl"
                                placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="{{ route('register') }}"
                                class="font-bold">Sign
                                up</a>.</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
    @pushOnce('scripts')
    @endPushOnce()
@endsection
