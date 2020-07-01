@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <search-component></search-component>
            </div>

            <br><br><br>

            <h1>Recent Jobs</h1><br>

            @if(!$jobs->isEmpty())
            <table class="table">
                <thead>
                    <th>logo</th>
                    <th>position</th>
                    <th>location</th>
                    <th>date</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td>
                                @if (empty($company->logo))
                                <img class="mx-auto" src="{{ asset('uploads/logo/man.jpg') }}" width="80">
                                @else
                                <img src="{{ asset('uploads/logo') }}/{{ $job->company->logo }}" width="80">
                                @endif
                            </td>
                            <td>
                                {{ $job->position }}
                                <br>
                                <i class="fas fa-clock" aria-hidden="true"></i>&nbsp;{{ $job->type }}
                            </td>
                            <td><i class="fas fa-map-marker-alt" aria-hidden="true"></i>&nbsp;{{ $job->address }}</td>
                            <td><i class="fas fa-globe" aria-hidden="true"></i>&nbsp;{{ $job->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('jobs.show', [$job->slug]) }}">
                                    <button class="btn btn-success btn-sm">View</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <br>
                <div class="container">
                    <h3>No jobs available yet! Kindly check back again.</h3>
                </div>
                <br>
            @endif
        </div>

        <div>
            @if(!$companies->isEmpty())
            <a href="{{ route('alljobs') }}">
                <button class="btn btn-success btn-lg" style="width:100%;">Browse All Jobs</button>
            </a>
            @endif
        </div>
        <br><br>
        <h1>Featured Companies</h1>
    </div>

    <div class="container">
        <div class="row">
            @if(!$companies->isEmpty())
            @foreach ($companies as $company)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        @if (!empty($company->logo))
                            <img class="mx-auto" src="{{ asset('uploads/logo') }}/{{ $company->logo }}" width="100">
                        @else
                            <img class="mx-auto" src="{{ asset('uploads/logo/man.jpg') }}" width="100">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $company->cname }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($company->description, 50) }}</p>
                            <a href="{{ route('company.index', $company->slug) }}" class="btn btn-outline-primary">Visit Page</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <div>
                    <h3>No Companies listed yet!</h3>
                </div>
            @endif
        </div>
    </div>
@endsection

<style>
.fas {
    color: #4183D7;
}

</style>