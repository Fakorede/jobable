@extends('layouts.main')

@section('page-header')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Login Page</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<section id="content" class="section-padding">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-xs-12">
            <div class="page-login-form box">
                <h3>Login</h3>
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf

                    <div class="form-group">
                        <div class="input-icon">
                            <i class="lni-envelope"></i>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-icon">
                            <i class="lni-lock"></i>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    {{-- <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div> --}}

                    <button type="submit" class="btn btn-common log-btn"> {{ __('Login') }}</button>

                </form>

                <ul class="form-links">
                    <li class="text-center">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>
</section>
@endsection
