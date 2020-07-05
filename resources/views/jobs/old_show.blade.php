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
                <div class="card-header">
                    <h3>
                        {{ $job->title }}
                        <sup class="text text-success">{{ $job->countApplicants() }} applicants</sup>
                    </h3>
                    
                </div>
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
                    <p>Company: <a href="{{ route('company.index', ['company' => $job->company->slug]) }}">{{ $job->company->cname }}</a></p>
                    <p>Address: {{ $job->address }}</p>
                    <p>Employment Type: {{ $job->type }}</p>
                    <p>Position: {{ $job->position }}</p>
                    <p>Posted: {{ $job->created_at->diffForHumans() }}</p>
                    <p>Expires: {{ date('F d, Y', strtotime($job->last_date)) }}</p>
                </div>
            </div>
            <br>
            @if (Auth::check() && Auth::user()->user_type == 'seeker')
                @if (!$job->checkApplication())
                    {{-- <form action="{{ route('apply', $job->id) }}" method="post">
                        @csrf
                    </form>   --}}
                    <apply-component :id={{ $job->id }}></apply-component>
                {{-- @else
                    <div class="alert alert-success">You already applied for this Job!</div> --}}
                @endif
                <br>

                <favorite-component :id={{ $job->id }} :favorited={{ $job->checkSaved() ? 'true' : 'false' }}></favorite-component>
            @endif
            
        </div>

        <div class="col-md-4">

        </div>
    </div>
</div>
@endsection
