@extends('layouts.main')

@section('page-header')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Job Seeker Registration Form</h3>
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
                    <h3>
                        {{ __('Job Seeker Registration') }}
                    </h3>

                    <form method="POST" action="{{ route('register') }}" class="login-form">
                        @csrf

                        <input type="hidden" value="seeker" name="user_type" />

                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-user"></i>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus placeholder="Full Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-envelope"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            {{-- <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label> --}}

                            <div class="input-icon">
                                <i class="lni-calendar"></i>
                                <input id="datepicker" type="text" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" autocomplete="dob" placeholder="Date of Birth">

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-unlock"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-unlock"></i>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-icon">
                                <input type="radio" @error('gender') is-invalid @enderror name="gender" value="male">Male
                                <input type="radio" @error('gender') is-invalid @enderror name="gender" value="female">Female
                            </div>
                        </div>

                        <button type="submit" class="btn btn-common log-btn mt-3"> {{ __('Register') }}</button>
                        <p class="text-center">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
