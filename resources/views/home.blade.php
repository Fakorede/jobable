@extends('layouts.main')

@section('page-header')
<div class="page-header">
        <div class="container">
            <div class="row">
                 <div class="col-lg-12">
                    <div class="inner-header">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-12">
                @include('jobs._sidebar')
            </div>

            <div class="col-lg-9 col-md-9 col-xs-12">
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
                <div>
                    <br><br>
                    <h5>Welcome to your Dashboard!</h5>
                    <br><br>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
