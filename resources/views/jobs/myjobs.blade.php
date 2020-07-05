@extends('layouts.main')

@section('page-header')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Manage Jobs</h3>
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
                <div class="job-alerts-item candidates">
                    <h5 class="alerts-title">Listed Jobs</h5>
                    <div class="alerts-list">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <p>Title&amp;Location</p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <p>Created</p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <p>Closes</p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <p>Actions</p>
                            </div>
                        </div>
                    </div>
                    @foreach ($jobs as $job)
                        <div class="alerts-content">
                            <div class="row">
                                <div class="col-lg-3 col-md-5 col-xs-12">
                                    <h3>{{ $job->title }}</h3>
                                    <span class="location"><i class="lni-map-marker"></i>{{ $job->address }}</span>
                                </div>
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <p><span class="full-time">{{ $job->created_at->diffForHumans() }}</span></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <p><span class="full-time">{{ date('F d, Y', strtotime($job->last_date)) }}</span></p>
                                </div>
                                <div class="col-lg-3 col-md-2 col-xs-12">
                                    <span class="full-time"><a href="{{ route('jobs.show', [$job->slug]) }}">
                                        View</a></span>
                                    <span class="full-time"><a href="{{ route('jobs.edit', [$job->slug]) }}">
                                        Edit</a></span>
                                    
                                        
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <br>

        
                    {{ $jobs->links() }}
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
