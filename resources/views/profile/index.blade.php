@extends('layouts.app')

@section('content')
<div class="container">

    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-2">
            <img src="{{ asset('avatar/man.jpg') }}" width="100">
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Update Your Profile
                </div>

                <form action="{{ route('profile.create') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>

                        <div class="form-group">
                            <label for="">Experience</label>
                            <textarea class="form-control" name="experience"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Bio</label>
                            <textarea class="form-control" name="bio"></textarea>
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
                <div class="card-header">Your Information</div>
                <div class="card-body">
                    <p><strong>Name: </strong>{{ Auth::user()->name }}</p>
                    <p><strong>Email: </strong>{{ Auth::user()->email }}</p>
                    <p><strong>Address: </strong> {{ Auth::user()->profile->address }}</p>
                    <p><strong>Gender: </strong>{{ Auth::user()->profile->gender }}</p>
                    <p><strong>Experience: </strong>{{ Auth::user()->profile->experience }}</p>
                    <p><strong>Bio: </strong>{{ Auth::user()->profile->bio }}</p>
                    <p><strong>Member Since: </strong>{{ Auth::user()->created_at }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Update Cover Letter</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="cover_letter">
                    <button class="btn btn-success float-right" type="submit">Update</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Update Resume</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="resume">
                    <button class="btn btn-success float-right" type="submit">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
