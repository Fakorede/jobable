@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $job->title }}</div>
                <div class="card-body">
                    <p>
                        <h3>Job Description</h3>
                        {{ $job->description }}
                    </p>
                    <p>
                        <h3>Job Roles</h3>
                        {{ $job->roles }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Short Info</div>
                <div class="card-body">
                    <p>Company: {{ $job->company->cname }}</p>
                    <p>Address: {{ $job->address }}</p>
                    <p>Employment Type: {{ $job->type }}</p>
                    <p>Position: {{ $job->position }}</p>
                    <p>Date: {{ $job->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <button class="btn btn-success btn-sm">Apply</button>
        </div>

        <div class="col-md-4">

        </div>
    </div>
</div>
@endsection
