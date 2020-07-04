@extends('layouts.main')

@section('page-header')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Reset Password</h3>
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
                {{-- <h3>Login</h3> --}}
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="login-form">
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

                    
                    <button type="submit" class="btn btn-common log-btn"> {{ __('Send Password Reset Link') }}</button>

                </form>

            </div>
        </div>
    </div>
</div>
</section>
@endsection
