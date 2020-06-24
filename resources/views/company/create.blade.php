@extends('layouts.app')

@section('content')
<div class="container">

    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-3">
            @if (empty(Auth::user()->company->logo))
                <img src="{{ asset('avatar/man.jpg') }}" width="100" style="width: 100%;">
            @else
                <img src="{{ asset('uploads/logo') }}/{{ Auth::user()->company->logo }}" width="100" style="width: 100%;">
            @endif
            <br><br>

            <form action="{{ route('company.logo') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header">Update Logo</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="logo"><br>
                    <button class="btn btn-success float-right" type="submit">Update</button>

                    @if ($errors->has('logo'))
                        <div class="error" style="color:red;">{{ $errors->first('logo') }}</div>
                    @endif
                </div>
            </form>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Update Company Information
                </div>

                <form action="{{ route('company.store') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->company->address }} {{ old('address') }}">

                            @if ($errors->has('address'))
                                <div class="error" style="color:red;">{{ $errors->first('address') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ Auth::user()->company->phone }} {{ old('phone') }}">

                            @if ($errors->has('phone'))
                                <div class="error" style="color:red;">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="text" class="form-control" name="website" value="{{ Auth::user()->company->website }} {{ old('website') }}">

                            @if ($errors->has('website'))
                                <div class="error" style="color:red;">{{ $errors->first('website') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Slogan</label>
                            <input type="text" class="form-control" name="slogan" value="{{ Auth::user()->company->slogan }} {{ old('slogan') }}">

                            @if ($errors->has('slogan'))
                                <div class="error" style="color:red;">{{ $errors->first('slogan') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control">{{ Auth::user()->company->address }}{{ old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <div class="error" style="color:red;">{{ $errors->first('description') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Company Information</div>
                <div class="card-body">
                   <p>Company Name: {{ Auth::user()->company->cname }}</p>
                   <p>Company Address: {{ Auth::user()->company->address }}</p>
                   <p>Company Phone: {{ Auth::user()->company->phone }}</p>
                   <p>Company Website: <a href="{{ Auth::user()->company->website }}">{{ Auth::user()->company->website }}</a></p>
                   <p>Company Slogan: {{ Auth::user()->company->slogan }}</p>
                   <p>Company Description: {{ Auth::user()->company->description }}</p>

                   <p>Company Page: <a href="{{ Auth::user()->company->slug }}">View</a>
                   </p>
                </div>
            </div>
            <br>
            <div class="card">
                <form action="{{ route('company.coverphoto') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">Update Cover Image</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="cover_photo"><br>
                        <button class="btn btn-success float-right" type="submit">Update</button>

                        @if ($errors->has('cover_photo'))
                            <div class="error" style="color:red;">{{ $errors->first('cover_letter') }}</div>
                        @endif
                    </div>
                </form>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
