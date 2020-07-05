@extends('layouts.main')

@section('page-header')
<div class="page-header">
        <div class="container">
            <div class="row">
                 <div class="col-lg-12">
                    <div class="inner-header">
                    <h3>Post A New Job</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-12 col-xs-12">
            <div class="post-job box">

                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <form class="form-ad" action="{{ route('jobs.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="control-label" for="title">Job Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Provide job title ex Backend Developer">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="description">Description</label>
                        <m-editor :body="description">
                        <textarea class="summernote" name="description" v-model="description" class="form-control @error('description') is-invalid @enderror">
                            {{ old('description') }}
                        </textarea>
                        </m-editor>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror    
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="roles">Roles</label>
                        <textarea class="summernote" name="roles" class="form-control @error('roles') is-invalid @enderror">
                            {{ old('roles') }}
                        </textarea>

                        @error('roles')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror    
                    </div>


                    <div class="form-group">
                        <label class="control-label" for="category">Category:</label>
                        <div class="search-category-container">
                            <label class="styled-select">
                                <select name="category" class="dropdown-product selectpicker">
                                    @foreach (App\Category::all() as $c)
                                        <option value="" disabled selected>Select Category</option>
                                        <option value="{{ $c->id }}" {{ old("category") == $c->id ? "selected":"" }}>{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>

                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="position">Position:</label>
                        <div class="search-category-container">
                            <label class="styled-select">
                                <select name="position" class="dropdown-product selectpicker">
                                    <option value="" disabled selected>Select Position</option>
                                    <option value="Lead" {{ old("position") == 'Lead' ? "selected":"" }}>Lead</option>
                                    <option value="Senior" {{ old("position") == 'Senior' ? "selected":"" }}>Senior</option>
                                    <option value="Intermediate" {{ old("position") == 'Intermediate' ? "selected":"" }}>Intermediate</option>
                                    <option value="Junior" {{ old("position") == 'Junior' ? "selected":"" }}>Junior</option>
                                    <option value="Entry-level" {{ old("position") == 'Entry-level' ? "selected":"" }}>Entry-level</option>
                                </select>
                            </label>
                        </div>

                        @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="address">Location</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Job Location ex Lagos, Berlin, Remote">

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="type">Type:</label>
                        <div class="search-category-container">
                            <label class="styled-select">
                                <select name="type" class="dropdown-product selectpicker">
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="fulltime" {{ old("type") == 'fulltime' ? "selected":"" }}>fulltime</option>
                                    <option value="part-time" {{ old("type") == 'part-time' ? "selected":"" }}>part-time</option>
                                    <option value="contract" {{ old("type") == 'contract' ? "selected":"" }}>contract</option>
                                </select>
                            </label>
                        </div>

                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="salary">Salary</label>
                        <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary') }}" placeholder="could be hourly, monthly or annual pay">

                        @error('salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="status">Status:</label>
                        <div class="search-category-container">
                            <label class="styled-select">
                                <select name="status" class="dropdown-product selectpicker">
                                    <option value="" disabled selected>Status - select draft if you want listing drafted otherwise publish</option>
                                    <option value="1" {{ old("status") == "1" ? "selected":"" }}>publish</option>
                                    <option value="0" {{ old("status") == "0" ? "selected":"" }}>draft</option>
                                </select>
                            </label>
                        </div>

                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="last_date">Closing Date:</label>
                        <input type="text" id="datepicker" name="last_date" class="form-control @error('last_date') is-invalid @enderror" value="{{ old('last_date') }}" placeholder="yyyy-mm-dd">

                        @error('last_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <button type="submit" class="btn btn-common">Submit JOB</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
