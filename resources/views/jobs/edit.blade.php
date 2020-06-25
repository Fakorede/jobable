@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Update Job Listing</div>

                <div class="card-body">
                    <form action="{{ route('jobs.update', $job->slug) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $job->title }}">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="decription">Description:</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ $job->description }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="roles">Roles:</label>
                            <textarea name="roles" class="form-control @error('roles') is-invalid @enderror">{{ $job->roles }}</textarea>

                            @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select name="category_id" class="form-control">
                                @foreach (App\Category::all() as $c)
                                    <option value="{{ $c->id }}" {{ $job->category_id == $c->id ? "selected":"" }}>{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ $job->position }}">

                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $job->address }}">

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">Type:</label>
                            <select name="type" class="form-control">
                                <option value="fulltime" {{ $job->type == 'fulltime' ? "selected":"" }}>fulltime</option>
                                <option value="part-time" {{ $job->type == 'part-time' ? "selected":"" }}>part-time</option>
                                <option value="contract" {{ $job->type == 'contract' ? "selected":"" }}>contract</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type">Status:</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ $job->status == "1" ? "selected":"" }}>publish</option>
                                <option value="0" {{ $job->status == "0" ? "selected":"" }}>draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="last_date">Expires:</label>
                            <input type="text" id="datepicker" name="last_date" class="form-control @error('last_date') is-invalid @enderror" value="{{ $job->last_date }}">

                            @error('last_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
