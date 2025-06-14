{{-- resources/views/vendor/adminlte/auth/login.blade.php --}}
@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_header', 'Sign in to Input Medical Record')

@section('auth_body')
    <form action="{{ route('login') }}" method="post">
        @csrf

        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember Me</label>
                </div>
            </div>

            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
        </div>
    </form>
@endsection

@section('auth_footer')
    <p class="my-0"><a href="{{ route('password.request') }}">I forgot my password</a></p>
    <p class="my-0"><a href="{{ route('register') }}" class="text-center">Register a new membership</a></p>
@endsection

@section('auth_logo')
    <div class="login-logo">
        <img src="{{ asset('assets/images/villagading-login-logo.png') }}" alt="Logo" height="60">
        <br>
        <strong>VILLA</strong>GADING
    </div>
@endsection

@push('css')
<style>
    body {
        background: linear-gradient(135deg, #2c3e50, #3498db);
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>
@endpush

