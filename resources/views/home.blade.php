@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::user()->user_type == 'seeker')
        <h1>Saved Jobs</h1><br>
        <div class="row justify-content-center">
            @foreach ($jobs as $job)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $job->title }}</div>
                    <small class="badge badge-primary" style="width:200px">{{ $job->position }}</small>
                    
                    <div class="card-body">
                        {{ \Illuminate\Support\Str::limit($job->description, 120) }}
                    </div>

                    <div class="card-footer">
                        <span><a href="{{ route('jobs.show', $job->slug) }}">View</a></span>
                        <span class="float-right">Expires On: {{ date('F d, Y', strtotime($job->last_date)) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <h1>Welcome to your Dashboard!</h1>
    @endif
</div>
@endsection
